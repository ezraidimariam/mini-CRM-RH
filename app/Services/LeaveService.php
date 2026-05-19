<?php

namespace App\Services;

use App\Models\Employee;
use App\Models\LeaveBalance;
use Carbon\Carbon;

class LeaveService
{
    public function canRequestLeave(Employee $employee): bool
    {
        $eligibleFrom = Carbon::parse($employee->hire_date)->addMonths(6);
        return Carbon::now()->gte($eligibleFrom);
    }

    public function hasEnoughBalance(Employee $employee, int $requestedDays): bool
    {
        $balance = $employee->leaveBalance(now()->year);
        return $balance && $balance->available_days >= $requestedDays;
    }

    public function countWorkingDays(string $startDate, string $endDate): int
    {
        $start = Carbon::parse($startDate);
        $end = Carbon::parse($endDate);
        $days = 0;

        while ($start->lte($end)) {
            if ($start->isWeekday()) {
                $days++;
            }
            $start->addDay();
        }

        return $days;
    }

    public function getCarePeriodEndDate(Employee $employee): Carbon
    {
        return Carbon::parse($employee->hire_date)->addMonths(6);
    }

    public function getCarePeriodRemainingDays(Employee $employee): int
    {
        $eligibleFrom = $this->getCarePeriodEndDate($employee);
        $now = Carbon::now();
        
        if ($now->gte($eligibleFrom)) {
            return 0;
        }

        return $now->diffInDays($eligibleFrom);
    }

    public function createOrUpdateBalance(Employee $employee, int $year = null): LeaveBalance
    {
        $year = $year ?? now()->year;
        
        return LeaveBalance::firstOrCreate(
            [
                'employee_id' => $employee->id,
                'year' => $year,
            ],
            [
                'accrued_days' => 0,
                'used_days' => 0,
                'available_days' => 0,
                'last_accrual_date' => null,
            ]
        );
    }

    public function accrueMonthlyLeave(Employee $employee): void
    {
        if (!$this->canRequestLeave($employee)) {
            return;
        }

        $balance = $this->createOrUpdateBalance($employee);
        $balance->increment('accrued_days', 1.5);
        $balance->last_accrual_date = now()->toDateString();
        $balance->updateAvailableDays();
    }

    public function useLeaveDays(Employee $employee, int $days): void
    {
        $balance = $employee->leaveBalance(now()->year);
        if ($balance) {
            $balance->increment('used_days', $days);
            $balance->updateAvailableDays();
        }
    }

    public function refundLeaveDays(Employee $employee, int $days): void
    {
        $balance = $employee->leaveBalance(now()->year);
        if ($balance) {
            $balance->decrement('used_days', $days);
            $balance->updateAvailableDays();
        }
    }

    public function resetYearlyBalances(int $year): void
    {
        LeaveBalance::where('year', $year)->update([
            'accrued_days' => 0,
            'used_days' => 0,
            'available_days' => 0,
        ]);
    }
}
