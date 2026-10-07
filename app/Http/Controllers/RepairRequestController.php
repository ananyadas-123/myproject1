<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RepairRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairRequestController extends Controller
{
    public function create(Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        return view('repair_requests.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        $validated = $request->validate([
            'problem_title' => 'required|string|max:255',
            'problem_description' => 'required|string',
            'problem_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'priority' => 'required|in:low,medium,high,urgent',
        ]);

        if ($request->hasFile('problem_image')) {
            $validated['problem_image'] = $request->file('problem_image')
                ->store('repair_requests/images', 'public');
        }

        $validated['product_id'] = $product->id;
        $validated['user_id'] = Auth::id();
        $validated['status'] = 'pending';

        RepairRequest::create($validated);

        return redirect()
            ->route('products.passport', $product)
            ->with('success', 'Repair request submitted successfully!');
    }
}