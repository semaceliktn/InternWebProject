<?php

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


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



