<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show all products of logged-in user.
     */
    public function index()
    {
        $products = Auth::user()->products()->latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show Add Product form.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a new product.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'serial_number' => 'required|string|max:100|unique:products,serial_number',
            'purchase_date' => 'required|date',
            'purchase_price' => 'nullable|numeric|min:0',
            'condition' => 'required|in:new,good,fair,poor',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'invoice' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('products/images', 'public');
        }

        if ($request->hasFile('invoice')) {
            $validated['invoice'] = $request->file('invoice')
                ->store('products/invoices', 'public');
        }

        $validated['user_id'] = Auth::id();

        Product::create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product registered successfully!');
    }

    /**
     * Show a single product.
     */
    public function show(Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        return view('products.show', compact('product'));
    }

    public function lifecycle(Product $product)
    {
        if ($product->user_id !== auth()->id()) {
            abort(403);
        }

        return view('products.lifecycle', compact('product'));
    }
}