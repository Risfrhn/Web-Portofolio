<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;



// route dashboard
Route::get('/dashboard-admin', [ProjectController::class, 'showDashboard'])->middleware('auth')->name('dashboardAdmin');
Route::get('/', [ProjectController::class, 'showDashboardPengguna'])->name('dashboardPengguna');

// route admin
Route::get('/login', [ProjectController::class, 'showLogin'])->name('login');
Route::post('/login-berhasil', [ProjectController::class, 'login'])->name('action.login');
Route::get('/logout', [ProjectController::class, 'logout'])->name('action.logout');
Route::get('/logged-out', [ProjectController::class, 'showLoggedOutPage'])->name('loggedOutPage');

// --keahlian
route::post('/keahlian',[ProjectController::class, 'storeKeahlian'])->name('tambahKeahlian');
Route::delete('/keahlian/{id}', [ProjectController::class, 'destroyKeahlian'])->name('hapusKeahlian');
// --sertifikat
route::post('/sertifikat',[ProjectController::class, 'storeSertifikat'])->name('tambahSertifikat');
Route::delete('/sertifikat/{id}', [ProjectController::class, 'destroySertifikat'])->name('hapusSertifikat');
// --projek
route::post('/projek',[ProjectController::class, 'storeProjek'])->name('tambahProjek');
Route::get('/detail/{id}', [ProjectController::class, 'showDetailProjek'])->name('project.detail');
Route::put('projek/edit/{id}', [ProjectController::class, 'editProjek'])->name('projek.update');
Route::delete('/projek/{id}', [ProjectController::class, 'destroyProjek'])->name('hapusProjek');
Route::delete('/projek/{id}/hapus-gambar/{index}', [ProjectController::class, 'hapusGambar'])->name('hapusGambar');
Route::delete('/projek/{id}/hapus-icon/{index}', [ProjectController::class, 'hapusIcon'])->name('hapusIcon');












// ga kepake
// Route::get('/register', [ProjectController::class, 'showRegister'])->name('register');
// Route::POST('/Register', [ProjectController::class, 'actionregister'])->name('action.register');