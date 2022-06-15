@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | Book Add ') }}
@endsection

@section('Book')
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
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Book Page</h1>

              <div class="btn-group mb-2" role="group" aria-label="Basic example">
                <a href = "{{ route('book.index') }}" type="button" class="btn btn-success">Add Book</a>
              </div>


           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Book View</h2>
                          <hr>
                         <h4>Total Book : {{ $total_books }}</h4>
                       </div>
                       <div class="card-body">
                         @if(session()->has('delete_message'))
                           <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              {{ session()->get('delete_message') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif

                         @if(session()->has('mark_trash'))
                         <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                            {{ session()->get('mark_trash') }}
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                       @endif

                         
                      
                          <table class="table table-dark" id = "data_tables">
                            <thead>
                              <tr>

                                <th>SL No.</th>
                                <th>Book Name</th>
                        
                                <th>Book Price</th>
                                <th>Description</th>
                                <th>Book Photo</th>
                                <th>Action</th>
                              </tr>
                            </thead>

                            <tbody>
                              @forelse($books_all as $book)

                              <tr>

                              
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ Str::limit($book->book_name , 15) }}</td>
                               
                                <td>{{ $book->book_price }}</td>
                                <td>{{ Str::limit($book->description , 20) }}</td>
                                <td>
                                  <img src="{{ asset('uploads/book_photos') }}/{{ $book->cover_image }}" alt="" width="100">
                                </td>
                                <td>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href = "{{ route('book.edit' , $book->id) }}" type="button" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('book.destroy' , $book->id) }}" method="post">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                  </div>
                                </td>

                                
                              </tr>
                              @empty
                                <tr>
                                  <td class = "text-danger text-center" colspan="50">No Data Available</td>
                                </tr>
                            @endforelse

                            </tbody>
                          </table>   

                       </div>
                   </div>
              </div>
           </div>
       </div>

     </div><!-- sl-pagebody -->
   </div><!-- sl-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('footer_scripts')

<script>
// $(document).ready(function() {
//     $('#data_tables').DataTable();
// } );
$(document).ready(function() {
    $('#data_tables').DataTable( {
        "scrollY":        "400px",
        "scrollCollapse": true,
        "paging":         false
    } );
} );
</script>
@endsection
