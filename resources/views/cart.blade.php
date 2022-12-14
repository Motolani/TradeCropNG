@extends('layouts.master')
@section('content')
     <!-- Shoping Cart Section Begin -->
     <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Per</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($cart))
                                    @foreach ($cart as $item)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ asset('storage/uploads/'.$item->img) }}" alt="" width="30%">
                                                <h5>{{$item->name}}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{$item->price}}
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{$item->quantity}}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{$item->price_per}}
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="icon_close"></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            {{-- <li>Subtotal <span>N {{$sum}}</span></li> --}}
                            <li>Total <span>N {{$sum}}</span></li>
                        </ul>
                        <a href="{{url('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection