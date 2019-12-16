<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        /*$list=Order::where('db_order.status','<>','0')
        ->join("db_orderdetail","db_order.code",'=',"db_orderdetail.orderid")
        ->select('db_order.*','db_order.deliveryname as namecategory')->orderBy('code', 'desc')
        ->get();*/
        $list=Order::where('status','<>','0')->orderBy('created_at','desc')->get();
        return view('backend.page.order.index',compact('list'));
    }
}
