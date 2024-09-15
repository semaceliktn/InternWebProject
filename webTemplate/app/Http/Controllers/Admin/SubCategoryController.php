<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Carbon;


class SubCategoryController extends Controller
{
    public function AltkategoriListe(){

        $altkategoriler= SubCategory::latest()->get();
        return view('admin.altkategoriler.altkategori_liste',compact('altkategoriler'));

    }//fonksiyon bitti


    public function AltKategoriEkle(){
        $kategori_goster= Category::orderBy('id','ASC')->get();
        return view('admin.altkategoriler.altkategori_ekle',compact('kategori_goster'));
    }//fonksiyon bitti

    public function AltkategoriEkleForm(Request $request){

        $request->validate([
            'altkategori_adi'=> 'required',
            'anahtar'=>'required'
        ],
            [
                'altkategori_adi.required'=>'Kategori adı alanı boş bırakılamaz.',
                'anahtar.required'=>'Anahtar alanı boş bırakılamaz'
            ]);

        if ($request->file('resim')){
            $resim= $request->file('resim');
            $resimAdi= hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            $manager= new ImageManager(new Driver());
            $img= $manager->read($resim);
            $img= $img->resize(700,400);
            $img->toJpeg(80)->save(public_path('upload/altkategori/'.$resimAdi));
            $resim_kaydet= 'upload/altkategori/'.$resimAdi;


            SubCategory::insert([
                'kategori_id'=>$request->kategori_id,
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug( $request->altkategori_adi ),
                'anahtar'=> $request->anahtar,
                'aciklama'=> $request->aciklama,
                'resim'=>$resim_kaydet,
                'created_at'=>Carbon::now()
                //Carbon sınıfı için kullanıldı.
            ]);

            //bildirim
            $mesaj=array(
                'bildirim'=>'Alt kategoride resim ile yükleme başarılı',
                'alert-type'=>'success'
            );
            //bildirim

            return redirect()->route('altkategori.liste')->with($mesaj);

        } //end if

        else{

            SubCategory::insert([
                'kategori_id'=>$request->kategori_id,
                'altkategori_adi'=>$request->altkategori_adi,
                'altkategori_url'=>str()->slug( $request->altkategori_adi ),
                'anahtar'=> $request->anahtar,
                'aciklama'=> $request->aciklama,
                'created_at'=> Carbon::now()
            ]);

            $mesaj=array(
                'bildirim'=>'Alt kategoride resimsiz yükleme başarılı',
                'alert-type'=>'success'
            );

            return redirect()->route('altkategori.liste')->with($mesaj);

        }// end else

    }//fonksiyon bitti





}//class bitti
