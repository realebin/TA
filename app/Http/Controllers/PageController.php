<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function sertifikat(){
        return view('sertifikat');
    }
    public function create(){
        return view('create');
    }

    public function user(){
        return view('user');
    }
    public function login(){
        return view('auth.login');
    }
}
