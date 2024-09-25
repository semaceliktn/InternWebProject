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
    }//fonksiyon bitti

    public function UrunEkleForm(Request $request){
        $request->validate([
            'baslik'=>'required',
        ],[
            'baslik.required'=>'Başlık bilgisini giriniz.',
        ]);

        $resim=$request->resim;
        $resimAdi= hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

        $manager= new ImageManager(new Driver());
        $img=$manager->read($resim);
        $img=$img->resize(700,370);
        $img->toJpeg()->save(public_path('upload/urun/'.$resimAdi));
        $resim_kaydet='upload/urun/'.$resimAdi;

        Product::insert([
            'kategori_id'=>$request->kategori_id,
            'altkategori_id'=>$request->altkategori_id,
            'baslik'=>$request->baslik,
            'url'=>str()->slug($request->baslik),
            'tag'=>$request->tag,
            'anahtar'=>$request->anahtar,
            'aciklama'=>$request->aciklama,
            'metin'=>$request->metin,
            'resim'=>$resim_kaydet,
            'sirano'=>$request->sirano,
            'durum'=>1,
            'created_at'=>Carbon::now(),
        ]);

        $mesaj=array(
            'bildirim'=>'Resim ile ürün yükleme başarılı',
            'alert-type'=>'success'
        );

        return redirect()->route('urun.liste')->with($mesaj);
    }//fonksiyon bitti


}
