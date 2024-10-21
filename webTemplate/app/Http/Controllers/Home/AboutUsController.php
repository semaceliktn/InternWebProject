<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Illuminate\Support\Carbon;

class AboutUsController extends Controller
{
    public function HakkimizdaDuzenle(){
        $hakkimizda= AboutUs::find(1);
        return view('admin.anasayfa.hakkimizda_duzenle',compact('hakkimizda'));
    }//fonksiyon bitti

    public function HakkimizdaGuncelle(Request $request){
        $hakkimizda_id=$request->id;
        $eski_resim=$request->onceki_resim;

        if ($request->file('resim')){
            $resim=$request->file('resim');
            $resimAdi= hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();


            $manager= new ImageManager(new Driver());
            $img= $manager->read($resim);
            $img->resize(523,605);
            $img->toJpeg(80)->save(public_path('upload/hakkimizda/'.$resimAdi));
            $resim_kaydet='upload/hakkimizda/'.$resimAdi;

            //eski resim sil
            if (file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resim sil

            AboutUs::findOrFail($hakkimizda_id)->update([
                'baslik'=>$request->baslik,
                'kisa_baslik'=>$request->kisa_baslik,
                'aciklama'=>$request->aciklama,
                'kisa_aciklama'=>$request->kisa_aciklama,
                'resim'=>$resim_kaydet
            ]);

            //başarılı bildirimi
            $mesaj=array(
                'bildirim'=>'Resimli güncelleme başarılı.',
                'alert-type'=>'success'
            );
            //başarılı bildirimi

            return redirect()->back()->with($mesaj);
        }//end if
        else{
            AboutUs::findOrFail($hakkimizda_id)->update([
                'baslik'=>$request->baslik,
                'kisa_baslik'=>$request->kisa_baslik,
                'aciklama'=>$request->aciklama,
                'kisa_aciklama'=>$request->kisa_aciklama,
            ]);

            //başarılı bildirimi
            $mesaj=array(
                'bildirim'=>'Resimsiz güncelleme başarılı.',
                'alert-type'=>'success'
            );
            //başarılı bildirimi

            return redirect()->back()->with($mesaj);
        }

    }//fonksiyon bitti

    public function AnasayfaHakkimizda(){
        $hakkimizda= AboutUs::find(1);
        return view('frontend.anasayfa.hakkimizda',compact('hakkimizda'));
    }//fonksiyon bitti
}//class bitti
