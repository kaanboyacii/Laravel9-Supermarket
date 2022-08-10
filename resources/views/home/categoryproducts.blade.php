@extends('layouts.frontbase')

@section('title', $category->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->icon))

@section('content')
<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Kategoriler</h4>
                        <ul>
                            @foreach($categorylist as $rs)
                            <li><a href="{{route('categoryproducts',['id'=>$rs->id])}}">{{$rs->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Fiyat Aralığı</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Yeni Ürünler</h4>
                            <div class="latest-product__slider owl-carousel">
                                @foreach($lastproducts as $rs)
                                <div class="latest-prdouct__slider__item">
                                    <a href="{{route('product',['id'=>$rs->id])}}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{ Storage::url("{$rs->image}") }}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$rs->title}}</h6>
                                            <span>{{ number_format($rs->price, 2) }}₺</span>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>İndirimli Ürünler</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($discountproducts as $rs)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="{{ Storage::url("{$rs->image}") }}">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="{{route('storefavorite',['id'=>$rs->id])}}"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="{{route('shopcart.add',['id'=>$rs->id])}}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>{{$rs->category->title}}</span>
                                        <h5><a href="{{route('product',['id'=>$rs->id])}}">{{$rs->title}}</a></h5>
                                        <div class="product__item__price">{{ number_format($rs->price, 2) }}₺<span>{{$rs->price*1.20}}₺</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
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
                                <h6><span>{{$productscount->count()}}</span>Ürün Bulundu</h6>
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
                    @foreach($products as $rs)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ Storage::url("{$rs->image}") }}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="{{route('storefavorite',['id'=>$rs->id])}}"><i class="fa fa-heart"></i></a></li>
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
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
