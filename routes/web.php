<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Home;
use App\Livewire\ShowPost;
use App\Livewire\StoryDetails;
use App\Livewire\SubscriptionPlans;
use App\Livewire\UserProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('user/home', Home::class);
    Route::get('show/{query}', StoryDetails::class);
    Route::get('profile/{user}', UserProfile::class);
    Route::get('subcriptions', SubscriptionPlans::class)->name('subscription.page');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
