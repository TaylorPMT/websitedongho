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

class CartController extends Controller
{
    //
    public function add(Cart $cart,$id)

    {
       $product=Product::find($id);
        //gọi hàm lại
       $cart->add($product);



       return redirect()->back();
    }
    public function remove(Cart $cart ,$id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(Cart $cart ,$id)
    {      $quantity=request()->quantity ?request()->quantity:1;
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

        $user_id=Auth::user()->id;
        $name_user=Auth::user()->fullname;
        $email=Auth::user()->email;
        $phone=Auth::user()->phone;
        $roworder=new Order;
        $roworder->code=rand();
        $roworder->userid=$user_id;
        $roworder->created_ate=Carbon::now('Asia/Ho_Chi_Minh');
        $roworder->exportdate=Carbon::now('Asia/Ho_Chi_Minh');
        $roworder->deliveryname=$name_user;
        $roworder->deliveryphone=$phone;
        $roworder->deliveryemail=$email;
        $roworder->status=1;
        $roworder->created_at=Carbon::now('Asia/Ho_Chi_Minh');
        $roworder->save();
        return redirect()->back();

    }

}
