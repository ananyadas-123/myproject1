<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technician extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'specialization',
        'experience',
        'service_charge',
        'profile_image',
        'verified',
        'available',
        'rating',
    ];

    protected $casts = [
        'service_charge' => 'decimal:2',
        'verified' => 'boolean',
        'available' => 'boolean',
        'rating' => 'decimal:2',
    ];
}