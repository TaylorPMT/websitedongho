<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
class NewsController extends Controller
{
    function index()
    {
        $list=Post::where('status','<>','0')->get();
        return view('backend.news.index',compact('list'));
    }
    function getinsert()
    {
        $listcat=Topic::where(['status'=>1])->orderBy('created_at','asc')->get();

        return view('backend.news.insert',compact('listcat'));
    }
    function postinsert(NewsRequest $request)
    {   $user_id=Auth::user()->id;
        $row=new Post;
        $row->topid=$request->topid;
        $row->title=$request->title;
        //slug str help
        $row->slug=Str::slug($request->title, '-');

        $row->detail=html_entity_decode($request->detail);
        //larevel
        $row->metadesc=html_entity_decode($request->metadesc);
        $row->metakey=html_entity_decode($request->metakey);
       
        
        $row->status=$request->status;

        $row->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->created_by=$user_id;
        $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->updated_by=$user_id;


        //Xử Lý Img
        if($request->hasFile('img'))
        {
            $image=$request->file('img');
            $imgName=Str::slug($request->name, '-').".".$image->getClientOriginalExtension();
            $image->move(base_path().'/public/img/news/',$imgName);
            $row->img=$imgName;
            $row->save();
            return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Thêm Thành Công "]);

        }
        else
        {
            return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Chưa Chọn Hình Đại Diện"]);
        }
       // dd($row);
    }
    //Xoa
       function trash()
       {
           $list=Post::where('db_post.status','=','1')
           ->join("db_topic","db_post.topid",'=',"db_topic.id")
           ->select('db_post.*','db_post.title as nametitle')
           ->orderBy('db_post.created_at','desc')->get();
           return view('backend.news.trash',compact('list'));
       }
      function deltrash($id)
      {
          $user_id=Auth::user()->id;    
          $row=Post::find($id);
          if($row==null)
          {
              return redirect()->route("index_news")->with("message",["type"=>"danger","msg"=>"Tin Tức Không Tồn Tại"]);
              $row->status=0;
              $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
              $row->updated_by=$user_id;
          }
          $row->save();
          return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Xoá Tin Thành Công"]);
      }


       function retrash($id)
       {   $user_id=Auth::user()->id;
           $row =Post::find($id);
           if($row==null)
           {
               return redirect()->route("index_news")->with("message",["type"=>"danger","msg"=>"Tin Tức Không Tồn Tại"]);
           }else
           {
               $row->status=2;
               $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
               $row->updated_by=$user_id;
               $row->save();
               return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Khôi Phục Thành Công"]);
           }
   
       }
   
       function delete($id)
       {
           $row =Post::find($id);
           if($row==null)
           {
               return redirect()->route("news_trash")->with("message",["type"=>"danger","msg"=>"Tin Tức Không Tồn Tại"]);
           }else
           {
   
               $row->delete();
               return redirect()->route("news_trash")->with("message",["type"=>"success","msg"=>"Xóa Thành Công"]);
           }
       }
       //update tin tuc 
       function getupdate($id)
       {
           $row=Post::find($id);
           $listnews=Topic::where(['status'=>1])->get();
   
           return view('backend.news.update',compact('listnews','row'));
       }
       function postupdate(NewsUpdateRequest $request,$id)
    {   
        $user_id=Auth::user()->id;
        $row=Post::find($id);
        $row->topid=$request->topid;
        $row->title=$request->title;
        //slug str help
        $row->slug=Str::slug($request->title, '-');

        $row->detail=html_entity_decode($request->detail);
        //larevel
        $row->metadesc=html_entity_decode($request->metadesc);
        $row->metakey=html_entity_decode($request->metakey);
        $row->status=$request->status;
        $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->updated_by=$user_id;
        //Xử Lý Img
        if($request->hasFile('img'))
        {
            $image=$request->file('img');
            $imgName=Str::slug($request->name, '-').".".$image->getClientOriginalExtension();
            $image->move(base_path().'/public/img/news/',$imgName);
            $row->img=$imgName;
            $row->save();
        }
        if(Post::where([['title','=',$request->name],['id','<>',$id]])->count())
        {
            return redirect()->route("index_news")->with("message",["type"=>"danger","msg"=>"Tin Tức Đã Tồn Tại "]);
        }
        $row->save();
        return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Cập Nhật Thành Công "]);

    }
    function status($id)
    {   $user_id=Auth::user()->id;
        $row =Post::find($id);
        if($row==null)
        {
            return redirect()->route("index_news")->with("message",["type"=>"danger","msg"=>"Tin Tức Không Tồn Tại"]);
        }else
        {
            $row->status=2;
            //$row->update_at=;
            //$row->update_by=;
        }
        $row->save();
        return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Cập Nhật Tin Tức "]);
    }
    function updatestatus($id)
    {   $user_id=Auth::user()->id;
        $row =Post::find($id);
        if($row==null)
        {
            return redirect()->route("index_news")->with("message",["type"=>"danger","msg"=>"Tin tức Không Tồn Tại"]);
        }else
        {
            $row->status=1;
            $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
            $row->updated_by=$user_id;
        }
        $row->save();
        return redirect()->route("index_news")->with("message",["type"=>"success","msg"=>"Tin tức được mở"]);
    }
}

