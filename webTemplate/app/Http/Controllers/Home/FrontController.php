<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function UrunDetay($id, $url){
        $urunler= Product::findOrFail($id);
        $etiketler= $urunler->tag;
        $etiket= explode(',', $etiketler);

        return view('frontend.urunler.urun_detay',compact('urunler','etiket'));
    }//fonksiyon bitti
} //class bitti
