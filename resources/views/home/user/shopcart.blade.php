@extends('layouts.frontbase')

@section('title', 'Kullanıcı Paneli Sepet')

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
<section class="contact spad">
    <div class="container">
        <div class="row">
            @include('home.user.usermenu')
        </div>
    </div>
</section>
<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="contact__widget">
                        <h4 style="text-align: center;">Sepetim</h4>
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
                                <th>Miktar</th>
                                <th>Toplam Fiyat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('home.messages')
                            @php
                            ($total=0)
                            @endphp
                            @foreach($data as $rs)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img style="height: 50px;width:50px" src="{{ Storage::url($rs->product->image)}}" alt="">
                                    <h5><a style="color: black;" href="{{route('product',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{$rs->product->price}}₺
                                </td>
                                <form action="{{route('shopcart.update',['id'=>$rs->id])}}" method="post">
                                    @csrf
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" name="quantity" value="{{$rs->quantity}}" min="1" max="{{$rs->product->quantity}}" onchange="this.form.submit()">
                                            </div>
                                        </div>
                                </form>
                                </td>
                                <td class="shoping__cart__total">
                                    {{$rs->product->price * $rs->quantity}}₺
                                </td>
                                <td class="shoping__cart__item__close">
                                    <a style="color: black;" class="icon_close" href="{{route('shopcart.destroy',['id'=>$rs->id])}}" , onclick="return confirm('Silmek İçin Emin misiniz ?')"></a>
                                </td>
                            </tr>
                            @php
                            ($total += $rs->product->price * $rs->quantity)
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">Alışverişe Devam Et</a>
                    <!-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Sepeti Güncelle</a> -->
                </div>
                <div class="shoping__continue">
                    <div class="shoping__discount">
                        <h5>İndirim kodları</h5>
                        <form action="#">
                            <input type="text" placeholder="Kupon Kodunuz Giriniz">
                            <button type="submit" class="site-btn">Kuponu Uygula</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Sepet Tutarı</h5>
                    <ul>
                        <li>Subtotal <span>{{$total}}₺</span></li>
                        <li>Total <span>{{$total}}₺</span></li>
                    </ul>
                    <form action="{{route('shopcart.order')}}" method="post">
                        @csrf
                        <input type="hidden" name="total" value="{{$total}}">
                        <button class="primary-btn" type="submit" >Ödeme Adımına İlerle</button>
                </div>
            </div>
            <div class="col-lg-6">

            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection
