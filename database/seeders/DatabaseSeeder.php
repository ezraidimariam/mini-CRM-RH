<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\LeaveBalance;
use App\Models\CongeRequest;
use App\Models\Evaluation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create System Users
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $rh = User::create([
            'name' => 'HR Manager',
            'email' => 'rh@rh.com',
            'password' => Hash::make('password'),
            'role' => 'rh',
        ]);

        // 2. Data Pools
        $departments = ['Strategic Engineering', 'Market Intelligence', 'Creative Direction', 'Human Capital', 'Customer Success', 'Digital Operations'];
        
        $employeesData = [
            ['first_name' => 'Alexander', 'last_name' => 'Vance', 'pos' => 'Principal Architect', 'dept' => 'Strategic Engineering', 'sal' => 95000],
            ['first_name' => 'Elena', 'last_name' => 'Rodriguez', 'pos' => 'Growth Lead', 'dept' => 'Market Intelligence', 'sal' => 82000],
            ['first_name' => 'Marcus', 'last_name' => 'Chen', 'pos' => 'Systems Analyst', 'dept' => 'Digital Operations', 'sal' => 74000],
            ['first_name' => 'Sophia', 'last_name' => 'Bell', 'pos' => 'Visual Designer', 'dept' => 'Creative Direction', 'sal' => 68000],
            ['first_name' => 'Julian', 'last_name' => 'Thorne', 'pos' => 'HR Specialist', 'dept' => 'Human Capital', 'sal' => 62000],
            ['first_name' => 'Isabella', 'last_name' => 'Grant', 'pos' => 'Success Manager', 'dept' => 'Customer Success', 'sal' => 71000],
            ['first_name' => 'Dominic', 'last_name' => 'Snyder', 'pos' => 'DevOps Engineer', 'dept' => 'Strategic Engineering', 'sal' => 88000],
            ['first_name' => 'Nathan', 'last_name' => 'Drake', 'pos' => 'Backend Developer', 'dept' => 'Strategic Engineering', 'sal' => 79000],
            ['first_name' => 'Lara', 'last_name' => 'Croft', 'pos' => 'Security Expert', 'dept' => 'Digital Operations', 'sal' => 92000],
            ['first_name' => 'Arthur', 'last_name' => 'Morgan', 'pos' => 'Operations Lead', 'dept' => 'Digital Operations', 'sal' => 77000],
        ];

        // 3. Process Employees
        foreach ($employeesData as $index => $data) {
            $email = strtolower($data['first_name'] . '.' . $data['last_name'] . '@company.io');
            $employee = Employee::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $email,
                'phone' => '+1 (555) ' . rand(100, 999) . '-' . rand(1000, 9999),
                'department' => $data['dept'],
                'position' => $data['pos'],
                'hire_date' => Carbon::now()->subMonths(rand(6, 48))->toDateString(),
                'salary' => $data['sal'],
            ]);

            // Create corresponding User account
            User::create([
                'name' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $email,
                'password' => Hash::make('password'),
                'role' => 'employee',
            ]);

            // 4. Initialize Leave Balances
            LeaveBalance::create([
                'employee_id' => $employee->id,
                'year' => Carbon::now()->year,
                'accrued_days' => 25,
                'used_days' => rand(2, 10),
                'available_days' => 15, // Simple math for seed data
                'last_accrual_date' => Carbon::now()->startOfYear()->toDateString(),
            ]);

            // 5. Generate Past Leave Requests
            $statuses = ['approved', 'rejected', 'pending'];
            for ($i = 0; $i < rand(1, 3); $i++) {
                $start = Carbon::now()->subDays(rand(1, 100));
                $end = (clone $start)->addDays(rand(2, 5));
                
                CongeRequest::create([
                    'employee_id' => $employee->id,
                    'start_date' => $start->toDateString(),
                    'end_date' => $end->toDateString(),
                    'working_days' => rand(2, 5),
                    'reason' => 'Restorative leave for mental health and personal equilibrium.',
                    'status' => $statuses[array_rand($statuses)],
                    'approved_by' => $rh->id,
                    'decided_at' => Carbon::now()->subDays(rand(1, 5)),
                ]);
            }

            // 6. Performance Scorecards
            for ($year = Carbon::now()->year - 1; $year <= Carbon::now()->year; $year++) {
                $score = rand(3, 5);
                Evaluation::create([
                    'employee_id' => $employee->id,
                    'year' => $year,
                    'global_score' => $score,
                    'punctuality' => rand(3, 5),
                    'skills' => rand(3, 5),
                    'attitude' => rand(3, 5),
                    'results' => rand(3, 5),
                    'comment' => 'Exhibits high alignment with core organizational values and key performance indicators.',
                    'evaluated_by' => $rh->id,
                ]);
            }
        }
    }
}
