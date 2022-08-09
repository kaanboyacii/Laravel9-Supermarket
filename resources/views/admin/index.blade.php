@extends('layouts.adminbase')

@section('title', 'İz Market Admin Panel')

@section('content')
<div class="main-content-inner">
    <!-- sales report area start -->
    <div class="sales-report-area mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-try"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Toplam Ciro</h4>
                            <p>Tüm Zamanlar</p>
                        </div>
                        @php
                        ($totalciro =0)
                        @endphp
                        @foreach($orders as $rs)
                        @php
                        ($totalciro += $rs->total)
                        @endphp
                        @endforeach
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$totalciro}} ₺</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                    <canvas id="coin_sales1" height="100"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="single-report mb-xs-30">
                    <div class="s-report-inner pr--20 pt--30 mb-3">
                        <div class="icon"><i class="fa fa-try"></i></div>
                        <div class="s-report-title d-flex justify-content-between">
                            <h4 class="header-title mb-0">Satılan Toplam Ürün</h4>
                            <p>Tüm Zamanlar</p>
                        </div>
                        <div class="d-flex justify-content-between pb-2">
                            <h2>{{$productscount}} adet</h2>
                            <span>- 45.87</span>
                        </div>
                    </div>
                    <canvas id="coin_sales2" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- sales report area end -->
    <!-- row area start -->
    <div class="row">
    </div>
    <!-- row area end -->
    <div class="row mt-5">
    </div>
    <!-- row area start-->
</div>
</div>
<!-- main content area end -->
@endsection
