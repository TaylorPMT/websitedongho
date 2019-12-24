<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Library\Library_my;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Topic;
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
    function tintuc()
    {
        $list=Topic::where(['status'=>1])->get();

        return view('frontend.news',compact('list'));
    }
    //tin tuc
    function detail($slug)
    {
        $row =Post::where(['slug'=>$slug])->first();
        $category_all=Topic::where(['status'=>1])->get();
        $list_topid=Library_my::newsid($category_all,$row->id,[$row->id]);
        $listother=Post::where([['status','=',1],['id','<>',$row->id]])->whereIn('topid',$list_topid)->orderBy('created_at',"desc")->take(6)->get();
        return view('frontend.news-detail',compact('row','listother'));

    }

    //seach
    public function seach(Request $request)
    {
        //$list =Product::where('slug','like','%'.$request->key.'%')->get();
        //dd($list);
        $list =Product::where('price','<','1000000')->get();
        $key=$request->key;
       // dd($list);
        
        return view('frontend.seach',compact('list','key'));

    }
}
