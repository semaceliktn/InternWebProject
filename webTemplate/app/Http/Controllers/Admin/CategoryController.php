<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Carbon;


class CategoryController extends Controller
{
    public function KategoriHepsi(){

        $kategorihepsi= Category::latest()->get();
        return view('admin.kategoriler.kategori_hepsi', compact('kategorihepsi'));

    } //fonksiyon bitti


    public function KategoriEkle(){

        return view('admin.kategoriler.kategori_ekle');

    }//fonksiyon bitti


    public function KategoriEkleForm(Request $request){

        $request->validate([
            'kategori_adi'=> 'required',
            'anahtar'=>'required'
        ],
        [
            'kategori_adi.required'=>'Kategori adı alanı boş bırakılamaz.',
            'anahtar.required'=>'Anahtar alanı boş bırakılamaz'
        ]);

        if ($request->file('resim')){
            $resim= $request->file('resim');
            $resimAdi= hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            $manager= new ImageManager(new Driver());
            $img= $manager->read($resim);
            $img= $img->resize('700',400);
            $img->toJpeg(80)->save(public_path('upload/kategori/'.$resimAdi));
            $resim_kaydet= 'upload/kategori/'.$resimAdi;


            Category::insert([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug( $request->kategori_adi ),
                'anahtar'=> $request->anahtar,
                'aciklama'=> $request->aciklama,
                'resim'=>$resim_kaydet,
                'created_at'=>Carbon::now()
                //Carbon sınıfı için kullanıldı.
            ]);

            //bildirim
            $mesaj=array(
                'bildirim'=>'Resim ile yükleme başarılı',
                'alert-type'=>'success'
            );
            //bildirim

            return redirect()->route('kategori.hepsi')->with($mesaj);

        } //end if

        else{

            Category::insert([
                'kategori_adi'=>$request->kategori_adi,
                'kategori_url'=>str()->slug($request->kategori_adi),
                'anahtar'=>$request->anahtar,
                'aciklama'=> $request->aciklama,
                'created_at'=> Carbon::now()
            ]);

            $mesaj=array(
                'bildirim'=>'Resimsiz yükleme başarılı',
                'alert-type'=>'success'
            );

            return redirect()->route('kategori.hepsi')->with($mesaj);

        }// end else

    }//fonksiyon bitti






}//class bitti
