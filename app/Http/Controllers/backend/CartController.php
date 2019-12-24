<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CartController extends Controller
{
    //
    public function add(Cart $cart,$id)

    {
       $product=Product::find($id);
        //gọi hàm lại
       $cart->add($product);



       return redirect()->back()->with("message",["type"=>"success","msg"=>"Đặt Hàng Thành Công"]);
    }

    public function remove(Cart $cart ,$id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function update(Cart $cart ,$id)

    {


        $quantity=request()->quantity ?request()->quantity:1;
        $cart->update($id,$quantity);
        return redirect()->back();


    }
    public function clear(Cart $cart )
    {
        $cart->clear();
        return redirect()->back();
    }
    //trả về view
    public function view()
    {
        return view('frontend.cart');
    }
    public function store(Cart $cart)
    {

        $code_donhanh=rand();
        $user_id=Auth::user()->id;
        $name_user=Auth::user()->fullname;
        $email=Auth::user()->email;
        $phone=Auth::user()->phone;
        $roworder=new Order;
        $roworder->code=$code_donhanh;
        $roworder->userid=$user_id;

        $roworder->exportdate=Carbon::now('Asia/Ho_Chi_Minh');
        $roworder->deliveryname=$name_user;
        $roworder->deliveryphone=$phone;
        $roworder->deliveryemail=$email;
        $roworder->status=1;
        $roworder->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $roworder->total_order=$cart->total_price;
        $roworder->save();
        foreach($cart->items as $item)
        {
            $roworderdetrail=new Orderdetail();
            $roworderdetrail->orderid=$code_donhanh;
            $roworderdetrail->productid=$item['id'];
            $roworderdetrail->price=$item['price'];
            $roworderdetrail->quantity=$item['quantity'];
            $roworderdetrail->amount=$item['quantity']*$item['price'];

            $roworderdetrail->created_at=Carbon::now('Asia/Ho_Chi_Minh');
            $roworderdetrail->save();

        }
        if($roworder->save()&&$roworderdetrail->save())
        {
            $cart->clear();
            return redirect()->route("cart-view")->with("message",["type"=>"success","msg"=>"Đặt Hàng Thành Công"]);
        }



    }
    public function orderapproved()
    {
        $id_user=Auth::user()->id;
        $list=Order::where('userid','=',$id_user)->get();
        return view('frontend.order-approved',compact('list'));
    }
    public function orderdetail($id)
    {
        $list=Orderdetail::where('db_orderdetail.orderid','=',$id)
        ->join("db_product","db_orderdetail.productid",'=',"db_product.id")
        ->select('db_orderdetail.*','db_product.name as nameproduct')
        ->get();
        return view('frontend.orderdetail',compact('list'));
    }

}
