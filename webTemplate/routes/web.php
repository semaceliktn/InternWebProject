<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
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
    Route::get('/kategori/duzenle/{id}','KategoriDuzenle')->name('kategori.duzenle');
    Route::post('/kategori/guncelle/form','KategoriGuncelleForm')->name('kategori.guncelle.form');
    Route::get('/kategori/sil/{id}', 'KategoriSil')->name('kategori.sil');
});
//Category

//Subcategory
Route::controller(SubCategoryController::class)->group(function (){
    Route::get('/altkategori/liste','AltkategoriListe')->name('altkategori.liste');
    Route::get('/altkategori/ekle','AltkategoriEkle')->name('altkategori.ekle');
    Route::post('/altkategori/ekle/form','AltkategoriEkleForm')->name('altkategori.ekle.form');
    Route::get('/altkategori/duzenle/{id}','AltkategoriDuzenle')->name('altkategori.duzenle');
    Route::post('/altkategori/guncelle/form','AltkategoriGuncelleForm')->name('altkategori.guncelle.form');
    Route::get('/altkategori/sil/{id}', 'AltkategoriSil')->name('altkategori.sil');
    Route::get('/altkategoriler/ajax/{kategori_id}', 'AltAjax');
});
//Subcategory

//Product
Route::controller(ProductController::class)->group(function (){
    Route::get('/urun/liste','UrunListe')->name('urun.liste');
    Route::get('/urun/ekle','UrunEkle')->name('urun.ekle');
    Route::post('/urun/ekle/form','UrunEkleForm')->name('urun.ekle.form');
    Route::get('/urun/duzenle/{id}','UrunDuzenle')->name('urun.duzenle');
    Route::post('/urun/guncelle/form','UrunGuncelleForm')->name('urun.guncelle.form');
    Route::get('/urun/durum','UrunDurum');
});
//Product

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



