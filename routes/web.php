<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\RegisterTeacher;
use App\Livewire\Course\CourseCreate;
use App\Livewire\Course\CourseDetail;
use App\Livewire\Course\CourseEdit;
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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/register-teacher', RegisterTeacher::class)->name('register.teacher');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');


    Route::group(['prefix' => 'course', 'middleware' => ['role:administrator|teacher']], function () {
        Route::get('create', CourseCreate::class)->name('course.create');
        Route::get('edit/{slug}', CourseEdit::class)->name('course.edit');
    });

    Route::get('/courses', CourseIndex::class)->name('courses');
    Route::get('/course/{slug}', CourseDetail::class)->name('course.show');
    // Route::get('/course/{slug}', CourseDetail::class)->name('course.show');
    // Route::get('/course/create', CourseCreate::class)->name('course.create');
});
