<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function KategoriHepsi(){
        $kategorihepsi= Category::latest()->get();
        return view('admin.kategoriler.kategori_hepsi', compact('kategorihepsi'));
    } //fonksiyon bitti




}//class bitti
