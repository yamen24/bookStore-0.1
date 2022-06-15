<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    function cartstore(Request $request)
    {
      if(Cookie::get('g_cart_id')){
        $generator_cart_id = Cookie::get('g_cart_id');
      }
      else {
        $generator_cart_id = Str::random(5).rand(2,1000);
        Cookie::queue('g_cart_id' , $generator_cart_id , 1440);
      }
     if(Cart::where('generator_cart_id' , $generator_cart_id)->where('product_id' , $request->product_id)->exists()){
       Cart::where('generator_cart_id' , $generator_cart_id)->where('product_id' , $request->product_id)->increment('product_quantity' , $request->product_quantity);
     }
     else {
       Cart::insert([
         'generator_cart_id' => $generator_cart_id,
         'product_id' => $request->product_id,
         'product_quantity' => $request->product_quantity,
         'created_at' => Carbon::now(),
       ]);

        Order::insert([
          'generator_cart_id' => $generator_cart_id,
          'product_id' => $request->product_id,
          'product_quantity' => $request->product_quantity,
          'created_at' => Carbon::now(),
        ]);
      
     }




     return back();
    }

    function cartdestroy($cart_id)
    {
      Cart::withTrashed()->find($cart_id)->forceDelete();
      return back()->with('delete_status' , 'ID '.$cart_id.' Delete Successfully!');
    }

    function cardindex()
    {

        $sub_total = 0;

        foreach (cart_items() as $single_cart) {
              $sub_total += $single_cart->product->product_price * $single_cart->product_quantity;
        }
      
      return view('frontend.cardview' , compact('sub_total'));
    }

    public function checkout(){
        return view('frontend.checkout');
    }

    public function checkoutpost(Request $request){


        foreach(cart_items() as $cart_item){
            Book::find($cart_item->product_id);
            $cart_item->forceDelete();
        }


        return redirect('/');

    }   


    
}
