<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
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
        $img->toJpeg(80)->save(public_path('upload/urun/'.$resimAdi));
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

    public function UrunDuzenle($id){
        $kategoriler=Category::latest()->get();
        $altkategoriler=SubCategory::latest()->get();
        $urunler=Product::findOrFail($id);
        return view('admin.urunler.urun_duzenle',compact('kategoriler','altkategoriler','urunler'));
    }//fonksiyon bitti

    public function UrunGuncelleForm(Request $request){
        $request->validate([
            'baslik'=>'required',
        ],[
            'baslik.required'=>'Başlık alanı boş bırakılamaz.'
        ]);

        $urun_id=$request->id;
        $eski_resim=$request->onceki_resim;

        if ($request->file('resim')){
            $resim= $request->resim;
            $resimAdi= hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            $manager= new ImageManager(new Driver());
            $img= $manager->read($resim);
            $img=$img->resize(700,370);
            $img->toJpeg(80)->save(public_path('upload/urun/'.$resimAdi));
            $resim_kaydet='upload/urun/'.$resimAdi;


            //eski resmi sil
            if (file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resmi sil

            Product::findOrFail($urun_id)->update([
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
            ]);

            //bildirim
            $mesaj=array(
                'bildirim'=>'Resim ile güncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim

            return redirect()->route('urun.liste')->with($mesaj);
        }// end if
        else{
            Product::findOrFail($urun_id)->update([
                'kategori_id'=>$request->kategori_id,
                'altkategori_id'=>$request->altkategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug($request->baslik),
                'tag'=>$request->tag,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'metin'=>$request->metin,
                'sirano'=>$request->sirano,
            ]);

            //bildirim
            $mesaj=array(
                'bildirim'=>'Resimsiz ile güncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim

            return redirect()->route('urun.liste')->with($mesaj);
        } //end else
    }//fonksiyon bitti

    public function UrunSil($id){
        $urun_id= Product::findOrFail($id);

        //klasörden resim silme
        $resim= $urun_id->resim;
        if(file_exists($resim)){
            unlink($resim);
        }// end if
        //klasörden resim silme

        Product::findOrFail($id)->delete();

        $mesaj=array(
            'bildirim'=>'Silme işlemi başarılı.',
            'alert-type'=>'success'
        );
        return redirect()->route('urun.liste')->with($mesaj);
    } //fonksiyon bitti


}
