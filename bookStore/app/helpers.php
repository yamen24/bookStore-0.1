<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;



  function total_count_cart(){
    return Cart::where('generator_cart_id' , Cookie::get('g_cart_id'))->count();
  }

  function cart_items(){
    return Cart::where('generator_cart_id' , Cookie::get('g_cart_id'))->get();
  }

