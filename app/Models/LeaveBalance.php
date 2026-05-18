<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveBalance extends Model
{
    protected $fillable = [
        'employee_id',
        'year',
        'accrued_days',
        'used_days',
        'available_days',
        'last_accrual_date',
    ];

    protected $casts = [
        'accrued_days' => 'decimal:1',
        'used_days' => 'decimal:1',
        'available_days' => 'decimal:1',
        'last_accrual_date' => 'date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function updateAvailableDays(): void
    {
        $this->available_days = $this->accrued_days - $this->used_days;
        $this->save();
    }
}
