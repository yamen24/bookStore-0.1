@extends('layouts.frontend_app')

@section('frontend_content')
  <!-- .breadcumb-area start -->
  <div class="breadcumb-area bg-img-4 ptb-100">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="breadcumb-wrap text-center">
            <h2>Contact Us</h2>
            <ul>
              <li><a href="{{ url('/') }}">Home</a></li>
              <li><span>Contact</span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .breadcumb-area end -->

  <!-- contact-area start -->
      <div class="contact-area ptb-100">
          <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-12">
                    @if(session()->has('success_status'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                         {{ session()->get('success_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                      <div class="contact-form form-style">
                          <div class="cf-msg"></div>
                          <form method="post" enctype="multipart/form-data">
                          
                              <div class="row">
                                  <div class="col-12 col-sm-6">
                                      <input type="text" placeholder="Name" name="customer_name" >
                                    
                                  </div>
                                  <div class="col-12  col-sm-6">
                                      <input type="text" placeholder="Email" name="customer_email" >
                                     
                                  </div>
                                  <div class="col-12">
                                      <input type="text" placeholder="Subject" name="customer_subject" >
                                   
                                  </div>
                                  <div class="col-12">
                                      <textarea class="contact-textarea" placeholder="Message" name="customer_message"></textarea>
                                    
                                  </div>
                                  <div class="col-12">
                                    <input type="file" class = "form-control" name="customer_file">
                                  </div>
                                  <div class="col-12">
                                      <button type = "submit">SEND MESSAGE</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
                  <div class="col-lg-4 col-12">
                      <div class="contact-wrap">
                          <ul>
                              <li>
                                  <i class="fa fa-home"></i> Address:
                                  <p>International Islamic University Malaysia, 53100, Gombak, Malaysia</p>
                              </li>
                              <li>
                                  <i class="fa fa-phone"></i> Email address:
                                  <p>
                                      <span>rahatmoustafizur@gmail.com </span>
                                      <span>sazidctg550@gmail.com </span>
                                  </p>
                              </li>
                              <li>
                                  <i class="fa fa-envelope"></i> phone number:
                                  <p>
                                      <span>+60132275869</span>
                                      <span>+601131524255</span>
                                  </p>
                              </li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- contact-area end -->

@endsection
