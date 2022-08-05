    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{asset('assets')}}/img/izlogo.jpg" alt=""></a>
                        </div>
                        <ul>
                            <li>Adres: {{$setting->adress}}</li>
                            <li>Telefon: {{$setting->phone}}</li>
                            <li>Email: {{$setting->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="{{route('home')}}">Anasayfa</a></li>
                            <li><a href="{{route('about')}}">Hakkımızda</a></li>
                            <li><a href="{{route('contact')}}">İletişim</a></li>
                            <li><a href="{{route('faq')}}">Sıkça Sorulan Sorular</a></li>
                            <li><a href="{{route('personaldata')}}">Gizlilik İlkeleri</a></li>
                        </ul>
                        <ul>
                            <li><a href="/loginuser">Üye Giriş</a></li>
                            <li><a href="/registeruser">Üye Ol</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Hemen Üye Ol</h6>
                        <a class="site-btn" href="/registeruser">Üye Ol</a>
                        <hr>
                        <div class="footer__widget__social">
                            <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                            <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> İz Market A.Ş | Bu İnternet Sitesi <a href="https://github.com/kaanboyacii" target="_blank">Kaan Boyacı</a> Tarafından Yapıldı.
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{asset('assets')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('assets')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('assets')}}/js/mixitup.min.js"></script>
    <script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('assets')}}/js/main.js"></script>
