<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function UrunListe(){
        $urunliste= Product::latest()->get();
        return view('admin.urunler.urun_liste',compact('urunliste'));
    }//fonksiyon bitti

    public function UrunDurum(Request $request){
        $urun= Product::find($request->urun_id);
        $urun->durum = $request->durum;
        $urun->save();

        return response()->json(['success'=>'Başarılı']);
    }//fonksiyon bitti

    public function UrunEkle(){
        $kategoriler=Category::latest()->get();
        return view('admin.urunler.urun_ekle', compact('kategoriler'));
    }


}
