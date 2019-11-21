<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    function gioithieu()
    {
        echo "Đây Là Trang Giới Thiệu";
    }
    function lienhe()
    {
        echo "Đây Là Trang Liên hệ";
    }
}
