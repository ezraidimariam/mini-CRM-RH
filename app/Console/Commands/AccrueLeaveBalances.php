<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Services\LeaveService;
use Illuminate\Console\Command;

class AccrueLeaveBalances extends Command
{
    protected $signature = 'leave:accrue-monthly';
    protected $description = 'Accrue monthly leave balances for all active employees';

    public function handle(LeaveService $leaveService)
    {
        $employees = Employee::active()->get();
        $processed = 0;

        foreach ($employees as $employee) {
            $leaveService->accrueMonthlyLeave($employee);
            $processed++;
        }

        $this->info("Accrued leave for {$processed} employees.");
        return Command::SUCCESS;
    }
}
