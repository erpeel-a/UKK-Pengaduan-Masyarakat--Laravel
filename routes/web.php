<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PagesController,AuthController,PengaduanController, TanggapanController};
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

Route::get('/', [PagesController::class, 'index']);
Route::get('/masyarakat/login', [AuthController::class, 'login_masyarakat']);
Route::post('/masyarakat/login', [AuthController::class, 'hadleLoginMasyarakat']);
Route::get('/petugas/login', [AuthController::class, 'login_petugas']);
Route::post('/petugas/login', [AuthController::class, 'hadleLoginPetugas']);
Route::get('petugas/logout', [AuthController::class, 'logout_petugas']);
Route::get('masyarakat/logout', [AuthController::class, 'logout_masyarakat']);
// Route::post('/petugas/login', [AuthController::class, 'login_petugas']);
Route::get('/home/masyarakat', [PagesController::class, 'dashboard_masyarakat']);
Route::get('/home/petugas', [PagesController::class, 'dashboard_petugas']);
Route::resource('pengaduan', PengaduanController::class)->only(['index', 'create', 'store', 'show']);
Route::get('tanggapan/{pengaduan_id}', [TanggapanController::class, 'index']);
Route::post('tanggapan/{pengaduan_id}', [TanggapanController::class, 'store']);
Route::get('tanggapan/{pengaduan_id}/set_status', [TanggapanController::class, 'SetStatus'])->name('pengaduan.setStatus');
