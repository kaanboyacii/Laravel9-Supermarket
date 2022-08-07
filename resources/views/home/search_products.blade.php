@extends('layouts.frontbase')

@section('title', 'Arama sonuçları')
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-7">
                <div class="section-title product__discount__title">
                    <h2>Arama Sonuçları</h2>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sırala</span>
                                <select>
                                    <option value="0">En Düşük Fiyat</option>
                                    <option value="0">En Yüksek Fiyat</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{$datalist->count()}}</span>Ürün Bulundu</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($datalist as $rs)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ Storage::url("{$rs->image}") }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{route('storefavorite',['id'=>$rs->id])}}"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{route('shopcart.add',['id'=>$rs->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{route('product',['id'=>$rs->id])}}">{{$rs->title}}</a></h6>
                                <h5>{{ number_format($rs->price, 2) }}₺</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection