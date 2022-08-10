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
            @auth
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="{{route('userpanel.favoriteproduct')}}"><i class="fa fa-heart"></i> <span>1</span></a></li>
                        <li><a href="{{route('shopcart.index')}}"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                    </ul>
                    @php
                    ($total =0)
                    @endphp
                    @foreach($shopcarttotal as $rs)
                    @php
                    ($total += $rs->product->price * $rs->quantity)
                    @endphp
                    @endforeach
                    <div class="header__cart__price">Sepet Tutarı: <span>{{$total}}₺</span></div>
                </div>
            </div>
            @endauth
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>Türkçe</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Türkçe</a></li>
                    <li><a href="#">İngilizce</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="loginuser"><i class="fa fa-user"></i> Üye Giriş</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{route('home')}}">ANASAYFA</a></li>

                <li><a href="kategoriürünleri/1">ALIŞVERİŞ</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="kategoriürünleri/1">Alışverişe Başla</a></li>
                    </ul>
                </li>
                <li><a href="{{route('contact')}}">İLETİŞİM</a></li>
                <li><a href="{{route('about')}}">HAKKIMIZDA</a></li>
                <li><a href="{{route('faq')}}">SSS</a></li>
                <li><a href="{{route('userpanel.index')}}">HESABIM</a>
                    <ul class="header__menu__dropdown">
                        <li> @guest
                            <a href="/loginuser">Üye Giriş</a>
                        </li>
                        <li>
                            <a href="/registeruser">Üye Ol</a>
                            @endguest
                        </li>
                        <li> @auth
                            <a href="{{route('userpanel.index')}}">{{Auth::user()->name}}</a>
                            @endauth
                        </li>
                        <li> @auth
                            <a href="/logoutuser">Çıkış Yap</a>
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
                                <a href="/loginuser"><i class="fa fa-user"></i>Üye Giriş</a>
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
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{route('home')}}">ANASAYFA</a></li>
                            <li><a href="kategoriürünleri/1">ALIŞVERİŞ</a></li>
                            <li><a href="{{route('contact')}}">İLETİŞİM</a></li>
                            <li><a href="{{route('about')}}">HAKKIMIZDA</a></li>
                            <li><a href="{{route('faq')}}">SSS</a></li>
                            <li><a href="#">HESABIM</a>
                                <ul class="header__menu__dropdown">
                                    <li> @guest
                                        <a href="/loginuser">Üye Girişi</a>
                                    </li>
                                    <li>
                                        <a href="/registeruser">Üye Ol</a>
                                        @endguest
                                    </li>
                                    <li> @auth
                                        <a href="{{route('userpanel.index')}}">{{Auth::user()->name}}</a>
                                        @endauth
                                    </li>
                                    <li> @auth
                                        <a href="/logoutuser">Çıkış Yap</a>
                                        @endauth
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                @auth
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="{{route('userpanel.favoriteproduct')}}"><i class="fa fa-heart"></i> <span>{{$favproducts->count()}}</span></a></li>
                            <li><a href="{{route('shopcart.index')}}"><i class="fa fa-shopping-bag"></i> <span>{{$orderproducts->count()}}</span></a></li>
                        </ul>
                        @php
                        ($total =0)
                        @endphp
                        @foreach($shopcarttotal as $rs)
                        @php
                        ($total += $rs->product->price * $rs->quantity)
                        @endphp
                        @endforeach
                        <div class="header__cart__price">Sepet Tutarı: <span>{{ number_format($total, 2) }}₺</span></div>
                    </div>
                </div>
                @endauth
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
