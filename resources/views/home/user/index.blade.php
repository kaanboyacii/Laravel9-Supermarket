@extends('layouts.frontbase')

@section('title', 'Kullanıcı Paneli')

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
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Last</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">E-posta Adresi</th>
                        <td>{{Auth::user()->email}}</td>
                    </tr>
                    <tr>
                        <th scope="row">İsim</th>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                </tbody>
            </table>
            <a class="btn btn-warning" href="/user/profile">Bilgilerimi Güncelle</a>
        </div>
    </div>
</div>

@endsection
