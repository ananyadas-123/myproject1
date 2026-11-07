<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MaintenanceController extends Controller
{
    // CREATE MAINTENANCE
    public function create(Product $product)
    {
        abort_unless($product->user_id === Auth::id(), 403);

        return view('maintenances.create', compact('product'));
    }


    // STORE MAINTENANCE
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

        $validated['status'] = Carbon::parse(
            $validated['next_service_date']
        )->startOfDay()->lt(today()) ? 'overdue' : 'scheduled';

        $validated['reminder_enabled'] =
            $request->boolean('reminder_enabled');

        Maintenance::create($validated);

        return redirect()
            ->route('products.passport', $product)
            ->with('success', 'Maintenance schedule saved successfully!');
    }


    // MAINTENANCE HISTORY
    public function index()
    {
        $maintenances = Maintenance::with('product')
            ->whereHas('product', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->latest()
            ->paginate(10);

        $upcomingReminders = Maintenance::with('product')
            ->where('reminder_enabled', true)
            ->whereDate('next_service_date', '>=', today())
            ->whereDate('next_service_date', '<=', today()->addDays(7))
            ->whereHas('product', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('next_service_date')
            ->get();

        $overdueReminders = Maintenance::with('product')
            ->where('reminder_enabled', true)
            ->whereDate('next_service_date', '<', today())
            ->where('status', '!=', 'completed')
            ->whereHas('product', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('next_service_date')
            ->get();
            
        return view('maintenances.index', compact(
            'maintenances',
            'upcomingReminders',
            'overdueReminders'
));
    }


    // EDIT MAINTENANCE
    public function edit(Maintenance $maintenance)
    {
        abort_unless(
            $maintenance->product &&
            $maintenance->product->user_id === Auth::id(),
            403
        );

        return view('maintenances.edit', compact('maintenance'));
    }


    // UPDATE MAINTENANCE
    public function update(Request $request, Maintenance $maintenance)
    {
        abort_unless(
            $maintenance->product &&
            $maintenance->product->user_id === Auth::id(),
            403
        );

        $validated = $request->validate([
            'service_type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'last_service_date' => 'nullable|date',
            'next_service_date' => 'required|date',
            'estimated_cost' => 'nullable|numeric|min:0',
            'reminder_enabled' => 'nullable|boolean',
        ]);

        $validated['reminder_enabled'] =
            $request->boolean('reminder_enabled');

        if ($maintenance->status !== 'completed') {
            $validated['status'] = Carbon::parse(
                $validated['next_service_date']
            )->startOfDay()->lt(today()) ? 'overdue' : 'scheduled';
        }

        $maintenance->update($validated);

        return redirect()
            ->route('maintenances.index')
            ->with('success', 'Maintenance updated successfully!');
    }


    // COMPLETE MAINTENANCE FROM HISTORY PAGE
    public function markComplete(Maintenance $maintenance)
    {
        abort_unless(
            $maintenance->product &&
            $maintenance->product->user_id === Auth::id(),
            403
        );

        $maintenance->update([
            'status' => 'completed',
            'last_service_date' => now()->toDateString(),
        ]);

        return redirect()
            ->route('maintenances.index')
            ->with('success', 'Maintenance marked as completed!');
    }


    // EXISTING COMPLETE METHOD FOR PRODUCT PASSPORT
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


    // DELETE MAINTENANCE
    public function destroy(Maintenance $maintenance)
    {
        abort_unless(
            $maintenance->product &&
            $maintenance->product->user_id === Auth::id(),
            403
        );

        $maintenance->delete();

        return redirect()
            ->route('maintenances.index')
            ->with('success', 'Maintenance deleted successfully!');
    }
}