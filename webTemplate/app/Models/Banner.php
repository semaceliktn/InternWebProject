<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable=[

        'baslik',
        'alt_baslik',
        'url',
        'video_url',
        'resim'
    ];


}
