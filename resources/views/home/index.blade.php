@extends('layouts.frontbase')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories category__menu">
                    @php
                    $mainCategories = \App\Http\Controllers\HomeController::maincategorylist();
                    @endphp
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Kategoriler</span>
                    </div>
                    <ul>
                        @foreach($mainCategories as $rs)
                        <li class=""><a href="{{route('categoryproducts',['id'=>$rs->id])}}">{{$rs->title}}</a>
                            @if(count($rs->children))
                            @include('home.categorytree',['children' => $rs->children])
                            @endif
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                Tüm Kategoriler
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="Neye İhtiyacınız Var ?">
                            <button type="submit" class="site-btn">ARA</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+90 534 523 2689</h5>
                            <span>Destek 08:00-22:00</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg" data-setbg="{{asset('assets')}}/img/hero/banner2.jpg">
                    <div class="hero__text">
                        <span>Hızlı Teslimat</span>
                        <h2>En Ekonomik <br />En Kaliteli Ürünler</h2>
                        <a href="#" class="primary-btn">Alışverişe Başla</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($sliderdata as $rs)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ Storage::url("{$rs->image}") }}">
                        <h5><a href="{{route('categoryproducts',['id'=>$rs->id])}}">{{$rs->title}}</a></h5>
                    </div>
                </div>
                @endforeach
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
                    <h2>En Çok Satan Ürünlerimiz</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Hepsi</li>
                        @foreach($sliderdata as $rs)
                        <li data-filter=".oranges">{{$rs->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @include('home.messages')
        <div class="row featured__filter">
            @foreach($servicelist1 as $rs)
            <div class="col-lg-2 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{ Storage::url("{$rs->image}") }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="{{route('storefavorite',['id'=>$rs->id])}}"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="{{route('shopcart.add',['id'=>$rs->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{route('product',['id'=>$rs->id])}}">{{$rs->title}}</a></h6>
                        <h5>{{ number_format($rs->price, 2) }}₺</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <{{asset('assets')}} /img src="{{asset('assets')}}/img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <{{asset('assets')}} /img src="{{asset('assets')}}/img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Yeni Eklenenler</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($lastproducts as $rs)
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{ Storage::url("{$rs->image}") }}" />
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$rs->title}}</h6>
                                    <span>{{ number_format($rs->price, 2) }}₺</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>En Çok Satanlar</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($mostsellerproducts as $rs)
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{Storage::url($rs->product->image)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$rs->product->title}}</h6>
                                    <span>{{ number_format($rs->product->price, 2) }}₺</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>En Çok Değendirilenler</h4>
                    <div class="latest-product__slider owl-carousel">
                        @foreach($mosthasreviewproducts as $rs)
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{Storage::url($rs->product->image)}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$rs->product->title}}</h6>
                                    <span>{{ number_format($rs->product->price, 2) }}₺</span>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Sıkça Sorulan Sorular</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($lastfaqs as $rs)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$rs->created_at->format('m/d/Y')}}</li>
                        </ul>
                        <h5><a href="#">{{$rs->question}}</a></h5>
                        <p>{!!$rs->answer!!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
