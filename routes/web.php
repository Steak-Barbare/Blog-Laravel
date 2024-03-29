<?php
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
Route::get('/acceuil', function() { return view('acceuil'); })->name('acceuil');


Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

Route::middleware(['auth'])->group(function() {

Route::resource('posts', PostController::class)
    ->except('index');
   
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

});

Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
