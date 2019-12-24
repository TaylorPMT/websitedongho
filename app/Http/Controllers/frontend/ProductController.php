<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Library\Library_my;
class ProductController extends Controller
{
    //
    function index()
    {
        $list=Product::where(['status'=>1])->orderBy('created_at','desc')->paginate(9);
        return view('frontend.product',compact('list'));
    }
    function category($slug)
    {
        $row_cat=Category::where(['slug'=>$slug])->first();
        $category_all=Category::where(['status'=>1])->get();
        $list_catid=Library_my::category_listid($category_all,$row_cat->id,[$row_cat->id]);
        $list=Product::where(['status'=>1])->whereIn('catid',$list_catid)->orderBy('created_at',"desc")->paginate(6);
        return view('frontend.product-category',compact('list'));
    }
    public function sapxepgiam($slug)
    {
        $row_cat=Category::where(['slug'=>$slug])->first();
        $category_all=Category::where(['status'=>1])->get();
        $list_catid=Library_my::category_listid($category_all,$row_cat->id,[$row_cat->id]);
        $list=Product::where(['status'=>1])->whereIn('catid',$list_catid)->orderBy('price',"desc")->paginate(9);
        return view('frontend.product-category',compact('list'));
    }
    public function sapxeptang($slug)
    {
        $row_cat=Category::where(['slug'=>$slug])->first();
        $category_all=Category::where(['status'=>1])->get();
        $list_catid=Library_my::category_listid($category_all,$row_cat->id,[$row_cat->id]);
        $list=Product::where(['status'=>1])->whereIn('catid',$list_catid)->orderBy('price',"asc")->paginate(9);
        return view('frontend.product-category',compact('list'));
    }
    function detail($slug)
    {
        $row =Product::where(['slug'=>$slug])->first();
        $category_all=Category::where(['status'=>1])->get();
        $list_catid=Library_my::category_listid($category_all,$row->id,[$row->id]);
        $listother=Product::where([['status','=','1'],['id','<>',$row->id]])
        ->whereIn('catid',$list_catid)->orderBy('created_at',"desc")->get();
        return view('frontend.product-detail',compact('row','listother'));
    }
}
