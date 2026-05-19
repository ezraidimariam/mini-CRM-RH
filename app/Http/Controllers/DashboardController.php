<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\CongeRequest;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEmployees = Employee::active()->count();
        $pendingRequests = CongeRequest::pending()->count();
        $departmentStats = Employee::active()
            ->selectRaw('department, COUNT(*) as count')
            ->groupBy('department')
            ->get()
            ->pluck('count', 'department');

        $recentActivities = [
            ['action' => 'Nouvel employé ajouté', 'time' => 'Il y a 2 heures'],
            ['action' => 'Demande de congé approuvée', 'time' => 'Il y a 5 heures'],
            ['action' => 'Évaluation créée', 'time' => 'Hier'],
        ];

        return view('dashboard', compact(
            'totalEmployees',
            'pendingRequests',
            'departmentStats',
            'recentActivities'
        ));
    }
}
