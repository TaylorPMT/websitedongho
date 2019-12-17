<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class HomeController extends Controller
{
    //khai báo
    function index()
    {
        $listcategory=Category::where(['status'=>1,'parentid'=>0])->get();
        return view('frontend.home',compact('listcategory'));
    }
    function notfound()
    {
        return view('errors.404');
    }
}
