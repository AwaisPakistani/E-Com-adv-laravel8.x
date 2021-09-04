<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function news(){
        $news=['title'=>'weather','content'=>'Weather is very cold here'];
        return $news;
    }
}
