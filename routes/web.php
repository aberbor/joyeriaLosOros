<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',HomeComponent::class)->name('home.index');
Route::get('/shop',ShopComponent::class)->name('shop');
Route::get('/cart',CartComponent::class)->name('shop.cart');
Route::get('/checkout',CheckoutComponent::class)->name('shop.checkout');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth','authadmin'])->group(function () {
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
});

require __DIR__.'/auth.php';
