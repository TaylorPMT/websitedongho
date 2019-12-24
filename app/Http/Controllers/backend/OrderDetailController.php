<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Orderdetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    //
    public function orderdetail($code)
    {
        $list=Orderdetail::where('db_orderdetail.orderid','=',$code)
        ->join("db_product","db_orderdetail.productid",'=',"db_product.id")
        ->select('db_orderdetail.*','db_product.name as name')
        ->get();
        return view('backend.page.order.orderdetail',compact('list'));
    }
    public function status($code)
    {   $listid=Order::where('code','=',$code)->get();
        foreach($listid as $item)
        {
            $list=$item->id;
        }
        $roworder=Order::find($list);
        $roworder->status=2;

        $roworder->save();
        return redirect()->route('index-order')->with("message",["type"=>"success","msg"=>"Duyệt Đơn Thành Công "]);;
    }
    public function error($code)
    {
        $listid=Order::where('code','=',$code)->get();
        foreach($listid as $item)
        {
            $list=$item->id;
        }
        $roworder=Order::find($list);
        $roworder->status=3;

        $roworder->save();
        return redirect()->route('index-order')->with("message",["type"=>"danger","msg"=>"Đơn Hàng Bị Lỗi  "]);;
    }

}
