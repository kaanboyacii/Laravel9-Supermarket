@extends('layouts.frontbase')

@section('title', 'Sipariş Onay')
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<section class="breadcrumb-section set-bg" data-setbg="{{asset('assets')}}/img/colorcard.png">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Sipariş Onay</h2>
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
        @include('home.messages')
    </div>
</section>
<!-- Checkout Section End -->
@endsection
