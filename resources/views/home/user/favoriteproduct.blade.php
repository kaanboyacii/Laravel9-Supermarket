@extends('layouts.frontbase')

@section('title', 'Kullanıcı Paneli Favoriler')
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
                    <h2>Hesabım</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <h4>İşlemlerim</h4>
                        <ul>
                            @include('home.user.usermenu')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="container">
                    <div class="row">
                        <div class="contact__widget">
                            <h4 style="text-align: center;">Favori Ürünlerim</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Ürünler</th>
                                    <th>Fiyat</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('home.messages')
                                @foreach($favproducts as $rs)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="height: 50px;width:50px" src="{{ Storage::url($rs->product->image)}}" alt="">
                                        <h5><a style="color: black;" href="{{route('product',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($rs->product->price, 2) }}₺
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a style="color: black;" class="icon_close" href="{{route('destroyfavorite',['id'=>$rs->id])}}" , onclick="return confirm('İptal Etmek İçin Emin misiniz ?')"></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection