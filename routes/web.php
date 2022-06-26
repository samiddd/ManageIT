<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\OrganizingController;
use App\Http\Controllers\ActuatingController;
use App\Http\Controllers\ControllingController;
// use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [HomeController::class, 'index']);

Route::get('/template', function () {
    return view('layout.template');
});

Route::get('/sign-in', function () {
    return view('sign-in');
});

// Route::get('/my-event/{nama_user?}', function ($nama_user) {
//     return view('my-event', [$nama_user => 'Dimas_S']);
// });

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('/kegiatan');

Route::get('/organizing-committee-me', function () {
    return view('organizing-committee-me');
});

Route::get('/calendar', [KegiatanController::class, 'calendar'] );

Route::get('/kegiatan/kelola/{id_kegiatan}', [KegiatanController::class, 'kelola']);
Route::get('/kegiatan/detail/{id_kegiatan}', [KegiatanController::class, 'detail']);
Route::post('/kegiatan/add', [KegiatanController::class, 'add']);
Route::post('/kegiatan/edit/{id_kegiatan}', [KegiatanController::class, 'editData']);
//Route::match(['get','post'], '/edit/{id_kegiatan}', 'KegiatanController@edit');

Route::get('/kegiatan/delete/{id_kegiatan}', [KegiatanController::class, 'delete']);

Route::get('/kegiatan/kelola/{id_kegiatan}/planning', [PlanningController::class, 'index'])->name('kegiatan.planning.index');
Route::post('/kegiatan/kelola/{id_kegiatan}/planning/updateorinsert', [PlanningController::class, 'updateOrInsert']);
Route::post('/kegiatan/kelola/{id_kegiatan}/planning/create', [PlanningController::class, 'addData']);
Route::post('/kegiatan/kelola/{id_kegiatan}/planning/update', [PlanningController::class, 'editData']);

Route::get('/kegiatan/kelola/{id_kegiatan}/organizing', [OrganizingController::class, 'indexDivisi'])->name('kegiatan.organizing.indexDivisi');
Route::post('/kegiatan/kelola/{id_kegiatan}/organizing/adddivisi', [OrganizingController::class, 'addDivisi'])->name('kegiatan.organizing.addDivisi');
Route::post('/kegiatan/kelola/{id_divisi}/organizing/update', [OrganizingController::class, 'editDivisi'])->name('kegiatan.organizing.editDivisi');
Route::get('/kegiatan/kelola/{id_divisi}/organizing/delete', [OrganizingController::class, 'deleteDivisi'])->name('kegiatan.organizing.deleteDivisi');
Route::get('/kegiatan/kelola/{id_divisi}/organizing/panitia', [OrganizingController::class, 'indexTask'])->name('kegiatan.organizing.indexTask');
Route::post('/kegiatan/kelola/{id_divisi}/organizing/updatepic', [OrganizingController::class, 'editPICDivisi'])->name('kegiatan.organizing.editPICDivisi');

Route::post('/kegiatan/kelola/{id_divisi}/organizing/addtugas', [OrganizingController::class, 'addTugas'])->name('kegiatan.organizing.addTugas');
Route::post('/kegiatan/kelola/{id_tugas}/organizing/edittugas', [OrganizingController::class, 'editTugas'])->name('kegiatan.organizing.editTugas');
Route::delete('/kegiatan/kelola/{id_tugas}/organizing/deletetugas', [OrganizingController::class, 'deleteTugas'])->name('kegiatan.organizing.deleteTugas');

Route::get('/kegiatan/kelola/{id_kegiatan}/actuating', [ActuatingController::class, 'indexTask'])->name('kegiatan.actuating.indexTask');
Route::post('/kegiatan/kelola/{id_kegiatan}/actuating/addtugas', [ActuatingController::class, 'addTugas'])->name('kegiatan.actuating.addTugas');
Route::post('/kegiatan/kelola/{id_actuating}/actuating/edittugas', [ActuatingController::class, 'editTugas'])->name('kegiatan.Actuating.editTugas');
Route::delete('/kegiatan/kelola/{id_actuating}/actuating/deletetugas', [ActuatingController::class, 'deleteTugas'])->name('kegiatan.actuating.deleteTugas');

Route::get('/kegiatan/kelola/{id_kegiatan}/controlling', [ControllingController::class, 'indexDivisi'])->name('kegiatan.controlling.indexDivisi');
Route::get('/kegiatan/kelola/{id_divisi}/controlling/delete', [ControllingController::class, 'deleteDivisi'])->name('kegiatan.controlling.deleteDivisi');
Route::get('/kegiatan/kelola/{id_divisi}/controlling/panitia', [ControllingController::class, 'indexTask'])->name('kegiatan.controlling.indexTask');
Route::post('/kegiatan/kelola/{id_tugas}/controlling/edittugas', [ControllingController::class, 'editTugas'])->name('kegiatan.controlling.editTugas');
Route::post('/kegiatan/kelola/{id_tugas}/controlling/tugasselesai', [ControllingController::class, 'tugasSelesai'])->name('kegiatan.controlling.tugasSelesai');
Route::post('/kegiatan/kelola/{id_tugas}/controlling/tugasundo', [ControllingController::class, 'tugasundo'])->name('kegiatan.controlling.tugasundo');

Route::get('/kegiatan/kelola/{id_divisi}/calendar', [ControllingController::class, 'calendar'])->name('kegiatan.divisi.calendar');

Route::get('/kegiatan/kelola/{id_divisi}/calendarshow', [ControllingController::class, 'showdata'])->name('allEvent');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
