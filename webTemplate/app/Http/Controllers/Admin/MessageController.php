<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function Iletisim(){
        return view('frontend.mesaj.iletisim');
    }
}
