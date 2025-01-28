<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebhookController;
use App\Livewire\AdminDashboard;
use App\Livewire\AdminHome;
use App\Livewire\BookmarkStory;
use App\Livewire\BookShelf;
use App\Livewire\EditStory;
use App\Livewire\Home;
use App\Livewire\Read;
use App\Livewire\ShortStory;
use App\Livewire\ShowPost;
use App\Livewire\StoryDetails;
use App\Livewire\SubscriptionPlans;
use App\Livewire\UserProfile;
use App\Livewire\Write;
use App\Livewire\WriteStory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('test', [HomeController::class, 'test'])->name('test');
    Route::get('edit/story/{slug}', [HomeController::class, 'EditStory']);

    Route::get('subscribe/{plan}', [HomeController::class, 'subscribe']);
    Route::get('validate/subscription/plan', [HomeController::class, 'subscribePlan']);
    Route::post('webhook/handle', [WebhookController::class, 'handle']);
    //Paypal
    Route::get('create/subscription/{plan}', [PayPalController::class, 'createSubscription']);

    Route::get('user/home', Home::class);
    Route::get('show/{slug}', StoryDetails::class);
    Route::get('profile/{user}', UserProfile::class);
    Route::get('subcriptions', SubscriptionPlans::class)->name('subscription.page');
    Route::get('bookmarks', BookmarkStory::class);
    Route::get('shelf', BookShelf::class);
    Route::get('edit/{slug}', EditStory::class);



    Route::get('write', WriteStory::class);
    Route::get('write/{slug}', Write::class);
    Route::get('read/{slug}', Read::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    ///AdminRoutes

   
    Route::get('admin/home',  AdminHome::class);
});

require __DIR__.'/auth.php';
