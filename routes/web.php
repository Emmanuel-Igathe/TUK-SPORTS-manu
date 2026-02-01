<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/registration', [App\Http\Controllers\RegistrationController::class, 'index'])->name('registration.index');
Route::post('/registration', [App\Http\Controllers\RegistrationController::class, 'store'])->name('registration.store');

Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule.index');

Route::get('/test-route', function () {
    return 'Routing is working!';
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/athletics', [App\Http\Controllers\AthleticsController::class, 'index'])->name('athletics.index');
Route::post('/athletics', [App\Http\Controllers\AthleticsController::class, 'store'])->name('athletics.store');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::post('/blog', [App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');

Route::get('/board-games', [App\Http\Controllers\BoardGamesController::class, 'index'])->name('board-games.index');
Route::post('/board-games', [App\Http\Controllers\BoardGamesController::class, 'store'])->name('board-games.store');

Route::get('/martial-arts', [App\Http\Controllers\MartialArtsController::class, 'index'])->name('martial-arts.index');
Route::post('/martial-arts', [App\Http\Controllers\MartialArtsController::class, 'store'])->name('martial-arts.store');

Route::get('/throwing-games', [App\Http\Controllers\ThrowingGamesController::class, 'index'])->name('throwing-games.index');
Route::post('/throwing-games', [App\Http\Controllers\ThrowingGamesController::class, 'store'])->name('throwing-games.store');

Route::get('/ball-games', [App\Http\Controllers\BallGameRegistrationController::class, 'index'])->name('ball-games.index');
Route::post('/ball-games', [App\Http\Controllers\BallGameRegistrationController::class, 'store'])->name('ball-games.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // Redirect coaches and admins to their respective dashboards
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        
        if (auth()->user()->role === 'coach') {
            return redirect()->route('coach.dashboard');
        }
        
        return view('dashboard');
    })->name('dashboard');
});

// Admin Authentication Routes
Route::get('/admin/login', [App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard & Management Routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    
    Route::post('/event/store', [App\Http\Controllers\AdminController::class, 'storeEvent'])->name('event.store');
    Route::delete('/event/{id}', [App\Http\Controllers\AdminController::class, 'deleteEvent'])->name('event.delete');
    
    Route::post('/player/store', [App\Http\Controllers\AdminController::class, 'storePlayer'])->name('player.store');
    Route::delete('/player/{id}', [App\Http\Controllers\AdminController::class, 'deletePlayer'])->name('player.delete');
    
    Route::post('/blog/store', [App\Http\Controllers\AdminController::class, 'storeBlogPost'])->name('blog.store');
    Route::delete('/blog/{id}', [App\Http\Controllers\AdminController::class, 'deleteBlogPost'])->name('blog.delete');
    
    Route::post('/user/{id}/make-coach', [App\Http\Controllers\AdminController::class, 'makeCoach'])->name('user.make-coach');
    Route::post('/user/{id}/revoke-coach', [App\Http\Controllers\AdminController::class, 'revokeCoach'])->name('user.revoke-coach');

    Route::get('/ball-games', [App\Http\Controllers\BallGameRegistrationController::class, 'adminIndex'])->name('ball-games.admin');
});

// Coach Dashboard Routes
Route::middleware(['auth', \App\Http\Middleware\CoachMiddleware::class])->prefix('coach')->name('coach.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\CoachDashboardController::class, 'index'])->name('dashboard');
    Route::post('/update-stats', [App\Http\Controllers\CoachDashboardController::class, 'updateStats'])->name('update-stats');

    // Coach Event Management Routes
    Route::post('/events', [App\Http\Controllers\CoachEventController::class, 'store'])->name('events.store');
    Route::put('/events/{id}', [App\Http\Controllers\CoachEventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [App\Http\Controllers\CoachEventController::class, 'destroy'])->name('events.destroy');

    // Coach Player Management Routes
    Route::post('/players', [App\Http\Controllers\CoachPlayerController::class, 'store'])->name('players.store');
    Route::put('/players/{id}', [App\Http\Controllers\CoachPlayerController::class, 'update'])->name('players.update');
    Route::delete('/players/{id}', [App\Http\Controllers\CoachPlayerController::class, 'destroy'])->name('players.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
