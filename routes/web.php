<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TmpImageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ClassRoomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ViolationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(SearchController::class)->group(function(){
    Route::get('findTeacher', 'findTeacher')->name('findTeacher');
    Route::get('findClass', 'findClass')->name('findClass');
    Route::get('findViolation', 'findViolation')->name('findViolation');
    Route::get('findStudent', 'findStudent')->name('findStudent');
    Route::get('getDetailS/{id}', 'getDetailS')->name('getDetailS');
    Route::get('getDetailV/{id}', 'getDetailV')->name('getDetailV');
});

// Route::get('/linkstorage', function () {
//     Artisan::call('storage:link');
// });

// Route::get('/login',[AuthController::class, 'index'] )->name('login');
// Route::get('/register',[AuthController::class, 'registration'])->name('register');

// Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
// Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
// Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/upload_tmp', [TmpImageController::class, 'store']);
Route::delete('/delete_tmp', [TmpImageController::class, 'destroy']);

Route::get('/students/trashed', [StudentController::class, 'trashed'])->name('students.trashed');
Route::get('/students/restore/{id}', [StudentController::class, 'restore'])->name('students.restore');
Route::get('/students/forceDelete/{id}', [StudentController::class, 'forceDelete'])->name('students.forceDelete');
Route::resource('students', StudentController::class);

Route::get('/teachers/trashed', [TeacherController::class, 'trashed'])->name('teachers.trashed');
Route::get('/teachers/restore/{id}', [TeacherController::class, 'restore'])->name('teachers.restore');
Route::get('/teachers/forceDelete/{id}', [TeacherController::class, 'forceDelete'])->name('teachers.forceDelete');
Route::resource('teachers', TeacherController::class);

Route::get('/classes/trashed', [ClassRoomController::class, 'trashed'])->name('classes.trashed');
Route::get('/classes/restore/{id}', [ClassRoomController::class, 'restore'])->name('classes.restore');
Route::get('/classes/forceDelete/{id}', [ClassRoomController::class, 'forceDelete'])->name('classes.forceDelete');
Route::resource('classes', ClassRoomController::class);

Route::get('/violations/trashed', [ViolationController::class, 'trashed'])->name('violations.trashed');
Route::get('/violations/restore/{id}', [ViolationController::class, 'restore'])->name('violations.restore');
Route::get('/violations/forceDelete/{id}', [ViolationController::class, 'forceDelete'])->name('violations.forceDelete');
Route::resource('violations', ViolationController::class);

Route::get('/reports/trashed', [ReportController::class, 'trashed'])->name('reports.trashed');
Route::get('/reports/restore/{id}', [ReportController::class, 'restore'])->name('reports.restore');
Route::get('/reports/forceDelete/{id}', [ReportController::class, 'forceDelete'])->name('reports.forceDelete');
Route::resource('reports', ReportController::class);