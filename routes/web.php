<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PenilaianController;

Route::get('/penilaian', [PenilaianController::class, 'index']);


Route::get('/penilaian', [PenilaianController::class, 'index'])->name('penilaian.index');
Route::get('/penilaian/tambah', function () {
    return view('penilaian.tambah');
})->name('penilaian.tambah');

Route::post('/penilaian/simpan', function (Request $request) {
    // Simpan data ke database (contoh simulasi)
    // Data $request->nama_pendaftar dan $request->score diterima
    return redirect('/penilaian')->with('success', 'Data berhasil disimpan!');
})->name('penilaian.simpan');

use Illuminate\Http\Request;

Route::get('/penilaian/tambah', function () {
    return view('penilaian.tambah');
})->name('penilaian.tambah');

Route::post('/penilaian/simpan', function (Request $request) {
    // Simpan data ke database
    // Contoh: Data bisa disimpan dengan Eloquent
    DB::table('penilaian')->insert([
        'id' => $request->id,
        'nama_pendaftar' => $request->nama_pendaftar,
        'tes_pemrograman_web' => $request->tes_pemrograman_web,
        'tes_pemrograman_mobil' => $request->tes_pemrograman_mobil,
        'tes_photoshop' => $request->tes_photoshop,
        'tes_microsoft_office' => $request->tes_microsoft_office,
        'created_at' => $request->created_at ?? now(),
        'updated_at' => $request->updated_at ?? now(),
    ]);

    return redirect('/penilaian')->with('success', 'Data berhasil disimpan!');
})->name('penilaian.simpan');

Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::post('/penilaian/simpan', [PenilaianController::class, 'simpan']);
Route::get('/penilaian/tambah', [PenilaianController::class, 'tambah']);

Route::get('/penilaian', [PenilaianController::class, 'index']);
Route::get('/penilaian/tambah', [PenilaianController::class, 'tambah']);
Route::post('/penilaian/simpan', [PenilaianController::class, 'simpan']);
Route::get('/penilaian/edit/{id}', [PenilaianController::class, 'edit']);
Route::post('/penilaian/update/{id}', [PenilaianController::class, 'update']);
Route::delete('/penilaian/hapus/{id}', [PenilaianController::class, 'destroy']);


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
    return view('welcome');
});
