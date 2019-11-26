<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    function gioithieu()
    {
       return view('frontend.introduce');
    }
    function lienhe()
    {
        return view('frontend.contact');
    }
}
