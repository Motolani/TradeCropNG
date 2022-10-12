@extends('layouts.master')
@section('contentHero')
@if (session('message'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('message') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger text-center" role="alert">
        {{ session('error') }}
    </div>
    @endif
    @if(count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger text-center" role="alert">
            {{ $error }}
        </div>
    @endforeach
@endif
<div class="hero__item set-bg" data-setbg="{{asset('assets/img/hero/banner.jpg')}}">
    <div class="hero__text">
        <span>FRUIT FRESH</span>
        <h2>Vegetable <br />100% Organic</h2>
        <p>Free Pickup and Delivery Available</p>
        <a href="#" class="primary-btn">SHOP NOW</a>
    </div>
</div>
@endsection
@section('content')
<!-- Categories Section Begin -->

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @if (isset($crops))
                    @foreach ($crops as $item)
                    <div class="col-lg-3">      
                        <div class="categories__item set-bg" data-setbg="{{ asset('storage/uploads/'.$item->img) }}">
                            <h5><a href="#{{$item->class_tags}}">{{$item->name}}</a></h5>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".food_crops" id="food_crops">Food Crops</li>
                        <li data-filter=".feed_crops" id="feed_crops">Feed Crops</li>
                        <li data-filter=".fiber_crops" id="fiber_crops">Fibre Crops</li>
                        <li data-filter=".oil_crops" id="oil_crops">Oil Crops</li>
                        <li data-filter=".ornamental_crops" id="ornamental_crops">Ornamental Crops</li>
                        <li data-filter=".industrial_crops" id="industrial_crops">Industrial Crops</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @if (isset($crops))
                @foreach ($crops as $item)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{$item->class_tags}}" >
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{asset('storage/uploads/'.$item->img)}}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    {{-- <form action="{{url('addToCart/', $item->id)}}"></form> --}}
                                    <li><a href="{{url('cart', $item->id)}}"><i class="fa fa-shopping-cart"></i></a></li>

                                    {{-- <form id="add-cart" action="{{url('addToCart',$item->id)}}" method="POST" class="d-none">
                                        <input type="hidden" value="{{$item->id}}" name="product_id">
                                        @csrf
                                    </form> --}}
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">Crab Pool Security</a></h6>
                                <h5>N{{$item->price}} / {{$item->price_per}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner mb-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('assets/img/banner/banner-1.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="{{asset('assets/img/banner/banner-2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
{{-- <section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Review Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('assets/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Latest Product Section End -->
@endsection