@extends('layouts.frontbase')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<!-- Blog Details Hero Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Sıkça Sorulan Sorular</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Anasayfa </a>
                        <a href="{{route('faq')}}">Sıkça Sorulan Sorular </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->
<!-- faq start -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Son Eklenen SSS</h4>
                        <div class="blog__sidebar__recent">
                            @foreach($lastfaqs as $rs)
                            <a class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__text">
                                    <h6>{{$rs->question}}</h6>
                                    <span>{{$rs->created_at}}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="{{asset('assets')}}/img/blog/faq.png" alt="">
                    @foreach($datalist as $rs)
                    <h3>{{$rs->question}}</h3>
                    <p>{!!$rs->answer!!}</p>
                    @endforeach
                </div>
                <div class="blog__details__content">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="blog__details__author">
                                <div class="blog__details__author__pic">
                                    <img src="{{asset('assets')}}/img/blog/details/details-author1.jpeg" alt="">
                                </div>
                                <div class="blog__details__author__text">
                                    <h6>Kaan Boyacı</h6>
                                    <span>Yönetici</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="blog__details__widget">
                                <div class="blog__details__social">
                                <a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                                <a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->
<!-- faq end -->

@endsection
