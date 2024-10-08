<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Home\BannerController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogContentController;
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
    Route::get('/urun/sil/{id}', 'UrunSil')->name('urun.sil');
    Route::get('/urun/durum','UrunDurum');
});
//Product

//BlogCategory
Route::controller(BlogCategoryController::class)->group(function (){
    Route::get('/blog/kategori/liste','BlogListe')->name('blog.liste');
    Route::get('/blog/kategori/ekle','BlogKategoriEkle')->name('blog.kategori.ekle');
    Route::post('/blog/kategori/form','BlogKategoriForm')->name('blog.kategori.form');
    Route::get('/blog/kategori/duzenle/{id}','BlogKategoriDuzenle')->name('blog.kategori.duzenle');
    Route::post('/blog/kategori/guncelle/form','BlogKategoriGuncelleForm')->name('blog.kategori.guncelle.form');
    Route::get('/blog/kategori/sil/{id}', 'BlogKategoriSil')->name('blog.kategori.sil');
    Route::get('/blog/kategori/durum','BlogDurum');
});
//BlogCategory

//BlogContent
Route::controller(BlogContentController::class)->group(function (){
    Route::get('/icerik/liste','IcerikListe')->name('icerik.liste');
    Route::get('/blog/icerik/ekle','BlogIcerikEkle')->name('blog.icerik.ekle');
    Route::post('/blog/icerik/ekle/form','BlogIcerikEkleForm')->name('blog.icerik.ekle.form');
    Route::get('/blog/icerik/duzenle/{id}','BlogIcerikDuzenle')->name('blog.icerik.duzenle');
    Route::post('/blog/icerik/guncelle/form','BlogIcerikGuncelleForm')->name('blog.icerik.guncelle.form');

    Route::get('/urun/sil/{id}', 'UrunSil')->name('urun.sil');
    Route::get('/blog/icerik/durum','BlogIcerikDurum');
});
//BlogContent

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//front route
Route::get('/urun/{id}/{url}',[FrontController::class, 'UrunDetay']);
Route::get('/kategori/{id}/{url}',[FrontController::class,'KategoriDetay']);
Route::get('/altkategori/{id}/{url}',[FrontController::class,'AltkategoriDetay']);



