<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\LeaveBalance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create RH user
        $rh = User::create([
            'name' => 'RH User',
            'email' => 'rh@example.com',
            'password' => Hash::make('password'),
            'role' => 'rh',
        ]);

        // Create employee user
        $employeeUser = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'rh',
        ]);

        // Create employees
        $employees = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '123-456-7890',
                'department' => 'Engineering',
                'position' => 'Senior Developer',
                'hire_date' => '2023-01-15',
                'salary' => 75000,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane.smith@example.com',
                'phone' => '234-567-8901',
                'department' => 'Marketing',
                'position' => 'Marketing Manager',
                'hire_date' => '2022-06-01',
                'salary' => 65000,
            ],
            [
                'first_name' => 'Mike',
                'last_name' => 'Johnson',
                'email' => 'mike.johnson@example.com',
                'phone' => '345-678-9012',
                'department' => 'Engineering',
                'position' => 'Junior Developer',
                'hire_date' => '2024-01-10',
                'salary' => 50000,
            ],
            [
                'first_name' => 'Sarah',
                'last_name' => 'Williams',
                'email' => 'sarah.williams@example.com',
                'phone' => '456-789-0123',
                'department' => 'HR',
                'position' => 'HR Specialist',
                'hire_date' => '2023-03-20',
                'salary' => 55000,
            ],
            [
                'first_name' => 'David',
                'last_name' => 'Brown',
                'email' => 'david.brown@example.com',
                'phone' => '567-890-1234',
                'department' => 'Sales',
                'position' => 'Sales Representative',
                'hire_date' => '2023-07-01',
                'salary' => 60000,
            ],
        ];

        foreach ($employees as $employeeData) {
            $employee = Employee::create($employeeData);
            
            // Create leave balance for current year
            LeaveBalance::create([
                'employee_id' => $employee->id,
                'year' => now()->year,
                'accrued_days' => 18,
                'used_days' => 0,
                'available_days' => 18,
                'last_accrual_date' => now()->toDateString(),
            ]);
        }

        // Link the first employee to the employee user
        $firstEmployee = Employee::first();
        if ($firstEmployee) {
            // Note: employee_id column doesn't exist in users table, skipping this link
        }
    }
}
