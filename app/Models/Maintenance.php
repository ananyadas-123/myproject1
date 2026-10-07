<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'service_type',
        'description',
        'last_service_date',
        'next_service_date',
        'estimated_cost',
        'status',
        'reminder_enabled',
    ];

    protected $casts = [
        'last_service_date' => 'date',
        'next_service_date' => 'date',
        'estimated_cost' => 'decimal:2',
        'reminder_enabled' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}