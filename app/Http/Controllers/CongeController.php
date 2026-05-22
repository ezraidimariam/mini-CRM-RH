<?php

namespace App\Http\Controllers;

use App\Models\CongeRequest;
use App\Models\Employee;
use App\Services\LeaveService;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    public function __construct(private LeaveService $leaveService)
    {
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'admin' || $user->role === 'rh') {
            $requests = CongeRequest::with('employee', 'approvedBy')
                ->latest()
                ->paginate(10);
        } else {
            $requests = CongeRequest::with('employee', 'approvedBy')
                ->where('employee_id', $user->employee?->id ?? 0)
                ->latest()
                ->paginate(10);
        }

        return view('conges.index', compact('requests'));
    }

    public function create()
    {
        if (auth()->user()->role === 'admin' || auth()->user()->role === 'rh') {
            return redirect()->route('conges.index');
        }

        return view('conges.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'nullable|string|max:1000',
        ]);

        $employee = Employee::findOrFail(auth()->user()->employee->id);

        if (!$this->leaveService->canRequestLeave($employee)) {
            return back()->with('error', 'Période de carence non écoulée (6 mois requis).');
        }

        $workingDays = $this->leaveService->countWorkingDays($validated['start_date'], $validated['end_date']);

        if (!$this->leaveService->hasEnoughBalance($employee, $workingDays)) {
            return back()->with('error', 'Solde de congés insuffisant.');
        }

        CongeRequest::create([
            'employee_id' => $employee->id,
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'working_days' => $workingDays,
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        return redirect()->route('conges.index')->with('success', 'Demande de congé soumise avec succès.');
    }

    public function approve(CongeRequest $congeRequest)
    {
        $this->authorize('approve', $congeRequest);

        $congeRequest->update([
            'status' => 'approved',
            'approved_by' => auth()->id(),
            'decided_at' => now(),
        ]);

        $this->leaveService->useLeaveDays($congeRequest->employee, $congeRequest->working_days);

        return back()->with('success', 'Congé approuvé avec succès.');
    }

    public function reject(Request $request, CongeRequest $congeRequest)
    {
        $this->authorize('approve', $congeRequest);

        $validated = $request->validate([
            'rejected_reason' => 'required|string|max:1000',
        ]);

        $congeRequest->update([
            'status' => 'rejected',
            'rejected_reason' => $validated['rejected_reason'],
            'approved_by' => auth()->id(),
            'decided_at' => now(),
        ]);

        return back()->with('success', 'Congé refusé avec succès.');
    }

    public function cancel(CongeRequest $congeRequest)
    {
        if ($congeRequest->employee_id !== auth()->user()->employee->id) {
            abort(403);
        }

        if ($congeRequest->status !== 'pending') {
            return back()->with('error', 'Seules les demandes en attente peuvent être annulées.');
        }

        $congeRequest->delete();

        return back()->with('success', 'Demande annulée avec succès.');
    }
}
