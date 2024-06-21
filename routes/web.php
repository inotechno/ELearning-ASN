<?php

use App\Livewire\Auth\Login;
use App\Livewire\Course\CourseCreate;
use App\Livewire\Course\CourseIndex;
use App\Livewire\Dashboard\DashboardIndex;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', Login::class)->name('login');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');

    Route::get('/courses', CourseIndex::class)->name('courses');
    Route::get('/course/create', CourseCreate::class)->name('course.create');
}); 