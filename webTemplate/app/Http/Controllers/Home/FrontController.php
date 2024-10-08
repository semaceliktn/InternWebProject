<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function UrunDetay($id, $url){
        $urunler= Product::findOrFail($id);
        $etiketler= $urunler->tag;
        $etiket= explode(',', $etiketler);

        return view('frontend.urunler.urun_detay',compact('urunler','etiket'));
    }//fonksiyon bitti

    public function KategoriDetay($id,$url){
        $urunler=Product::where('durum',1)->where('kategori_id', $id)->orderBy('sirano','ASC')->get();
        $kategoriler=Category::orderBy('kategori_adi','ASC')->get();
        $kategori=Category::where('id',$id)->first();

        return view('frontend.urunler.kategori_detay',compact('urunler','kategoriler','kategori'));
    }//fonksiyon bitti

    public function AltkategoriDetay($id, $url){
        $urunler=Product::where('durum',1)->where('altkategori_id',$id)->orderBy('sirano','ASC')->get();
        $altkategoriler=SubCategory::orderBy('altkategori_adi','ASC')->get();
        $altkategori=SubCategory::where('id',$id)->first();

        return view('frontend.urunler.altkategori_detay',compact('urunler','altkategoriler','altkategori'));
    }//fonksiyon bitti
} //class bitti
