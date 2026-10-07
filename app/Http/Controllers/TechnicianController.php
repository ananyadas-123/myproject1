<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\RepairRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicianController extends Controller
{
    public function index(RepairRequest $repairRequest)
    {
        abort_unless($repairRequest->user_id === Auth::id(), 403);

        $technicians = Technician::where('verified', true)
            ->where('available', true)
            ->latest()
            ->get();

        return view(
            'technicians.index',
            compact('technicians', 'repairRequest')
        );
    }

    public function assign(Request $request, RepairRequest $repairRequest)
    {
        abort_unless($repairRequest->user_id === Auth::id(), 403);

        $validated = $request->validate([
            'technician_id' => 'required|exists:technicians,id',
        ]);

        $repairRequest->update([
            'technician_id' => $validated['technician_id'],
            'status' => 'assigned',
        ]);

        return redirect()
            ->route('products.passport', $repairRequest->product_id)
            ->with('success', 'Technician assigned successfully!');
    }
}