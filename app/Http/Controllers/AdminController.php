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
}