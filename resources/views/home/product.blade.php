@extends('layouts.frontbase')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>{{$data->title}}</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Anasayfa </a>
                        <a href="./index.html">{{$data->category->title}} </a>
                        <span>{{$data->title}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img style="height: 550px;" class="product__details__pic__item--large" src="{{ Storage::url($data->image)}}">
                    </div>
                    <div class=" product__details__pic__slider owl-carousel">
                        @foreach($images as $rs)
                        <img data-imgbigurl="{{ Storage::url($rs->image)}}" src="{{ Storage::url($rs->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{$data->title}}</h3>
                    @php
                    $average = $data->comment->average('rate');
                    @endphp
                    <div class="product__details__rating">
                        <i @if ($average==0) class="fa fa-star-o" @endif></i>
                        <i @if ($average>1 or $average==1) class="fa fa-star" @endif></i>
                        <i @if ($average>2 or $average==2) class="fa fa-star" @endif
                            @if ($average<2) class="fa fa-star-o" @endif></i>
                        <i @if ($average>3 or $average==3) class="fa fa-star" @endif
                            @if ($average<3) class="fa fa-star-o" @endif></i>
                        <i @if ($average>4 or $average==4) class="fa fa-star" @endif
                            @if ($average<4) class="fa fa-star-o" @endif></i>
                        <i @if ($average>5 or $average==5) class="fa fa-star" @endif
                            @if ($average<5) class="fa fa-star-o" @endif></i>
                        <span>({{$data->comment->count('id')}})</span>
                    </div>
                    <div class="product__details__price">{{ number_format($data->price, 2) }} ₺</div>
                    <p>{{$data->description}}</p>
                    @include('home.messages')
                    <form action="{{route('shopcart.store')}}" method="post">
                        @csrf
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="number" name="quantity" value="1" min="1" max="{{$data->quantity}}">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="{{$data->id}}">
                        <button class="primary-btn" type="submit">SEPETE EKLE</button>
                    </form>
                    <a href="{{route('storefavorite',['id'=>$data->id])}}" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Stok</b> <span>{{$data->quantity}}</span></li>
                        <li><b>Paylaş</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Ürün Detayları</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab" aria-selected="false">İncelemeler <span>({{$data->comment->count('id')}})</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Ürün Detayları</h6>
                                <p>{!! $data->detail !!}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                @foreach($reviews as $rs)
                                <div class="container">
                                    <div class="row gy-5">
                                        <div class="col-6">
                                            <div class="p-3">
                                                <div><a href="#">{{$rs->user->name}}</a></div>
                                                <div class="product__details__rating">
                                                    <i @if ($rs->rate>=1) class="fa fa-star" @endif
                                                        ></i>
                                                    <i @if ($rs->rate>=2) class="fa fa-star" @endif
                                                        @if ($rs->rate<2) class="fa fa-star-o" @endif></i>
                                                    <i @if ($rs->rate>=3) class="fa fa-star" @endif
                                                        @if ($rs->rate<3) class="fa fa-star-o" @endif></i>
                                                    <i @if ($rs->rate>=4) class="fa fa-star" @endif
                                                        @if ($rs->rate<4) class="fa fa-star-o" @endif></i>
                                                    <i @if ($rs->rate>=5) class="fa fa-star" @endif
                                                        @if ($rs->rate<5) class="fa fa-star-o" @endif></i>
                                                </div>
                                                <h5>{{$rs->subject}}</h5>
                                                <p>{{$rs->comment}}</p>
                                                <div>{{$rs->created_at}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Yorum Ekle</h2>
                </div>
            </div>
        </div>
        <form action="{{route('storecomment')}}" method="post" id="review_form" class="review_form">
            @csrf
            <div class="row">
                <input type="hidden" class="input" name="product_id" value="{{$data->id}}" />
                <div class="col-lg-6 col-md-6">
                    <input name="subject" type="text" placeholder="Konu Başlığı">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input name="rate" min="1" max="5" type="number" placeholder="Değerlendirme">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea class="review_form_text" name="comment" placeholder="Yorumunuz"></textarea>
                    <button type="submit" class="site-btn">YORUMU GÖNDER</button>
                </div>
            </div>
        </form>
        @include('home.messages')
    </div>
</div>
@endsection
