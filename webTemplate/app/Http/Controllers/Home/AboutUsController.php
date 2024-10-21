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
}//class bitti
