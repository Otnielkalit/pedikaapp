<?php

use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardAdmin;
use Illuminate\Support\Facades\Route;


Route::get('user/login', [AuthController::class, 'userLogin'])->name('user.login');
Route::post('/login', [AuthController::class, 'login'])->name('login');



Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');
Route::get('/feature', [DashboardController::class, 'feature'])->name('feature');
Route::get('/blog', [DashboardController::class, 'blog'])->name('blog');
Route::get('/blog-detail', [DashboardController::class, 'detailBlog'])->name('blog.detail');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');



/* =================================== || Routes For Admin || =================================== */
Route::get('/admin/dashboard', [DashboardAdmin::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/laporan', [AdminLaporanController::class, 'laporan'])->name('admin.laporan');
Route::get('/admin/detail-laporan', [AdminLaporanController::class, 'detailLaporan'])->name('admin.detail-laporan');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin/dashboard', [DashboardAdmin::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/laporan', [AdminLaporanController::class, 'laporan'])->name('admin.laporan');
    Route::get('/admin/detail-laporan', [AdminLaporanController::class, 'detailLaporan'])->name('admin.detail-laporan');
});
