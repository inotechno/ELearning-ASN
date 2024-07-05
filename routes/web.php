<?php

use App\Http\Controllers\CertificateController;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\RegisterTeacher;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Category\CategoryIndex;
use App\Livewire\Certificate\CertificateIndex;
use App\Livewire\Course\CourseActive;
use App\Livewire\Course\CourseActivity;
use App\Livewire\Course\CourseCreate;
use App\Livewire\Course\CourseDetail;
use App\Livewire\Course\CourseEdit;
use App\Livewire\Course\CourseIndex;
use App\Livewire\Course\CourseParticipant;
use App\Livewire\Course\CourseProgress;
use App\Livewire\Dashboard\DashboardIndex;
use App\Livewire\Participant\ParticipantCourse;
use App\Livewire\Profile\ProfileIndex;
use App\Livewire\User\UserIndex;
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
    Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard');
    Route::get('/profile', ProfileIndex::class)->name('profile')->middleware('role:teacher|participant|administrator');

    Route::group(['prefix' => 'course', 'middleware' => ['role:administrator|teacher']], function () {
        Route::get('create', CourseCreate::class)->name('course.create');
        Route::get('edit/{slug}', CourseEdit::class)->name('course.edit');
    });

    Route::group(['prefix' => 'users', 'middleware' => ['role:administrator']], function () {
        Route::get('/', UserIndex::class)->name('users');
    });

    Route::get('/user/edit/{id}', ProfileIndex::class)->name('user.edit')->middleware('role:administrator');
    Route::get('/participants/courses', ParticipantCourse::class)->name('participants.courses')->middleware('role:administrator');

    Route::get('/category', CategoryIndex::class)->name('category');

    Route::get('/courses', CourseIndex::class)->name('courses');
    Route::group(['middleware' => ['role:teacher']], function () {
        Route::get('/course-active', CourseActive::class)->name('course.active');
        Route::get('/course-activity/{slug}', CourseActivity::class)->name('course.activity');
    });

    Route::group(['middleware' => ['role:participant']], function () {
        Route::get('/my-course', CourseParticipant::class)->name('courses.my-course');
        Route::get('/my-course/progress/{slug}', CourseProgress::class)->name('courses.my-course.progress');
        Route::get('/my-course/certificate/{slug}', CertificateIndex::class)->name('courses.my-course.certificate');
    });

    Route::get('/certificate/{slug}/{participant_id}/generate', [CertificateController::class, 'generate'])->name('certificate.generate');
    Route::get('/certificate/{slug}/{participant_id}/download', [CertificateController::class, 'download'])->name('certificate.download');

    Route::get('/course/{slug}', CourseDetail::class)->name('course.show');
    // Route::get('/course/{slug}', CourseDetail::class)->name('course.show');
    // Route::get('/course/create', CourseCreate::class)->name('course.create');
});
