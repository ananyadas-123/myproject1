<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPassportController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RepairRequestController;

// Route::get('/', function () {
//     // return view('welcome');
//     return view("Welcome");
// });
Route::get('/',function(){
    return view('home.home');

})->name('home');


Route::get('/home-details', function () {
    return view('home.details');
})->name('home.details');

Route::get('/about',function(){
    return view('about');

})->name('about');

Route::get('/controller_test',[UserController::class,'index'])->name('http-controller');


//Route::get('/login', [UserController::class, 'login'])->name('login');

// Route::get('/register', [UserController::class, 'register'])->name('register');

// Route::resource('user',UserController::class)->names([
//     'index'=>'user.list',
//     'create'=>'user.add'
//     ]);

// Route::resource('user',UserController::class)->only(['index','create','store'])->names([
//     'index'=>'user.list',
//     'create'=>'user.add'
//     ]);

Route::resource('user',UserController::class)->except(['index','create','store'])->names([
    'index'=>'user.list',
    'create'=>'user.add'
    ]);

Route::get('/register',[UserController::class,'register'])->name('register');

Route::post('/register',[UserController::class,'store'])->name('register.store');

Route::get('/login',[UserController::class,'login'])->name('login');

Route::post('/login',[UserController::class,'loginCheck'])->name('login.check');

//Product Life project 
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/logout', function () {

        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');

    })->name('logout');

    Route::get('/profile', [UserController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [UserController::class, 'update'])
        ->name('profile.update');

    Route::get('/products', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{product}/passport', [ProductPassportController::class, 'show'])
        ->name('products.passport');

    Route::get('/products/{product}/warranty/create', [WarrantyController::class, 'create'])
        ->name('warranties.create');

    Route::post('/products/{product}/warranty', [WarrantyController::class, 'store'])
        ->name('warranties.store');

    Route::get('/products/{product}/maintenance/create', [MaintenanceController::class, 'create'])
        ->name('maintenances.create');

    Route::post('/products/{product}/maintenance', [MaintenanceController::class, 'store'])
        ->name('maintenances.store');
    
    Route::post('/products/{product}/maintenance/{maintenance}/complete', [MaintenanceController::class, 'complete'])
        ->name('maintenances.complete');

    Route::get('/products/{product}/repair/create', [RepairRequestController::class, 'create'])
        ->name('repair_requests.create');

    Route::post('/products/{product}/repair', [RepairRequestController::class, 'store'])
        ->name('repair_requests.store');

    Route::get('/repair-requests/{repairRequest}/technicians',[TechnicianController::class, 'index'])
        ->name('technicians.index');

    Route::post('/repair-requests/{repairRequest}/assign-technician',[TechnicianController::class, 'assign'])       
        ->name('technicians.assign');

    Route::get(
        '/products/{product}/lifecycle',
        [ProductController::class, 'lifecycle']
    )->name('products.lifecycle');

    Route::get('/products/{product}', [ProductController::class, 'show'])
        ->name('products.show');
});


Route::prefix('admin')->group(function () {

    Route::get('/login', [AdminController::class, 'login'])
        ->name('admin.login');

    Route::post('/login', [AdminController::class, 'loginCheck'])
        ->name('admin.login.check');

    Route::post('/logout', [AdminController::class, 'logout'])
        ->name('admin.logout');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

    });
});