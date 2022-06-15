@extends('layouts.frontend_app')

@section('frontend_content')
  <!-- .breadcumb-area start -->
  <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcumb-wrap text-center">
            <h2>About Us</h2>
            <ul>
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><span>About</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .breadcumb-area end -->

   <!-- about-area start -->
    <div class="about-area ptb-50 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about-wrap text-center">
                        <h3>Welcome Our Store! </h3>
                        <p>Write details</p>
                        <p>Write details</p>
                        <p class="mb-0">Write details</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about-area end -->

@endsection
