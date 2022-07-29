@extends('layouts.frontbase')

@section('title', 'Kullanıcı Paneli İncelemeler')

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
<div class="col-lg-12 text-center">
    <div class="container">
        <div class="row">
            <h4 class="text-center">Yorumlarım ve İncelemelerim</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Ürün
                        </th>
                        <th>
                            Konu
                        </th>
                        <th>
                            Yorum
                        </th>
                        <th>
                            Derecelendirme
                            <br>(5 üzerinden)
                        </th>
                        <th>
                            Durum
                        </th>
                        <th>
                            Kaldır
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $rs)
                    <tr>
                        <td>{{$rs->id}}</td>
                        <td><a href="{{route('product',['id'=>$rs->product_id])}}">{{$rs->product->title}}</a></td>
                        <td>{{$rs->subject}}</td>
                        <td>{{$rs->comment}}</td>
                        <td>{{$rs->rate}}</td>
                        <td>{{$rs->status}}</td>
                        <td>
                            <a href="{{route('userpanel.reviewdestroy',['id'=>$rs->id])}}" class="btn btn-block btn-danger btn-sm" onclick="return confirm('Siliniyor, Emin misiniz ?')">Kaldır</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
