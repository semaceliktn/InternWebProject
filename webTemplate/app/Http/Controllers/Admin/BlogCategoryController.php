<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function BlogListe(){
        $blogliste=BlogCategory::latest()->get();
        return view('admin.blogkategoriler.blog_liste',compact('blogliste'));
    }


}
