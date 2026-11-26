<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\usermodel;
use App\Models\Product;
use App\Models\Technician;
use App\Models\RepairRequest;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $credentials['email'])
            ->where('status', true)
            ->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {

            Auth::guard('admin')->login($admin);

            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()
            ->withInput($request->only('email'))
            ->withErrors([
                'email' => 'Invalid admin email or password.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $totalUsers = usermodel::count();
        $totalProducts = Product::count();
        $totalTechnicians = Technician::count();
        $totalRepairRequests = RepairRequest::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalProducts',
            'totalTechnicians',
            'totalRepairRequests'
        ));
    }

    public function users(Request $request)
    {
        $search = $request->input('search');

        $users = usermodel::query()
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalUsers = usermodel::count();

        return view('admin.users.index', compact(
            'users',
            'search',
            'totalUsers'
        ));
    }

        
    public function showUser($user)
    {
        $user = \App\Models\usermodel::with('products')
            ->findOrFail($user);

        return view('admin.users.show', compact('user'));
    }

    public function destroyUser($user)
    {
        $user = \App\Models\usermodel::findOrFail($user);

        // Do not delete users with linked products.
        if ($user->products()->exists()) {
            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'This user has linked products. Handle those products before deleting the account.'
                );
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    
 
    public function products(\Illuminate\Http\Request $request)
    {
        $search = trim($request->input('search', ''));

        $products = Product::with('user')
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('brand', 'like', "%{$search}%")
                    ->orWhere('model', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('serial_number', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $totalProducts = Product::count();

        return view('admin.products.index', compact(
            'products',
            'search',
            'totalProducts'
        ));
    }

    public function showProduct($product)
    {
        $product = Product::with('user')
            ->findOrFail($product);

        return view('admin.products.show', compact('product'));
    }

    public function destroyProduct($product)
    {
        $product = Product::findOrFail($product);

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully!');
    }

    // ================================
    // Technician Management
    // ================================

    public function technicians(Request $request)
    {
        $search = trim($request->input('search', ''));

        $technicians = Technician::when($search !== '', function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('specialization', 'like', "%{$search}%");
            });
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.technicians.index', compact(
            'technicians',
            'search'
        ));
    }

    public function createTechnician()
    {
        return view('admin.technicians.create');
    }

    public function storeTechnician(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:technicians,email',
            'phone' => 'required|string|max:30',
            'address' => 'nullable|string|max:1000',
            'specialization' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:100',
            'service_charge' => 'nullable|numeric|min:0',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')
                ->store('technicians/images', 'public');
        }

        // New technicians require admin verification.
        $validated['verified'] = false;
        $validated['available'] = true;

        Technician::create($validated);

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Technician added successfully. Please verify the technician.');
    }

    public function editTechnician(Technician $technician)
    {
        return view('admin.technicians.edit', compact('technician'));
    }

    public function updateTechnician(Request $request, Technician $technician)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:technicians,email,' . $technician->id,
            'phone' => 'required|string|max:30',
            'address' => 'nullable|string|max:1000',
            'specialization' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:100',
            'service_charge' => 'nullable|numeric|min:0',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'verified' => 'nullable|boolean',
            'available' => 'nullable|boolean',
        ]);

        if ($request->hasFile('profile_image')) {
            if ($technician->profile_image) {
                Storage::disk('public')->delete($technician->profile_image);
            }

            $validated['profile_image'] = $request->file('profile_image')
                ->store('technicians/images', 'public');
        }

        $validated['verified'] = $request->boolean('verified');
        $validated['available'] = $request->boolean('available');

        $technician->update($validated);

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Technician updated successfully!');
    }

    public function destroyTechnician(Technician $technician)
    {
        if ($technician->repairRequests()->exists()) {
            return redirect()
                ->route('admin.technicians.index')
                ->with('error', 'This technician has repair requests and cannot be deleted.');
        }

        if ($technician->profile_image) {
            Storage::disk('public')->delete($technician->profile_image);
        }

        $technician->delete();

        return redirect()
            ->route('admin.technicians.index')
            ->with('success', 'Technician deleted successfully!');
    }


    // ================================
    // Repair Request Management
    // ================================

    public function repairRequests(Request $request)
    {
        $search = trim($request->input('search', ''));

        $repairRequests = RepairRequest::with([
            'user', 'product', 'technician'
        ])
        ->when($search !== '', function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('problem_title', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhereHas('user', function ($userQuery) use ($search) {
                    $userQuery->where('name', 'like', "%{$search}%");
                });
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

        return view('admin.repairs.index', compact(
            'repairRequests', 'search'
        ));
    }

    public function updateRepairStatus(Request $request, RepairRequest $repairRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,assigned,quoted,confirmed,in_progress,completed,cancelled',
        ]);

        $repairRequest->update([
            'status' => $validated['status'],
        ]);

        return redirect()
            ->route('admin.repairs.index')
            ->with('success', 'Repair status updated successfully!');
    }

    public function showRepairRequest(RepairRequest $repairRequest)
    {
        $repairRequest->load([
            'user',
            'product',
            'technician',
            'quotes.technician'
        ]);

        return view('admin.repairs.show', compact('repairRequest'));
    }

}