<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function Iletisim(){
        return view('frontend.mesaj.iletisim');
    }//fonksiyon bitti

    public function TeklifFormu( Request $request){
        $request->validate([
            'adi'=>'required',
            'email'=>'required|email',
            'telefon'=>'required|digits:11|numeric',
            'konu'=>'required',
            'mesaj'=>'required'
        ],[
            'adi.required'=>'Adınızı ve soyadınızı giriniz.',
            'email.required'=>'Email adresinizi giriniz.',
            'email.email'=>'Girdiğiniz email, mail formatında olmalıdır.',
            'telefon.required'=>'Telefon numaranızı giriniz.',
            'telefon.digits'=>'Telefon numaranız 11 haneli sayısal karakterlerden oluşmak zorundadır.',
            'konu.required'=>'Mesajınızın konusunu giriniz',
            'mesaj.required'=>'Mesajınızı yazınız.'
        ]);

        Message::create($request->all());

        //bildirim
        $mesaj=array(
            'bildirim'=>'En kısa sürede tarafınıza dönüş sağlanacaktır.',
            'alert-type'=>'success'
        );
        //bildirim

        return Redirect()->back()->with($mesaj);

    }//fonksiyon bitti
}
