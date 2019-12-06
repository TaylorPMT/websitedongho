<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    //
    function index()
    {
        $list = Post::where('status', '<>', '0')->get();
        return view('backend.news.index', compact('list'));
    }
    function getinsert()
    {
        $listcat = Post::where(['status' => 1])->get();
        return view ('backend.news.insert',compact('listcat'));
    }
}
