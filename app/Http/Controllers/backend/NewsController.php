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
    function postinsert(NewsRequest $request)
    {
       
        $user_id=Auth::user()->id;
        $row=new Post;
        $row->title=$request->name;
        $row->slug=Str::slug($request->name,'-');
        /*if($request->hasFile('img'))
        {
            $image=$request->file('img');
            $imgName=Str::slug($request->name, '-').".".$image->getClientOriginalExtension();
            $image->move(base_path().'/public/img/product/',$imgName);
            $row->img=$imgName;
            $row->save();
            return redirect()->route("product_index")->with("message",["type"=>"success","msg"=>"Thêm Thành Công "]);

        }
        else
        {
            return redirect()->route("product_index")->with("message",["type"=>"success","msg"=>"Chưa Chọn Hình Đại Diện"]);
        }*/
        $row->metadesc=html_entity_decode($request->metadesc);
        $row->metakey=html_entity_decode($request->metakey);
        $row->status=$request->status;
        $row->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->created_by=$user_id;
        $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->updated_by=$user_id;
        
        if($row->save())
        {
            return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Thêm Thành Công "]);
        }
        else
        {
            return redirect()->route("index_news")->with("message",["type"=>"danger","msg"=>"Thêm Thất Bại "]);
        }

    }
}
