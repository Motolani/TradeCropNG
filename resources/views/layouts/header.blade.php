
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                    @auth
                        <ul>
                            <li><i class="fa fa-envelope"></i> {{Auth::user()->email}}</li>
                        </ul>
                    @endauth
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{asset('assets/img/language.png')}}')}}" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        @auth
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                            </div>
                            <div class="header__top__right__auth">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login /</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="{{ route('register') }}"> register</a>
                            </div>
                        @endauth
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="./index.html"><img src="{{asset('assets/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="#">Shop Details</a></li>
                                <li><a href="{{url('cart')}}">Shoping Cart</a></li>
                                <li><a href="#">Check Out</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    @php      
                    {{
                        $cart = \App\Models\Cart::where('user_id', Auth::id())->where('status', 0);
                        // $getCart = $cart->get();
                        $count = $cart->count();
                    }}
                @endphp
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{url('cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{$count}}</span></a></li>
                    </ul>
                    {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>