@extends('layouts.dashboard_app')
@section('page_title')
    {{ ('Paravel | Dashboard ') }}
@endsection
@section('home')
  active
@endsection

@section('dashboard_content')

 <!-- ########## START: MAIN PANEL ########## -->
  <div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <span class="breadcrumb-item active">Dashboard</span>
    </nav>

    <div class="sl-pagebody">
      <div class="sl-page-title">
        <h5>Dashboard </h5>
        <p>This is a Dashboard Page</p>

        <h2>
          @if (Auth::user()->role == 1)
            Your Are Admin
          @else
            Your Are Customer
          @endif
        </h2>
      </div><!-- sl-page-title -->

    </div><!-- sl-pagebody -->
  </div><!-- sl-mainpanel -->
 <!-- ########## END: MAIN PANEL ########## -->
@endsection

