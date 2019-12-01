<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryInsertRepuest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    function index()
    {
        $list=Category::where('status','<>','0')->get();
        return view('backend.page.category.index',compact('list'));
    }
    function getinsert()
    {
        $listcat=Category::where(['status'=>1])->orderBy('orders','asc')->get();

        return view('backend.page.category.insert',compact('listcat'));
    }
    function postinsert(CategoryInsertRepuest $request)
    {
        $user_id=Auth::user()->id;
        $row=new Category;
        $row->name=$request->name;
        $row->slug=Str::slug($request->name,'-');

        $row->metadesc=html_entity_decode($request->metadesc);
        $row->metakey=html_entity_decode($request->metakey);
        $row->status=$request->status;
        $row->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->created_by=$user_id;
        $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->updated_by=$user_id;
        $row->parentid=0;
        $row->orders=1;
        if($row->save())
        {
            return redirect()->route("index_category")->with("message",["type"=>"success","msg"=>"Thêm Thành Công "]);
        }
        else
        {
            return redirect()->route("index_category")->with("message",["type"=>"danger","msg"=>"Thêm Thất Bại "]);
        }
    }

    //status cate
    function status($id)
    {
        $user_id=Auth::user()->id;
        $row=Category::find($id);
        if($row==null)
        {
            return redirect()->route("index_category")->with("message",["type"=>"danger","msg"=>" Loại Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=2;
            $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
            $row->updated_by=$user_id;
        }
        $row->save();
        return redirect()->route("index_category")->with("message",["type"=>"success","msg"=>"Tạm Ngừng Cung Cấp Loại Sản Phẩm Này"]);

    }
    function updatestatus($id)
    {
        $user_id=Auth::user()->id;
        $row=Category::find($id);
        if($row==null)
        {
            return redirect()->route("index_category")->with("message",["type"=>"danger","msg"=>" Loại Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=1;
            $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
            $row->updated_by=$user_id;
        }
        $row->save();
        return redirect()->route("index_category")->with("message",["type"=>"success","msg"=>"Loại Sản Phẩm Này Cung Câp Trở Lại"]);
    }
    //update lại loại sản phẩm
    function getupdate($id)
    {
        $row=Category::find($id);
        return view('backend.page.category.update',compact('row'));
    }
    function postupdate(CategoryInsertRepuest $request , $id)
    {
        $user_id=Auth::user()->id;
        $row=Category::find($id);
        $row->name=$request->name;
        $row->slug=Str::slug($request->name,'-');

        $row->metadesc=html_entity_decode($request->metadesc);
        $row->metakey=html_entity_decode($request->metakey);
        $row->status=$request->status;
        $row->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->created_by=$user_id;
        $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
        $row->updated_by=$user_id;
        $row->parentid=0;
        $row->orders=1;
        if($row->save())
        {
            return redirect()->route("index_category")->with("message",["type"=>"success","msg"=>"Cập Nhật Thành Công "]);
        }
        else
        {
            return redirect()->route("index_category")->with("message",["type"=>"danger","msg"=>"Cập Nhật Thất Bại "]);
        }
    }
    //delete category
    function trash()
    {
        $list=Category::where('status','=','0')->get();
        return view('backend.page.category.trash',compact('list'));
    }
    function deltrash($id)
    {
        $user_id=Auth::user()->id;
        $row =Category::find($id);
        if($row==null)
        {
            return redirect()->route("index_category")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=0;
            $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
            $row->updated_by=$user_id;
        }
        $row->save();
        return redirect()->route("index_category")->with("message",["type"=>"success","msg"=>"Xóa Thành Công"]);
    }

    function retrash($id)
    {
        $user_id=Auth::user()->id;
        $row =Category::find($id);
        if($row==null)
        {
            return redirect()->route("index_category")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=2;
            $row->updated_at=Carbon::now('Asia/Ho_Chi_Minh');
            $row->updated_by=$user_id;
        }
        $row->save();
        return redirect()->route("index_category")->with("message",["type"=>"success","msg"=>"Khôi Phục Loại Sản Phẩm Thành Công"]);
    }

    function delete($id)
    {
        $row=Category::find($id);
        if($row==null)
        {
            return redirect()->route("category_trash")->with("message",["type"=>"danger","msg"=>"Loại Sản Phẩm Không Tồn Tại"]);
        }else
        {

            $row->delete();
            return redirect()->route("category_trash")->with("message",["type"=>"success","msg"=>"Xóa Loại Sản Phẩm  Thành Công"]);
        }
    }

}
