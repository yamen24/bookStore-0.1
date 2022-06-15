<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class FrontendController extends Controller
{
    public function homepage(){
        return view('frontend.index' , [
            'books_all'=> Book::all()
        ]);
    }

    public function productdetails($slug){
        $product_info = Book::where('slug' , $slug)->firstOrFail();
        return view('frontend.productdetails' , [
          'actvie_product' => $product_info,
         
        ]);
      }

        // Customer Login
        function loginregistration()
        {
          return view('frontend.loginregistration');
        }
        
        function customerregistration(Request $request)
        {
          $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);
          User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 2,
            'created_at' => Carbon::now(),
          ]);
          if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('home');
          }
          return back()->with('success_status' , $request->name.' Your Account Create Successfully !!!');
        }


      

}
