<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSekolahController;
use App\Http\Controllers\BeritaSekolahController;
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
    return view('index');
});



Route::get('/user_sekolah', [UserSekolahController::class, 'index'])->name('user_sekolah.index');
Route::get('/user_sekolah/{id}', [UserSekolahController::class, 'show'])->name('user_sekolah.show');
Route::get('/berita/{id}', [BeritaSekolahController::class, 'show'])->name('berita.show');


use App\Http\Controllers\AdminController;
use App\Http\Controllers\SchoolController;

use App\Http\Controllers\AuthController;

Route::get('/loginsekolah', [AuthController::class, 'showLoginForm'])->name('loginsekolah');
Route::post('/loginsekolah', [AuthController::class, 'login']);
Route::get('/dashboardsekolah', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboardsekolah');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/createNewBerita', [BeritaSekolahController::class, 'create'])->name('berita.create');
Route::post('/createNewBerita', [BeritaSekolahController::class, 'store'])->name('berita.store');

Route::get('/dashboardsekolah/my-berita', [BeritaSekolahController::class, 'myBerita'])->name('dashboardsekolah.myBerita');


Route::get('/profile', [UserSekolahController::class, 'showProfile'])->name('profile');
Route::post('/profile', [UserSekolahController::class, 'updateProfile'])->name('profile.update');

// Route untuk mengedit berita
Route::get('/dashboardsekolah/edit/{id}', [BeritaSekolahController::class, 'edit'])->name('berita.edit');

// Route untuk memperbarui berita
Route::put('/dashboardsekolah/update/{id}', [BeritaSekolahController::class, 'update'])->name('berita.update');

// Route untuk menghapus berita
Route::delete('/dashboardsekolah/destroy/{id}', [BeritaSekolahController::class, 'destroy'])->name('berita.destroy');

Route::delete('/profile/removeimage/{imageId}', [UserSekolahController::class, 'removeImage'])->name('profile.removeimage');

use App\Http\Controllers\AdminAuthController;

Route::get('/loginadmin', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/loginadmin', [AdminAuthController::class, 'login']);
Route::get('/dashboardadmin', [AdminAuthController::class, 'dashboard'])->middleware('auth');
Route::get('/dashboardadmin/viewallusersekolah', [AdminAuthController::class, 'viewAllUserSekolah'])->middleware('auth');
Route::post('/logoutadmin', [AdminAuthController::class, 'logout'])->middleware('auth');

Route::get('/dashboardadmin/usersekolah/create', [UserSekolahController::class, 'create']);
Route::post('/dashboardadmin/usersekolah', [UserSekolahController::class, 'store']);
Route::get('/dashboardadmin/usersekolah/{id}/edit', [UserSekolahController::class, 'edit']);
Route::put('/dashboardadmin/usersekolah/{id}', [UserSekolahController::class, 'update']);
Route::delete('/dashboardadmin/usersekolah/{id}', [UserSekolahController::class, 'destroy']);
Route::delete('/dashboardadmin/usersekolah/{userId}/deleteimage/{imageId}', [UserSekolahController::class, 'deleteImage']);


// Route untuk menampilkan semua berita di dashboard admin
Route::get('/dashboardadmin/allberita', [BeritaSekolahController::class, 'allBerita'])->name('admin.allBerita');

// Route untuk edit berita oleh admin
Route::get('/dashboardadmin/berita/edit/{id}', [BeritaSekolahController::class, 'editByAdmin'])->name('admin.editBerita');

// Route untuk update berita oleh admin
Route::post('/dashboardadmin/berita/update/{id}', [BeritaSekolahController::class, 'updateByAdmin'])->name('admin.updateBerita');

// Route untuk hapus berita oleh admin
Route::delete('/dashboardadmin/berita/delete/{id}', [BeritaSekolahController::class, 'destroyByAdmin'])->name('admin.destroyBerita');

// Route untuk form create berita oleh admin
Route::get('/dashboardadmin/createberita', [BeritaSekolahController::class, 'createByAdmin'])->name('admin.createBerita');

// Route untuk store berita oleh admin
Route::post('/dashboardadmin/storeberita', [BeritaSekolahController::class, 'storeByAdmin'])->name('admin.storeBerita');
