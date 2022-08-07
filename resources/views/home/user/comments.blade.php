@extends('layouts.frontbase')

@section('title', 'Yorumlar ve İncelemeler')
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
                <h4 class="text-center">Yorumlarım ve İncelemelerim</h4> <br>
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
</section>
@endsection
