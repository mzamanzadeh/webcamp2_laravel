<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function name($name,$id, Request $request)
    {
//        $url = route('aboutPage');
//        return $url;

        return "salam ".$name." with id ".$id;
//        return $request->input('key');
    }
    
}
