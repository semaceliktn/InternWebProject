<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //protected $guarded=[];
    protected $fillable = ['kategori_id', 'altkategori_id', 'baslik', 'url', 'tag', 'anahtar', 'aciklama', 'metin', 'resim', 'sirano', 'durum', 'created_at'];

    public function Altkategori(){
        return $this->belongsTo(SubCategory::class,'altkategori_id','id');
    }//fonksiyon bitti
}
