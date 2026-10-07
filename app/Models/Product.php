<?php

namespace App\Models;
use App\Models\Warranty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ProductPassport;
use App\Models\Maintenance;
use App\Models\RepairRequest;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category',
        'brand',
        'model',
        'serial_number',
        'purchase_date',
        'purchase_price',
        'condition',
        'image',
        'invoice',
        'status',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'purchase_price' => 'decimal:2',
    ];

    /**
     * Product belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(usermodel::class, 'user_id');
    }

    public function passport()
    {
        return $this->hasOne(ProductPassport::class);
    }

    public function warranty()
    {
        return $this->hasOne(Warranty::class, 'product_id');
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class, 'product_id');
    }

    public function repairRequests()
    {
        return $this->hasMany(RepairRequest::class, 'product_id');
    }
}