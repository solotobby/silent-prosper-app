<?php

use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GoogleSocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebhookController;
use App\Livewire\Admin\Category;
use App\Livewire\Admin\ListChapter;
use App\Livewire\Admin\ListStory;
use App\Livewire\Admin\ReadStory;
use App\Livewire\Admin\User;
use App\Livewire\AdminDashboard;
use App\Livewire\AdminHome;
use App\Livewire\BookmarkStory;
use App\Livewire\BookShelf;
use App\Livewire\EditStory;
use App\Livewire\EditStoryChapter;
use App\Livewire\Home;
use App\Livewire\LandingPage;
use App\Livewire\Read;
use App\Livewire\Settings;
use App\Livewire\ShortStory;
use App\Livewire\ShowPost;
use App\Livewire\StoryDetails;
use App\Livewire\SubscriptionPlans;
use App\Livewire\UserProfile;
use App\Livewire\Write;
use App\Livewire\WriteStory;
use Illuminate\Support\Facades\Route;

Route::get('/', [GeneralController::class, 'landingPage']);
Route::get('details/{slug}', [GeneralController::class, 'details']);

Route::get('about', [GeneralController::class, 'about']);
Route::get('privacy-policies', [GeneralController::class, 'privacy']);
Route::get('terms-conditions', [GeneralController::class, 'terms']);
Route::get('search', [GeneralController::class, 'search']);
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(GoogleSocialiteController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::post('post/chapter', [HomeController::class, 'postChapter'])->name('post.chapter');
    Route::get('test', [HomeController::class, 'test'])->name('test');
    Route::get('edit/story/{slug}', [HomeController::class, 'EditStory']);
    Route::get('/get-subcategories/{id}', [HomeController::class, 'getSubcategories']);

    Route::get('subscribe/{plan}', [HomeController::class, 'subscribe']);
    Route::get('validate/subscription/plan', [HomeController::class, 'subscribePlan']);
    Route::get('subscriptions/closed', [HomeController::class, 'subscriptionClosed']);
    Route::post('webhook/handle', [WebhookController::class, 'handle']);

    Route::get('update/story/completed/{slug}', [HomeController::class, 'updateStoryCompleted']);

    Route::get('/send-email', [HomeController::class, 'sendEmail']);
   
    Route::get('user/home', Home::class);
    Route::get('show/{slug}', StoryDetails::class);
    Route::get('profile/{username}', UserProfile::class);
    Route::get('subscriptions', SubscriptionPlans::class)->name('subscription.page');
    Route::get('bookmarks', BookmarkStory::class);
    Route::get('shelf', BookShelf::class);
    Route::get('edit/{slug}', EditStory::class);
    Route::get('settings', Settings::class);



    Route::get('create/story', WriteStory::class);
    Route::get('edit/story/{slug}', WriteStory::class);
   
    Route::get('write/{slug}', Write::class); 
    Route::get('edit/story/chapter/{slug}', EditStoryChapter::class);
    Route::get('read/{slug}', Read::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    ///AdminRoutes

   
    Route::get('admin/home',  AdminHome::class);
    Route::get('admin/story/list/{status}', ListStory::class);
    // Route::get('admin/story/list/unpublished', ListStory::class);
    Route::get('admin/story/chapter/{query}', ListChapter::class)->name('story.chapter');
    Route::get('admin/story/chapter/read/{query}', ReadStory::class)->name('story.read');
    Route::get('admin/categories', Category::class);
    Route::get('admin/users', User::class);

    Route::get('publish/story/{slug}', [HomeController::class, 'publishStory']);
    

});

require __DIR__.'/auth.php';
