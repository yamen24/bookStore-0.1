@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Dashboard | Book Add ') }}
@endsection

@section('book')
 active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Book</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Book Page</h5>
         <p>This is a Book Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row justify-content-center">
           <div class="col-md-8">
              <h1 class = "text-center my-3">Book Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('book.viewall') }}" type="button" class="btn btn-primary">All Book</a>
    
              </div>

           </div>

         </div>
           <div class="row justify-content-center">

              <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                       <h2>Book Add</h2>
                    </div>
                    <div class="card-body">

                      <form method="post" action = "{{ route('book.store') }}" enctype="multipart/form-data">
                        @csrf

                        @if(session()->has('success_status'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif

                        @if(session()->has('success_message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                             {{ session()->get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif



                        <div class="form-group">
                          <label>Book Name</label>
                          <input type="text" class="form-control" placeholder="Book Name" name = "book_name" value = "{{ old('book_name') }}">
                          @error ('book_name')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Book Price</label>
                          <input type="number" class="form-control" placeholder="Book Price" name = "book_price" value = "{{ old('book_price') }}">
                          @error ('book_price')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Description</label>
                          <textarea name="description" rows="2" class="form-control" placeholder="Description">{{ old('description') }}</textarea>
                          @error ('description')
                            <span class = "text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label>Cover Photo</label>
                          <input type="file" class="form-control" name="cover_image">
                        </div>

                        <button type="submit" class="btn btn-primary">Add Book</button>
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

