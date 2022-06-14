@extends('layouts.dashboard_app')

@section('page_title')
 {{ ('Paravel | Product Add ') }}
@endsection

@section('product')
 active
@endsection

@section('dashboard_content')
  <!-- ########## START: MAIN PANEL ########## -->
   <div class="sl-mainpanel">
     <nav class="breadcrumb sl-breadcrumb">
       <a class="breadcrumb-item" href="{{ url('home') }}">Home</a>
       <span class="breadcrumb-item active">Order</span>
     </nav>

     <div class="sl-pagebody">
       <div class="sl-page-title">
         <h5>Order Page</h5>
         <p>This is a Product Page</p>
       </div><!-- sl-page-title -->

       <div class="container-fluid">
         <div class="row">
           <div class="col-md-12">
              <h1 class = "text-center my-3">Order Page</h1>
           </div>
         </div>
           <div class="row">
              <div class="col-md-12">
                   <div class="card">
                       <div class="card-header">
                          <h2>Order View</h2>
                          <hr>
                         {{-- <h4>Total Product : {{ $product_total }}</h4> --}}
                       </div>
                       <div class="card-body">
                         @if(session()->has('trash_status'))
                           <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                              {{ session()->get('trash_status') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif
                         @if(session()->has('delete_sms'))
                           <div class="alert alert-warning alert-dismissible fade show text-danger" role="alert">
                              {{ session()->get('delete_sms') }}
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                         @endif

                             <table class="table table-dark" id = "data_tables">
                               <thead>
                                 <tr>
                                    <th scope="col">SL No.</th>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Book ID</th>
                                    <th scope="col">Book Quantity</th>
                                    <th scope="col">Action</th>
                                 </tr>
                               </thead>

                               <tbody>
                                 @forelse($orders as $order)
                                 <tr>
                                   <td>{{ $loop->index + 1 }}</td>
                                   <td>{{ $order->generator_cart_id}}</td>
                                   <td>{{ $order->product_id }}</td>
                                   <td>{{ $order->product_quantity }}</td>

                                   <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                      <a href = "{{ route('order.delete' , $order->id) }}" type="button" class="btn btn-danger">Delete</a>
                                     
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
