    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{asset('assets')}}/img/izlogo.jpg" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('home')}}">ANASAYFA</a></li>

                <li><a href="#">ALIŞVERİŞ</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="{{route('contact')}}">İLETİŞİM</a></li>
                <li><a href="{{route('about')}}">HAKKIMIZDA</a></li>
                <li><a href="{{route('faq')}}">SSS</a></li>
                <li><a href="#">HESABIM</a>
                    <ul class="header__menu__dropdown">
                        <li> @guest
                            <a href="/loginuser">Login</a>
                        </li>
                        <li>
                            <a href="/registeruser">Register</a>
                            @endguest
                        </li>
                        <li> @auth
                            <a href="#">{{Auth::user()->name}}</a>
                            @endauth
                        </li>
                        <li> @auth
                            <a href="/logoutuser">Logout</a>
                            @endauth
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
            <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
            <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
            <a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> izmarket35@gmail.com</li>
                                <li>Bir Gün Değil Her gün Hesaplı</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                                <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>Dil Seçeneği</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Türkçe</a></li>
                                    <li><a href="#">İngilizce</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i>Üye Giriş</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home')}}"><img src="{{asset('assets')}}/img/izlogo.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('home')}}">ANASAYFA</a></li>
                            <li><a href="#">ALIŞVERİŞ</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('contact')}}">İLETİŞİM</a></li>
                            <li><a href="{{route('about')}}">HAKKIMIZDA</a></li>
                            <li><a href="{{route('faq')}}">SSS</a></li>
                            <li><a href="#">HESABIM</a>
                                <ul class="header__menu__dropdown">
                                    <li> @guest
                                        <a href="/loginuser">Login</a>
                                    </li>
                                    <li>
                                        <a href="/registeruser">Register</a>
                                        @endguest
                                    </li>
                                    <li> @auth
                                        <a href="#">{{Auth::user()->name}}</a>
                                        @endauth
                                    </li>
                                    <li> @auth
                                        <a href="/logoutuser">Logout</a>
                                        @endauth
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
