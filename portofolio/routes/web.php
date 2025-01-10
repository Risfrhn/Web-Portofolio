<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;



// route dashboard
route::get('/dashboard-admin', [ProjectController::class, 'showDashboard'])->middleware('auth')->name('dashboardAdmin');
route::get('/', [ProjectController::class, 'showDashboardPengguna'])->name('dashboardPengguna');

// download cv pengguna
route::get('/dashboard-admin/download/{filename}', [ProjectController::class, 'downloadFile'])->name('files.download');

// route admin
route::get('/login', [ProjectController::class, 'showLogin'])->name('login');
route::post('/login-berhasil', [ProjectController::class, 'login'])->name('action.login');
route::get('/logout', [ProjectController::class, 'logout'])->name('action.logout');
route::get('/logged-out', [ProjectController::class, 'showLoggedOutPage'])->name('loggedOutPage');

// --keahlian
route::post('/dashboard-admin/keahlian',[ProjectController::class, 'storeKeahlian'])->name('tambahKeahlian');
route::delete('/dashboard-admin/keahlian/{id}', [ProjectController::class, 'destroyKeahlian'])->name('hapusKeahlian');
// --sertifikat
route::post('/dashboard-admin/sertifikat',[ProjectController::class, 'storeSertifikat'])->name('tambahSertifikat');
route::delete('/dashboard-admin/sertifikat/{id}', [ProjectController::class, 'destroySertifikat'])->name('hapusSertifikat');
// --projek
route::post('/dashboard-admin/projek',[ProjectController::class, 'storeProjek'])->name('tambahProjek');
route::get('/dashboard-admin/detail/{id}', [ProjectController::class, 'showDetailProjek'])->name('project.detail');
route::put('/dashboard-adminprojek/edit/{id}', [ProjectController::class, 'editProjek'])->name('projek.update');
route::delete('/dashboard-admin/projek/{id}', [ProjectController::class, 'destroyProjek'])->name('hapusProjek');
route::delete('/dashboard-admin/projek/{id}/hapus-gambar/{index}', [ProjectController::class, 'hapusGambar'])->name('hapusGambar');
route::delete('/dashboard-admin/projek/{id}/hapus-icon/{index}', [ProjectController::class, 'hapusIcon'])->name('hapusIcon');
// --CV
route::post('/dashboard-admin/storeCv',[ProjectController::class, 'storeFileCv'])->name('files.store');














// ga kepake
// Route::get('/register', [ProjectController::class, 'showRegister'])->name('register');
// Route::POST('/Register', [ProjectController::class, 'actionregister'])->name('action.register');