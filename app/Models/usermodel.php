<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;

class usermodel extends Authenticatable
{
    use Notifiable;

    protected $table = 'registrations';

    protected $fillable = [
    'name',
    'email',
    'phone',
    'address',
    'dob',
    'status',
    'password',
    'image',
];

    protected $hidden = [
        'password',
    ];

    public function products()
{
    return $this->hasMany(Product::class, 'user_id');
}
}