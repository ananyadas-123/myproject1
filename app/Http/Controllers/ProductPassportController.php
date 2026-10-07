<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPassport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductPassportController extends Controller
{
    public function show(Product $product)
    {
        // Only product owner can view passport
        abort_unless($product->user_id === Auth::id(), 403);

        // Find existing passport
        $passport = $product->passport;
        $warranty = $product->warranty;
        $maintenances = $product->maintenances()->latest()->get();
        $repairRequests = $product->repairRequests()->latest()->get();

        // If passport doesn't exist, create one automatically
        if (!$passport) {
            $passport = ProductPassport::create([
                'product_id' => $product->id,
                'passport_number' => 'PL-' . strtoupper(Str::random(10)),
                'description' => 'Digital Product Passport for '
                    . $product->brand . ' ' . $product->model,
                'status' => 'active',
            ]);
        }

       return view(
            'products.passport',
            compact(
                'product',
                'passport',
                'warranty',
                'maintenances',
                'repairRequests'
            )
        );
    }
}