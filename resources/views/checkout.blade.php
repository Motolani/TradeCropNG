@extends('layouts.master')
@section('content')
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div> --}}
            <div class="checkout__form">
                <h4 class="text-center">Checkout</h4>
                    <div class="row">
                        {{-- <form action="#">
                            <div class="col-lg-8 col-md-6">
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" placeholder="Street Address" class="checkout__input__add">
                                    <input type="text" placeholder="Apartment, suite, unite ect (optinal)">
                                </div>
                                <div class="checkout__input">
                                    <p>Town/City<span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__input">
                                    <p>Country/State<span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__input">
                                    <p>Postcode / ZIP<span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Phone<span>*</span></p>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                      
                            </div>
                        </form> --}}
                        <div class="col-lg-12 col-md-12">
                            <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
                                {{-- @csrf --}}
                                <div class="checkout__order">
                                    
                                    <h4>Your Order</h4>
                                    <div class="checkout__order__products">Products <span>Total</span></div>
                                    @if (isset($cart))
                                    <ul>
                                        
                                        @foreach ($cart as $item)
                                                <li>{{$item->cropName}} <span> {{$item->price_quantity}}</span></li>
                                        @endforeach
                                    </ul>

                                    @endif
                                    <input type="hidden" name="public_key" value="FLWPUBK_TEST-f2465c74ca43033023028e929517bf3d-X" />
                                    <input type="hidden" name="customer[email]" value="{{$user->email}}" />
                                    <input type="hidden" name="customer[name]" value="{{$user->name}}" />
                                    <input type="hidden" name="tx_ref" value="{{$requestId}}" />
                                    <input type="hidden" name="amount" value="{{$sum}}" />
                                    <input type="hidden" name="currency" value="NGN" />
                                    <input type="hidden" name="meta[token]" value="54" />
                                    <input type="hidden" name="redirect_url" value="{{url('paymentRedirect')}}" />
                                    
                                    <div class="checkout__order__subtotal">Subtotal <span>N {{$sum}}</span></div>
                                    <div class="checkout__order__total">Total <span>N {{$sum}}</span></div>
                                    {{-- <div class="checkout__input__checkbox">
                                        <label for="paypal">
                                            Paypal
                                            <input type="checkbox" id="paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> --}}
                                    <button type="submit" id="start-payment-button" class="site-btn">PLACE ORDER</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection