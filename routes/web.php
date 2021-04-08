<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{PagesController,AuthController,PengaduanController, TanggapanController, UserController, ReportController};
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
Route::group(['prefix' => 'masyarakat'], function(){
  Route::get('/login', [AuthController::class, 'login_masyarakat']);
  Route::get('/register', [AuthController::class, 'register_masyarakat']);
  Route::post('/register', [AuthController::class, 'HandleRegisterMasyarakat']);
  Route::post('/login', [AuthController::class, 'hadleLoginMasyarakat']);
  Route::get('/logout', [AuthController::class, 'logout_masyarakat']);
});
Route::group(['prefix' => 'petugas'], function(){
  Route::get('/login', [AuthController::class, 'login_petugas']);
  Route::post('/login', [AuthController::class, 'hadleLoginPetugas']);
  Route::get('/logout', [AuthController::class, 'logout_petugas']);
});
Route::resource('petugas', UserController::class)->middleware('rolePetugasCheck');
Route::group(['middleware' => 'auth:petugas'], function(){
  Route::get('/home/petugas', [PagesController::class, 'dashboard_petugas']);
  Route::get('tanggapan/{pengaduan_id}', [TanggapanController::class, 'index']);
  Route::post('tanggapan/{id_pengaduan}', [TanggapanController::class, 'store']);
});
Route::resource('pengaduan', PengaduanController::class)->only(['index', 'create', 'store', 'show']);
Route::get('pengaduan/detail/{id}', [PengaduanController::class, 'detail'])->name('pengaduan.detail');
Route::get('report', [ReportController::class, 'index']);
Route::get('generate_report', [ReportController::class, 'generate_report']);
Route::group(['middleware' => 'auth:masyarakat'], function(){
  Route::get('/home/masyarakat', [PagesController::class, 'dashboard_masyarakat']);
});
