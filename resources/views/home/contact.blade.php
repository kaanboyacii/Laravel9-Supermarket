@extends('layouts.frontbase')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bize Ulaşın</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Anasayfa </a>
                        <a href="{{route('contact')}}">Bize Ulaşın </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Telefon</h4>
                    <p>{{$setting->phone}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>İş Adresi</h4>
                    <p>{{$setting->adress}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Çalışma Saati</h4>
                    <p>{{$setting->opentime}}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>E-posta Adresi</h4>
                    <p>{{$setting->email}}</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=%C4%B0hsaniye,%20G%C3%B6k%C5%9Fen%20Efe%20Cd.%20No:68,%2035900%20Tire/%C4%B0zmir&t=k&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>{{$setting->company}}</h4>
            <ul>
                <li>Telefon: {{$setting->phone}}</li>
                <li>{{$setting->adress}}</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Mesaj gönder</h2>
                </div>
            </div>
        </div>
        @include('home.messages')
        <form action="{{route('storemessage')}}" id="review_form" class="review_form" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input name="name" type="text" placeholder="İsminiz">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="phone" type="text" placeholder="Telefonunuz">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="email" type="text" placeholder="E-postanız">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="subject" type="text" placeholder="Konu">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea name="message" placeholder="Mesajınız"></textarea>
                    <button type="submit" class="site-btn">MESAJI GÖNDER</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->
@endsection
