<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orderpage ()
    {
        return view('backend.order.index' , [
            'orders' => Order::all()
        ]);
    }

    public function orderdelete($id){
        Order::find($id)->delete();
        return back()->with('delete_sms' , 'Delete Order Successfully!!');
    }
}
