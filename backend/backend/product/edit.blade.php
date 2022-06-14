@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Paravel | Book Edit') }}
@endsection
@section('product')
  active
@endsection

@section('dashboard_content')

  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <a class="breadcrumb-item" href="{{ route('book.index') }}">Book</a>
       <a class="breadcrumb-item" href="#">{{ $book_info->book_name }}</a>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Book Edit Page</h5>
         <p>This is a Book Edit Page</p>
       </div><!-- sl-page-title -->



       <div class="container-fluid">
         <div class="row">
           <div class="col-md-6 m-auto">
             <div class="card">
                 <div class="card-header">
                    <h2>Edit Book</h2>
                 </div>
                 <div class="card-body">

                   <nav aria-label="breadcrumb">
                     <ol class="breadcrumb">
                       <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Book Insert</a></li>
                       <li class="breadcrumb-item active" aria-current="page"> {{ $book_info->book_name }} </li>
                     </ol>
                   </nav>

                   <form method="post" action = "{{ route('book.update' , $book_info->id) }}" enctype="multipart/form-data">
                     @csrf
                     @method('PATCH')

                     @if(session()->has('success_sms'))
                       <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ session()->get('success_sms') }}
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button>
                       </div>
                     @endif

                     <div class="form-group">
                      <label>Book Name</label>
                      <input type="text" class="form-control" placeholder="Book Name" name = "book_name" value = "{{ $book_info->book_name }}">
                      @error ('book_name')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Book Price</label>
                      <input type="number" class="form-control" placeholder="Book Price" name = "book_price" value = "{{ $book_info->book_price }}">
                      @error ('book_price')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Description</label>
                      <textarea name="description" rows="2" class="form-control" placeholder="Description">{{ $book_info->description }}</textarea>
                      @error ('description')
                        <span class = "text-danger">{{ $message }}</span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label>Cover Photo</label>
                      <input type="file" class="form-control" name="cover_image">

                      <td>
                        <img src="{{ asset('uploads/book_photos') }}/{{ $book_info->cover_image }}" alt="" width="100" class="mt-2">
                      </td>

                    </div>

                     <button type="submit" class="btn btn-primary">Update Book</button>
                   </form>

                 </div>
            </div>
           </div>

         </div>
       </div>

     </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection
