<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RepairQuote extends Model
{
    use HasFactory;

    protected $fillable = [
        'repair_request_id',
        'technician_id',
        'estimated_cost',
        'description',
        'estimated_completion_date',
        'status',
    ];

    protected $casts = [
        'estimated_cost' => 'decimal:2',
        'estimated_completion_date' => 'date',
    ];

    public function repairRequest()
    {
        return $this->belongsTo(
            RepairRequest::class,
            'repair_request_id'
        );
    }

    public function technician()
    {
        return $this->belongsTo(
            Technician::class,
            'technician_id'
        );
    }
}