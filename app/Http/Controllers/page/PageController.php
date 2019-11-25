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
        echo "Đây Là Trang Liên hệ";
    }
}
