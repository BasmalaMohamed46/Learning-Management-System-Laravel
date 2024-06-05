<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::resource('courses', CourseController::class);
    Route::resource('courses.lessons', LessonController::class);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('courses/{course}/enroll', [EnrollmentController::class, 'enroll'])->name('courses.enroll');
    Route::get('my-courses', [EnrollmentController::class, 'index'])->name('my-courses');
    Route::get('search', [CourseController::class, 'search'])->name('courses.search');

});

require __DIR__.'/auth.php';
