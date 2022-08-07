@extends('layouts.frontbase')

@section('title', 'Geçmiş Siparişlerim')
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
            <h4 class="text-center">Geçmiş Siparişlerim</h4> <br>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                Id
                            </th>
                            <th>
                                İsim & Soyisim
                            </th>
                            <th>
                                Telefon
                            </th>
                            <th>
                                E-posta
                            </th>
                            <th>
                                Adres
                            </th>
                            <th>
                                Durum
                            </th>
                            <th>
                                Detay Göster
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $rs)
                        <tr>
                            <td>{{$rs->id}}</td>
                            <td>{{$rs->name}}</td>
                            <td>{{$rs->phone}}</td>
                            <td>{{$rs->email}}</td>
                            <td>{{$rs->address}}</td>
                            <td>{{$rs->status}}</td>
                            <td>
                                <a href="{{route('userpanel.orderdetail',['id'=>$rs->id])}}" class="btn btn-block btn-warning btn-sm">Detay Göster</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection
