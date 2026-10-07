<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Technician;

class TechnicianSeeder extends Seeder
{
    public function run(): void
    {
        Technician::create([
            'name' => 'Rahim Khan',
            'email' => 'rahim@example.com',
            'phone' => '9876543210',
            'address' => 'Howrah, West Bengal',
            'specialization' => 'AC & Refrigerator Repair',
            'experience' => '5 years experience',
            'service_charge' => 500,
            'verified' => true,
            'available' => true,
            'rating' => 4.5,
        ]);

        Technician::create([
            'name' => 'Suman Das',
            'email' => 'suman@example.com',
            'phone' => '9876543211',
            'address' => 'Kolkata, West Bengal',
            'specialization' => 'Washing Machine & Electronics',
            'experience' => '4 years experience',
            'service_charge' => 400,
            'verified' => true,
            'available' => true,
            'rating' => 4.2,
        ]);

        Technician::create([
            'name' => 'Arif Ali',
            'email' => 'arif@example.com',
            'phone' => '9876543212',
            'address' => 'Howrah, West Bengal',
            'specialization' => 'AC & Electrical Repair',
            'experience' => '6 years experience',
            'service_charge' => 600,
            'verified' => true,
            'available' => true,
            'rating' => 4.7,
        ]);
    }
}