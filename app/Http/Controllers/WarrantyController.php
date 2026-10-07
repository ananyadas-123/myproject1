<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WarrantyController extends Controller
{
    public function create(Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        return view('warranties.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        $validated = $request->validate([
            'warranty_provider' => 'nullable|string|max:255',
            'warranty_type' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'terms' => 'nullable|string',
            'warranty_document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('warranty_document')) {
            $validated['warranty_document'] = $request->file('warranty_document')
                ->store('warranties/documents', 'public');
        }

        $validated['product_id'] = $product->id;

        $validated['status'] = now()->lte($validated['end_date'])
            ? 'active'
            : 'expired';

        Warranty::updateOrCreate(
            ['product_id' => $product->id],
            $validated
        );

        return redirect()
            ->route('products.passport', $product)
            ->with('success', 'Warranty information saved successfully!');
    }
}