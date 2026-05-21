<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        $evaluations = Evaluation::with('employee', 'evaluatedBy')
            ->latest()
            ->paginate(10);

        return view('evaluations.index', compact('evaluations'));
    }

    public function create(Employee $employee = null)
    {
        if (!$employee) {
            $employees = Employee::orderBy('first_name')->get();
            return view('evaluations.create', compact('employee', 'employees'));
        }

        return view('evaluations.create', compact('employee'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'year' => 'required|integer|min:2020|max:' . (now()->year + 1),
            'global_score' => 'required|integer|min:1|max:5',
            'punctuality' => 'required|integer|min:1|max:5',
            'skills' => 'required|integer|min:1|max:5',
            'attitude' => 'required|integer|min:1|max:5',
            'results' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:2000',
        ]);

        $existing = Evaluation::where('employee_id', $validated['employee_id'])
            ->where('year', $validated['year'])
            ->first();

        if ($existing) {
            return back()->with('error', 'Une évaluation existe déjà pour cet employé cette année.');
        }

        Evaluation::create([
            ...$validated,
            'evaluated_by' => auth()->id(),
        ]);

        return redirect()->route('evaluations.index')->with('success', 'Évaluation créée avec succès.');
    }
}
