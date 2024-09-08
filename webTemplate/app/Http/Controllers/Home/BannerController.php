<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;



class BannerController extends Controller
{
    public function HomeBanner(){
        $homebanner= Banner::find(1);
        return view('admin.anasayfa.banner_duzenle',compact('homebanner'));

    } //fonksiyon bitti

    public function BannerGuncelle(Request $request){

        $banner_id= $request->id;

        if ($request->file('resim')) {
            $manager = new ImageManager(new Driver());
            $resimAdi = hexdec(uniqid()).'.'.$request->file('resim')->getClientOriginalExtension();
            $img =$manager->read($request->file('resim'));
            $img=$img->resize(636,852);
            $img ->toJpeg(80)->save(base_path('public/upload/banner/'.$resimAdi));
            $resim_kaydet = 'upload/banner/'.$resimAdi;


            Banner::findOrFail($banner_id)->update([
                'baslik' => $request->baslik,
                'alt_baslik' => $request->alt_baslik,
                'url' => $request->url,
                'video_url' => $request->video_url,
                'resim' => $resim_kaydet
            ]);

            //bildirim

            $mesaj= array(
                'bildirim'=>'Resim ile güncelleme başarılı',
                'alert-type'=>'success'
            );

            //bildirim

            return redirect()->back()->with($mesaj);
        }//end if
        else{
            Banner::findOrFail($banner_id)->update([
                'baslik'=> $request-> baslik,
                'alt_baslik'=>$request->alt_baslik,
                'url'=>$request->url,
                'video_url'=>$request->video_url,
            ]);

            //bildirim
            $mesaj=array(
                'bildirim'=> 'Resimsiz güncelleme başarılı.',
                'alert-type'=> 'success'
            );
            //bildirim

            return redirect()->back()->with($mesaj);

        }


    } //fonksiyon bitti

}//class bitti


