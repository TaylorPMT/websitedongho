<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Cart;
use App\Models\Product;

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

}
