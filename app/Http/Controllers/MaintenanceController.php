<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaintenanceController extends Controller
{
    public function create(Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        return view('maintenances.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        $validated = $request->validate([
            'service_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'last_service_date' => 'nullable|date',
            'next_service_date' => 'required|date',
            'estimated_cost' => 'nullable|numeric|min:0',
            'reminder_enabled' => 'nullable|boolean',
        ]);

        $validated['product_id'] = $product->id;

        $validated['status'] = now()->startOfDay()->gt(
            $validated['next_service_date']
        ) ? 'overdue' : 'scheduled';

        $validated['reminder_enabled'] =
            $request->boolean('reminder_enabled');

        Maintenance::create($validated);

        return redirect()
            ->route('products.passport', $product)
            ->with('success', 'Maintenance schedule saved successfully!');
    }

    public function complete(Product $product, Maintenance $maintenance)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        abort_unless($maintenance->product_id === $product->id, 404);

        $maintenance->update([
            'status' => 'completed',
            'last_service_date' => now()->toDateString(),
        ]);

        return redirect()
            ->route('products.passport', $product)
            ->with('success', 'Maintenance marked as completed!');
    }
}