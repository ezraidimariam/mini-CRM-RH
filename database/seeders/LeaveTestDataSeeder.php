<?php

namespace Database\Seeders;

use App\Models\CongeRequest;
use App\Models\Employee;
use App\Models\LeaveBalance;
use App\Models\User;
use Illuminate\Database\Seeder;

class LeaveTestDataSeeder extends Seeder
{
    public function run(): void
    {
        // Create employees with users
        $user1 = User::create([
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'password' => bcrypt('password'),
            'role' => 'employee'
        ]);
        $emp1 = Employee::create([
            'first_name' => 'Jean',
            'last_name' => 'Dupont',
            'email' => 'jean@example.com',
            'phone' => '0612345678',
            'department' => 'IT',
            'position' => 'Developer',
            'hire_date' => '2023-01-15',
            'salary' => 45000
        ]);

        $user2 = User::create([
            'name' => 'Marie Martin',
            'email' => 'marie@example.com',
            'password' => bcrypt('password'),
            'role' => 'employee'
        ]);
        $emp2 = Employee::create([
            'first_name' => 'Marie',
            'last_name' => 'Martin',
            'email' => 'marie@example.com',
            'phone' => '0623456789',
            'department' => 'HR',
            'position' => 'HR Manager',
            'hire_date' => '2022-06-01',
            'salary' => 50000
        ]);

        $user3 = User::create([
            'name' => 'Pierre Bernard',
            'email' => 'pierre@example.com',
            'password' => bcrypt('password'),
            'role' => 'employee'
        ]);
        $emp3 = Employee::create([
            'first_name' => 'Pierre',
            'last_name' => 'Bernard',
            'email' => 'pierre@example.com',
            'phone' => '0634567890',
            'department' => 'Sales',
            'position' => 'Sales Rep',
            'hire_date' => '2023-03-20',
            'salary' => 42000
        ]);

        // Create leave balances for current year
        $year = now()->year;
        LeaveBalance::create([
            'employee_id' => $emp1->id,
            'year' => $year,
            'accrued_days' => 25,
            'used_days' => 5,
            'available_days' => 20,
            'last_accrual_date' => now()
        ]);
        LeaveBalance::create([
            'employee_id' => $emp2->id,
            'year' => $year,
            'accrued_days' => 30,
            'used_days' => 10,
            'available_days' => 20,
            'last_accrual_date' => now()
        ]);
        LeaveBalance::create([
            'employee_id' => $emp3->id,
            'year' => $year,
            'accrued_days' => 25,
            'used_days' => 2,
            'available_days' => 23,
            'last_accrual_date' => now()
        ]);

        // Get RH user for approval
        $rhUser = User::where('email', 'rh@rh.com')->first();

        // Pending requests
        CongeRequest::create([
            'employee_id' => $emp1->id,
            'start_date' => now()->addDays(5),
            'end_date' => now()->addDays(7),
            'working_days' => 3,
            'reason' => 'Family vacation',
            'status' => 'pending'
        ]);
        CongeRequest::create([
            'employee_id' => $emp3->id,
            'start_date' => now()->addDays(10),
            'end_date' => now()->addDays(12),
            'working_days' => 3,
            'reason' => 'Personal matters',
            'status' => 'pending'
        ]);

        // Approved requests
        CongeRequest::create([
            'employee_id' => $emp1->id,
            'start_date' => now()->subDays(20),
            'end_date' => now()->subDays(18),
            'working_days' => 3,
            'reason' => 'Medical appointment',
            'status' => 'approved',
            'approved_by' => $rhUser->id,
            'decided_at' => now()->subDays(25)
        ]);
        CongeRequest::create([
            'employee_id' => $emp2->id,
            'start_date' => now()->subDays(10),
            'end_date' => now()->subDays(5),
            'working_days' => 4,
            'reason' => 'Training',
            'status' => 'approved',
            'approved_by' => $rhUser->id,
            'decided_at' => now()->subDays(15)
        ]);

        // Rejected request
        CongeRequest::create([
            'employee_id' => $emp3->id,
            'start_date' => now()->subDays(30),
            'end_date' => now()->subDays(28),
            'working_days' => 3,
            'reason' => 'Extended vacation',
            'status' => 'rejected',
            'rejected_reason' => 'Insufficient leave balance',
            'approved_by' => $rhUser->id,
            'decided_at' => now()->subDays(35)
        ]);
    }
}
