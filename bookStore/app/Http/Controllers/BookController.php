<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.product.index');
    }

    public function bookviewall(){
        return view('backend.product.show' , [
            'books_all' => Book::Latest()->get(),
            'total_books' => Book::all()->count(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug_link = Str::slug($request->book_name.'-'.Str::random(6));
        $request->validate([
          'book_name' => 'required' , 'unique:books,book_name',
          'book_price' => 'required|numeric',
          'description' => 'required',
        ]);
         $product_id = Book::insertGetId($request->except('_token' , 'cover_image') + [
           'created_at' => Carbon::now(),
           'slug' => $slug_link,
         ]);

         if($request->hasFile('cover_image')){
           $uploded_photo = $request->file('cover_image');
           $new_photo_name = $product_id.'.'.$uploded_photo->getClientOriginalExtension();
           $new_photo_location = 'public/uploads/book_photos/'.$new_photo_name;
           Image::make($uploded_photo)->resize(500,385)->save(base_path($new_photo_location) , 40);
           Book::find($product_id)->update([
             'cover_image' => $new_photo_name
           ]);
       }
       return back()->with('success_message' , 'Book Insert SuccessFully!!');

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('backend.product.edit' ,[
            'book_info' => $book
          ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $book->update($request->except('_token' , '_method' , 'cover_image'));
        if($request->hasFile('cover_image')){
          if($book->cover_image != 'thumbnail.png'){
            // delete photo
            $old_location = 'public/uploads/book_photos/'.$book->cover_image;
            unlink(base_path($old_location));
          }
          $uploded_photo = $request->file('cover_image');
          $new_photo_name = $book->id.'.'.$uploded_photo->getClientOriginalExtension();
          $new_photo_location = 'public/uploads/book_photos/'.$new_photo_name;
          Image::make($uploded_photo)->resize(500,385)->save(base_path($new_photo_location) , 70);
          $book->update([
            'cover_image' => $new_photo_name
          ]);
        }
        return back()->with('success_sms' , 'Book Update Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return back()->with('delete_message' , 'Book Delete SuccessFully!!');
    }
}
