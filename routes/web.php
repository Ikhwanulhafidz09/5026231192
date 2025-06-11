<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Link;
use App\Http\Controllers\Pegawai2Controller;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RAMController;
use App\Http\Controllers\KaryawanController;

// Route bawaan default laravel
Route::get('/', function () {
    return view('welcome');
});

// Route frontend
Route::view('/frontend', 'frontend');

// Route github 5026231159
Route::view('/pertemuan1', 'pertemuan1');
Route::view('/pertemuan3', 'pertemuan3');
Route::view('/template1', 'template1');
Route::view('/clonelinktree', 'clonelinktree');
Route::view('/pertemuan7-js1', 'pertemuan7-js1');
Route::view('/pertemuan7-js2', 'pertemuan7-js2');
Route::view('/ets', 'ets');

// Route pegawai
//Route::get('/pegawai/{nama}', [Pegawai2Controller::class, 'index']);

// Route dosen
Route::get('dosen', [Link::class, 'index']);

// Route formulir
Route::get('/formulir', [Pegawai2Controller::class, 'formulir']);
Route::post('/formulir/proses', [Pegawai2Controller::class, 'proses']);

// Route blog
Route::get('/blog', [BlogController::class, 'home']);
Route::get('/blog/tentang', [BlogController::class, 'tentang']);
Route::get('/blog/kontak', [BlogController::class, 'kontak']);

// Route CRUD Pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/tambah', [PegawaiController::class,'tambah']);
Route::post('/pegawai/store', [PegawaiController::class,'store']);
Route::get('/pegawai/edit/{id}', [PegawaiController::class,'edit']);
Route::post('/pegawai/update', [PegawaiController::class,'update']);
Route::delete('/pegawai/hapus/{id}', [PegawaiController::class, 'hapus']);
Route::get('/pegawai/cari', [PegawaiController::class, 'cari']);

// Route CRUD RAM
Route::get('/ram', [RAMController::class, 'index']);
Route::get('/ram/tambah', [RAMController::class,'tambah']);
Route::post('/ram/store', [RAMController::class,'store']);
Route::get('/ram/edit/{id}', [RAMController::class,'edit']);
Route::post('/ram/update', [RAMController::class,'update']);
Route::delete('/ram/hapus/{id}', [RAMController::class, 'hapus']);
Route::get('/ram/cari', [RAMController::class, 'cari']);

// Route CRUD Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/tambah', [KaryawanController::class, 'tambah']);
Route::post('/karyawan/store', [KaryawanController::class, 'store']);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::post('/karyawan/update', [KaryawanController::class, 'update']);
Route::delete('/karyawan/hapus/{id}', [KaryawanController::class, 'hapus']);
Route::get('/karyawan/cari', [KaryawanController::class, 'cari']);