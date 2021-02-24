<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function project(){
        return view('main.page.projects.index');
    }
    public function news(){
        return view('main.page.news.index');
    }
    public function chating(){
        return view('main.component.chat.index');
    }
}
