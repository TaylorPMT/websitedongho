<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductInsertRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    //controller product
    //đk join
    //https://laravel.com/docs/6.x/queries#joins
    function index()
    {
        $list=Product::where('db_product.status','<>','0')
        ->join("db_category","db_product.catid",'=',"db_category.id")
        ->select('db_product.*','db_category.name as namecategory')
        ->orderBy('db_product.created_at','desc')->get();
        return view('backend.page.product.index',compact('list'));
    }
    function trash()
    {
        $list=Product::where('db_product.status','=','0')
        ->join("db_category","db_product.catid",'=',"db_category.id")
        ->select('db_product.*','db_category.name as namecategory')
        ->orderBy('db_product.created_at','desc')->get();
        return view('backend.page.product.trash',compact('list'));
    }
    function getinsert()
    {
        $listcat=Category::where(['status'=>1])->orderBy('orders','asc')->get();

        return view('backend.page.product.insert',compact('listcat'));
    }
    function postinsert(ProductInsertRequest $request)
    {   $user_id=Auth::user()->id;
        $row=new Product;
        $row->catid=$request->catid;
        $row->name=$request->name;
        //slug str help
        $row->slug=Str::slug($request->name, '-');

        $row->detail=html_entity_decode($request->detail);
        //larevel
        $row->metadesc=html_entity_decode($request->metadesc);
        $row->metakey=html_entity_decode($request->metakey);
        $row->number=$request->number;
        $row->price=$request->price;
        $row->pricesale=$request->pricesales;
        $row->status=$request->status;

        $row->created_at=Carbon::now();
        $row->created_by=$user_id;
        $row->updated_at=Carbon::now();
        $row->updated_by=$user_id;


        //Xử Lý Img
        if($request->hasFile('img'))
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
        }
       // dd($row);


    }
    function getupdate($id)
    {
        $row=Product::find($id);
        $listcat=Category::where(['status'=>1])->orderBy('orders','asc')->get();

        return view('backend.page.product.update',compact('listcat','row'));
    }
    function postupdate(ProductUpdateRequest $request,$id)
    {   $user_id=Auth::user()->id;
        $row=Product::find($id);
        $row->catid=$request->catid;
        $row->name=$request->name;
        //slug str help
        $row->slug=Str::slug($request->name, '-');

        $row->detail=html_entity_decode($request->detail);
        //larevel
        $row->metadesc=html_entity_decode($request->metadesc);
        $row->metakey=html_entity_decode($request->metakey);
        $row->number=$request->number;
        $row->price=$request->price;
        $row->pricesale=$request->pricesales;
        $row->status=$request->status;


        $row->updated_at=Carbon::now();
        $row->updated_by=$user_id;


        //Xử Lý Img
        if($request->hasFile('img'))
        {
            $image=$request->file('img');
            $imgName=Str::slug($request->name, '-').".".$image->getClientOriginalExtension();
            $image->move(base_path().'/public/img/product/',$imgName);
            $row->img=$imgName;
            $row->save();



        }



        if(Product::where([['name','=',$request->name],['id','<>',$id]])->count())
        {
            return redirect()->route("product_index")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Đã Toàn Tại "]);
        }
        $row->save();
        return redirect()->route("product_index")->with("message",["type"=>"success","msg"=>"Cập Nhật Thành Công "]);

    }
    function status($id)
    {   $user_id=Auth::user()->id;
        $row =Product::find($id);
        if($row==null)
        {
            return redirect()->route("product_index")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=2;
            //$row->update_at=;
            //$row->update_by=;
        }
        $row->save();
        return redirect()->route("product_index")->with("message",["type"=>"success","msg"=>"Cập[ Nhật Sản Phẩm Hết Hàng "]);
    }
    function updatestatus($id)
    {   $user_id=Auth::user()->id;
        $row =Product::find($id);
        if($row==null)
        {
            return redirect()->route("product_index")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=1;
            $row->updated_at=Carbon::now();
            $row->updated_by=$user_id;
        }
        $row->save();
        return redirect()->route("product_index")->with("message",["type"=>"success","msg"=>"Sản Phẩm Có Hàng Trở Lại"]);
    }
    function deltrash($id)
    {   $user_id=Auth::user()->id;
        $row =Product::find($id);
        if($row==null)
        {
            return redirect()->route("product_index")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=0;
            $row->updated_at=Carbon::now();
            $row->updated_by=$user_id;
        }
        $row->save();
        return redirect()->route("product_index")->with("message",["type"=>"success","msg"=>"Xóa Thành Công"]);
    }
    function retrash($id)
    {   $user_id=Auth::user()->id;
        $row =Product::find($id);
        if($row==null)
        {
            return redirect()->route("product_index")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Không Tồn Tại"]);
        }else
        {
            $row->status=2;
            $row->updated_at=Carbon::now();
            $row->updated_by=$user_id;
            $row->save();
            return redirect()->route("product_index")->with("message",["type"=>"success","msg"=>"Khôi Phục Thành Công"]);
        }

    }

    function delete($id)
    {
        $row =Product::find($id);
        if($row==null)
        {
            return redirect()->route("product_trash")->with("message",["type"=>"danger","msg"=>"Sản Phẩm Không Tồn Tại"]);
        }else
        {

            $row->delete();
            return redirect()->route("product_trash")->with("message",["type"=>"success","msg"=>"Xóa Thành Công"]);
        }
    }

}
