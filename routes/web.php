<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'get_all_student'])->name('student.get.index'); // Hien thi danh sach
Route::get('/students/create', [StudentController::class, 'create'])->name('student.get.create'); // Hien thi form
Route::post('/students/create', [StudentController::class, 'store'])->name('student.post.create'); // Them du lieu

Route::get('/students/{id}/detail', [StudentController::class, 'detail'])->name('student.get.detail'); // Hien du lieu

Route::get('/students/{id}/update', [StudentController::class, 'get_student_by_id'])->name('student.get.update'); // Hien thi form sua
Route::post('/students/{id}/update', [StudentController::class, 'update'])->name('student.post.update'); // Sua du lieu

Route::get('/students/{id}/delete', [StudentController::class, 'destroy'])->name('student.get.delete'); // Xoa du lieu
