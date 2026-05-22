<x-app-layout>
    <x-slot name="header">Archived Employees</x-slot>

    <div class="table-shell">
        <table class="w-full text-left text-sm">
            <thead class="table-head">
                <tr>
                    <th class="px-5 py-4">Employee</th>
                    <th class="px-5 py-4">Department</th>
                    <th class="px-5 py-4">Position</th>
                    <th class="px-5 py-4">Archived date</th>
                    <th class="px-5 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($employees as $employee)
                    <tr>
                        <td class="px-5 py-4 font-medium text-slate-950">{{ $employee->full_name }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $employee->department }}</td>
                        <td class="px-5 py-4 text-slate-600">{{ $employee->position }}</td>
                        <td class="px-5 py-4 text-slate-500">{{ $employee->deleted_at?->format('M d, Y') }}</td>
                        <td class="px-5 py-4 text-right"><span class="text-xs font-semibold text-slate-400">Restore flow pending</span></td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-5 py-10"><div class="empty-state">No archived employees.</div></td></tr>
                @endforelse
            </tbody>
        </table>
        <div class="border-t border-slate-200 px-5 py-4">{{ $employees->links() }}</div>
    </div>
</x-app-layout>
