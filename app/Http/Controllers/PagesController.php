<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function hello($name = null)
    {
        return view('hello', compact('name'));
    }

    public function name($name,$id, Request $request)
    {
//        $url = route('aboutPage');
//        return $url;

        return "salam ".$name." with id ".$id;
//        return $request->input('key');
    }

    public function about()
    {
        $htmlVar = "<script>alert('salam!')</script>";
        $dynamicName = "farzad";
        return view('about',compact('htmlVar','dynamicName'));
    }

    public function home()
    {
        return view('home');
    }
    
}
