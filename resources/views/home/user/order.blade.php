@extends('layouts.frontbase')

@section('title', 'Sipariş Sayfası')
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Ödeme</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Sipariş Detay</h4>
            <form action="{{route('shopcart.storeorder')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>İsim & Soyisim<span>*</span></p>
                                    <input type="text" name="name" placeholder="İsim & Soyisim" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Telefon<span>*</span></p>
                                    <input type="tel" name="phone" placeholder="Telefon">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>E-posta Adresi<span>*</span></p>
                                    <input type="email" name="email" placeholder="E-posta">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Adres<span>*</span></p>
                            <input type="text" name="address" placeholder="Adres" class="checkout__input__add">
                        </div>
                        <h4>Ödeme Bilgileri</h4>
                        <div class="checkout__input">
                            <p>Kart Sahibi<span>*</span></p>
                            <input type="text" name="nameoncard" placeholder="Kart Üzerindeki İsim & Soyisim">
                            <input type="hidden" name="total" value="{{$total}}">
                        </div>
                        <div class="checkout__input">
                            <p>Kart Numarası<span>*</span></p>
                            <input name="cardnumber" type="tel" maxlength="19" placeholder="Kart Numarası">
                        </div>
                        <div class="checkout__input">
                            <p>Son Kullanma Tarihi<span>*</span></p>
                            <input type="text" name="experationdate" placeholder="AA/YYYY">
                        </div>
                        <div class="checkout__input">
                            <p>Güvenlik Kodu (CVC)<span>*</span></p>
                            <input type="tel" name="cvcnumber" maxlength="3" placeholder="***">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <h4>Siparişiniz</h4>
                            <div class="checkout__order__products">Ürünler & Adet<span>Fiyat</span></div>
                            <ul>
                                @foreach($data as $rs)
                                <li>{{$rs->product->title}} x {{$rs->quantity}}<span> {{ number_format($rs->product->price, 2) }}₺</span></li>
                                @endforeach
                            </ul>
                            <div class="checkout__order__subtotal">Toplam <span>  {{ number_format($total, 2) }}₺</span></div>
                            <div class="checkout__order__total">Sipariş Toplam Tutarı <span>  {{ number_format($total, 2) }}₺</span></div>                          
                            <button type="submit" class="site-btn">SİPARİŞİ TAMAMLA</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
