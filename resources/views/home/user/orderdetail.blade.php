@extends('layouts.frontbase')

@section('title', 'Geçmiş Sipariş Detay')

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
<!-- Blog Section Begin -->
<section class="blog spad">
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
            <div class="col-lg-9 col-md-9 col-sm-9">
                <h4 class="text-center">Sipariş Detay</h4> <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sipariş Id</th>
                            <td>{{$order->id}}</td>
                        </tr>
                        <tr>
                            <th>İsim</th>
                            <td>{{$order->name}}</td>
                        </tr>
                        <tr>
                            <th>Telefon</th>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <th>Adres</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th>Not</th>
                            <td>{{$order->note}}</td>
                        </tr>
                        <tr>
                            <th>Durum</th>
                            <td>{{$order->status}}</td>
                        </tr>
                        <tr>
                            <th>Sipariş Oluşturulma Tarihi</th>
                            <td>{{$order->created_at}}</td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <table class="table text-center">
                    <thead class="text-uppercase bg-warning">
                        <tr class="text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Ürün</th>
                            <th scope="col">Fotoğraf</th>
                            <th scope="col">Ücret</th>
                            <th scope="col">Sipariş Miktar</th>
                            <th scope="col">Tutar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderproducts as $rs)
                        <tr>
                            <th scope="row">{{$rs->product->id}}</th>
                            <td>{{$rs->product->title}}</td>
                            <td>
                                @if ($rs->product->image)
                                <img src="{{Storage::url($rs->product->image)}}" style="height:50px ;width:50px; border-radius:2px">
                                @endif
                            </td>
                            <td>{{$rs->product->price}}₺</td>
                            <td>{{$rs->quantity}} adet</td>
                            <td>{{$rs->amount}}₺</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="shoping__checkout">
                    <h5>Sepet Tutarı</h5>
                    <ul>
                        <li>Toplam Tutar <span>{{$order->total}}₺</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
