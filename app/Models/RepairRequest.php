<?php

namespace App\Models;

use App\Models\RepairQuote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Technician;

class RepairRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'technician_id',
        'problem_title',
        'problem_description',
        'problem_image',
        'priority',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(usermodel::class, 'user_id');
    }

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'technician_id');
    }

    public function quotes()
    {
        return $this->hasMany(RepairQuote::class, 'repair_request_id');
    }
}