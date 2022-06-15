@extends('layouts.frontend_app')

@section('frontend_content')

    <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">

                
                <div class="col-lg-4">
                    <div class="order-area">
                        <form action="{{ route('checkoutpost') }}" method="POST">
                            @csrf

                        <h3>Your Order</h3>
                        <ul class="total-cost">
                            @foreach (cart_items() as $cart_item)
                            <li> {{ $cart_item->product->book_name }} X {{ $cart_item->product_quantity }} <span class="pull-right">$ {{ $cart_item->product->book_price * $cart_item->product_quantity }}.00</span></li>
                            @endforeach

                            <li>Subtotal <span class="pull-right"><strong>$ {{ session('sub_total') }}</strong></span></li>
                            <li>Discount Amount (%) <span class="pull-right"> -- </span></li>
                            <li>Total<span class="pull-right">$ {{ session('sub_total') }}</span></li>
                        </ul>
                        <ul class="payment-method">
                           
                            <li>
                                <input value = "2" name = "payment_option" id="card" type="radio">
                                <label for="card">Credit Card</label>
                            </li>
                        </ul>
                        <button type="submit">Place Order</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
