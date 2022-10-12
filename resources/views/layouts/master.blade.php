<!DOCTYPE html>
<html lang="english">

<head>
    @include('layouts.head')
</head>

<body>
    
    @include('layouts.topnav')   
    
    <!-- Header Section Begin -->
    <header class="header">
        @include('layouts.header')   
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        @php
                        
                           {{$cropCat = \App\Models\CropCategory::all();}}
                        @endphp
                        <ul>
                        @if(isset($cropCat))
                            @foreach ($cropCat as $item)
                                <li><a href="#">{{$item->name}}</a></li>
                            @endforeach
                            
                        @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    @yield('contentHero')
                    
                    {{-- <section class="breadcrumb-section set-bg" data-setbg="{{asset('assets/img/breadcrumb.jpg')}}">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <div class="breadcrumb__text">
                                        <h2>Contact Us</h2>
                                        <div class="breadcrumb__option">
                                            <a href="./index.html">Home</a>
                                            <span>Contact Us</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    
    @yield('content')
   
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        @include('layouts.footer')  
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('assets/js/mixitup.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>



</body>

</html>