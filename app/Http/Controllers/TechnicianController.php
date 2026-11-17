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

        // Only verified and available technicians can be assigned.
        $technician = Technician::where('verified', true)
            ->where('available', true)
            ->findOrFail($validated['technician_id']);

        $repairRequest->update([
            'technician_id' => $technician->id,
            'status' => 'assigned',
        ]);

        return redirect()
            ->route('repair.history')
            ->with('success', 'Technician assigned successfully!');
    }
}