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
                    <h2>Kişisel Verilerin Korunması Hakkında</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Anasayfa </a>
                        <a href="{{route('personaldata')}}">Kişisel Verilerin Korunması Hakkında </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-7 order-md-1 order-1">
                <div class="blog__details__text">
                    <img src="img/blog/details/details-pic.jpg" alt="">
                    {!! $setting->personaldata !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->
@endsection
