<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BlogCategoryController extends Controller
{
    public function BlogListe(){
        $blogliste=BlogCategory::latest()->get();
        return view('admin.blogkategoriler.blog_liste',compact('blogliste'));
    }// fonksiyon bitti

    public function BlogKategoriEkle(){
        return view('admin.blogkategoriler.blog_kategori_ekle');
    }//fonksiyon bitti

    public function BlogKategoriForm(Request $request){
        $request->validate([
            'kategori_adi'=>'required',
        ],[
            'kategori_adi.required'=>'Kategori adını giriniz.',
        ]);

        BlogCategory::insert([
            'kategori_adi'=>$request->kategori_adi,
            'url'=>str()->slug($request->kategori_adi),
            'sirano'=>$request->sirano,
            'durum'=>1,
            'created_at'=>Carbon::now(),
        ]);

        $mesaj=array(
            'bildirim'=>' Blog Kategori ekleme başarılı',
            'alert-type'=>'success'
        );

        return redirect()->route('blog.liste')->with($mesaj);
    }//fonksiyon bitti

    public function BlogDurum(Request $request){

        $blog=BlogCategory::find($request->blog_id);
        $blog-> durum= $request->durum;
        $blog->save();

        return response()->json(['success' => 'Başarılı.']);
    }//fonksiyon bitti

    public function BlogKategoriDuzenle($id){
        $BlogKategoriDuzenle=BlogCategory::findOrFail($id);

        return view('admin.blogkategoriler.blog_kategori_duzenle',compact('BlogKategoriDuzenle'));
    }//fonksiyon bitti

    public function BlogKategoriGuncelleForm(Request $request){

        $request->validate([
            'kategori_adi'=>'required',
        ],[
            'kategori_adi.required'=>'Kategori ad alanı boş bırakılamaz.',
        ]);

        $blogkategori_id= $request->id;

        BlogCategory::findOrFail($blogkategori_id)->update([
            'kategori_adi'=>$request-> kategori_adi,
            'url'=>str()->slug($request->kategori_adi),
            'sirano'=>$request->sirano,
        ]);

        $mesaj=array(
            'bildirim'=>'Blog kategori güncelleme başarılı.',
            'alert-type'=>'success'
        );
        return redirect()->route('blog.liste')->with($mesaj);
    }//fonksiyon bitti

    public function BlogKategoriSil($id){

        $blogkategori_id= BlogCategory::findOrFail($id);
        $blogkategori_id->delete();

        $mesaj=array(
            'bildirim'=>'Blog kategori silme başarılı.',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($mesaj);
    } //fonksiyon bitti




}//class bitti
