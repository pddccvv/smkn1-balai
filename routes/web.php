<?php

use App\Http\Controllers\{DashboardController, PagesController, OrganizationalController, StudentController};
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/login-first', [PagesController::class, 'loginFirst'])->name('login.first');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
// Profile Routes
Route::prefix('profile')->group(function () {
    Route::get('/about', [PagesController::class, 'about'])->name('profile.about');
    Route::get('/welcome', [PagesController::class, 'welcome'])->name('profile.welcome');
    Route::get('/future', [PagesController::class, 'future'])->name('profile.future');
    Route::get('/organizational', [PagesController::class, 'organizational'])->name('profile.organizational');
    Route::get('/accreditation', [PagesController::class, 'accreditation'])->name('profile.accreditation');
});

// Activity Routes
Route::prefix('activity')->group(function () {
    Route::get('/extracurricular', [PagesController::class, 'extracurricular'])->name('activity.extracurricular');
    Route::get('/report', [PagesController::class, 'report'])->name('activity.report');
});

// Information Routes
Route::prefix('information')->group(function () {
    Route::get('/major', [PagesController::class, 'major'])->name('information.major');
    Route::get('/facility', [PagesController::class, 'facility'])->name('information.facility');
    Route::get('/achievement', [PagesController::class, 'achievement'])->name('information.achievement');
    Route::get('/teachers', [PagesController::class, 'teachers'])->name('information.teachers');
    Route::get('/students', [StudentController::class, 'students'])->name('information.students');
    Route::get('/ppdb', [PagesController::class, 'ppdb'])->name('information.ppdb');
    Route::get('/timetable', [PagesController::class, 'timetable'])->name('information.timetable');
    Route::get('/graduation', [PagesController::class, 'graduation'])->name('information.graduation');
    Route::get('/news', [PagesController::class, 'news'])->name('information.news');
    Route::get('/news/{id}', [PagesController::class, 'showNews'])->name('news.show');
});

// Gallery Routes
Route::prefix('gallery')->group(function () {
    Route::get('/photos', [PagesController::class, 'photos'])->name('gallery.photos');
    Route::get('/videos', [PagesController::class, 'videos'])->name('gallery.videos');
});
