<?php

use App\Http\Controllers\Web\News\SetLanguageController;
use App\Http\Controllers\Web\News\NewsController;
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

Route::get('/', fn () => view('news.home'))->name('home');

Route::get('/blog', [NewsController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [NewsController::class, 'show'])->name('blog.show');

Route::get('/contact', fn () => view('news.contact'))->name('contact');

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        require_once __DIR__ . '/admin.php';
    });

Route::get('/set-language/{lang?}', SetLanguageController::class)->name('set-language');
