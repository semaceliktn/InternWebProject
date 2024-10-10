<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogContent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class BlogContentController extends Controller
{
    public function IcerikListe(){
        $blogicerik=BlogContent::latest()->get();
        return view('admin.blogicerikler.icerik_liste',compact('blogicerik'));
    }//fonksiyon bitti

    public function BlogIcerikDurum(Request $request){
        $blog_icerik=BlogContent::find($request->blog_icerik_id);
        $blog_icerik->durum= $request->durum;
        $blog_icerik->save();

        return response()->json(['success'=>'başarılı']);
    }//fonksiyon bitti

    public function BlogIcerikEkle(){
        $kategoriler=BlogCategory::latest()->get();
        return view('admin.blogicerikler.blog_icerik_ekle',compact('kategoriler'));
    }//fonksiyon bitti

    public function BlogIcerikEkleForm(Request $request){
        $request->validate([
           'baslik'=>'required',
        ],[
            'baslik.required'=>'Başlık bilgisini giriniz.',
        ]);

        $resim=$request->file('resim');
        $resimAdi= hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

        $manager= new ImageManager(new Driver());
        $img= $manager->read($resim);
        $img=$img->resize(700,300);
        $img->toJpeg(80)->save(public_path('upload/blogIcerik/'.$resimAdi));
        $resim_kaydet='upload/blogIcerik/'.$resimAdi;

        BlogContent::insert([
            'kategori_id'=>$request->kategori_id,
            'baslik'=>$request->baslik,
            'url'=>str()->slug($request->baslik),
            'tag'=>$request->tag,
            'anahtar'=>$request->anahtar,
            'aciklama'=>$request->aciklama,
            'metin'=>$request->metin,
            'resim' => $resim_kaydet,
            'durum'=>1,
            'created_at'=>Carbon::now()
        ]);

        //bildirim
        $mesaj=array(
            'bildirim'=>'Resim ile yükleme başarılı.',
            'alert-type'=>'success'
        );
        //bildirim

        return redirect()->route('icerik.liste')->with($mesaj);
    }//fonksiyon bitti

    public function BlogIcerikDuzenle($id){
        $kategoriler=BlogCategory::latest()->get();
        $blogicerik= BlogContent::findOrFail($id);

        return view('admin.blogicerikler.blog_icerik_duzenle',compact('kategoriler','blogicerik'));
    }//fonksiyon bitti

    public function BlogIcerikGuncelleForm(Request $request){
        $request->validate([
           'baslik'=>'required',
        ],[
            'baslik.required'=>'Başlık bilgisini giriniz.'
        ]);

        $blogicerik_id= $request->id;
        $eski_resim= $request->onceki_resim;

        if($request->file('resim')){
            $resim= $request->resim;
            $resimAdi= hexdec(uniqid()).'.'.$resim->getClientOriginalExtension();

            $manager= new ImageManager(new Driver());
            $img= $manager->read($resim);
            $img= $img->resize(700,400);
            $img->toJpeg(80)->save(public_path('upload/blogIcerik/'.$resimAdi));
            $resim_kaydet='upload/blogIcerik/'.$resimAdi;


            //eski resmi klasörden siler
            if (file_exists($eski_resim)){
                unlink($eski_resim);
            }
            //eski resmi klasörden siler

            BlogContent::findOrFail($blogicerik_id)->update([
                'kategori_id'=>$request->kategori_id,
                'baslik'=>$request->baslik,
                'url'=>str()->slug($request->baslik),
                'tag'=>$request->tag,
                'anahtar'=>$request->anahtar,
                'aciklama'=>$request->aciklama,
                'metin'=>$request->metin,
                'resim' => $resim_kaydet,
                'sirano'=>$request->sirano,
                'created_at'=>Carbon::now()
            ]);

            //bildirim
            $mesaj=array(
                'bildirim'=>'Resim ile güncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim
            return redirect()->route('icerik.liste')->with($mesaj);
        } //end if

        else{
            BlogContent::findOrFail($blogicerik_id)->update([
                'kategori_id'=>$request->kategori_id,
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
                'bildirim'=>'Resimsiz güncelleme başarılı.',
                'alert-type'=>'success'
            );
            //bildirim

            return redirect()->route('icerik.liste')->with($mesaj);
        }// end else
    }//fonksiyon bitti

    public function BlogIcerikSil($id){
        $blogicerik_id= BlogContent::findOrFail($id);

        //klasörden resim siler
        $resim= $blogicerik_id->resim;
        if (file_exists($resim)){
            unlink($resim);
        }
        //klasörden resim siler

        $blogicerik_id->delete();

        //bildirim
        $mesaj=array(
            'bildirim'=>'Silme işlemi başarılı.',
            'alert-type'=>'success'
        );
        //bildirim
        return redirect()->back()->with($mesaj);
    }


}//class bitti
