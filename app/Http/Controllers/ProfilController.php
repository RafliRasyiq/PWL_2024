<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function profil($id=null, $name=null) 
    {
        return view('blog.profil', compact('id', 'name'));
        // return view('blog.profil')
        // -> with('id')
        // -> with('name');
    }
}
