<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('frontend.index');
});

//Banner
Route::controller(BannerController::class)->group(function (){
    Route::get('/banner/duzenle','HomeBanner')->name('banner');
    Route::post('/banner/guncelle','BannerGuncelle')->name('banner.guncelle');
});
//Banner

//Category
Route::controller(CategoryController::class)->group(function (){
    Route::get('/kategori/hepsi','KategoriHepsi')->name('kategori.hepsi');
    Route::get('/kategori/ekle','KategoriEkle')->name('kategori.ekle');
    Route::post('/kategori/ekle/form','KategoriEkleForm')->name('kategori.ekle.form');
});
//Category


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



