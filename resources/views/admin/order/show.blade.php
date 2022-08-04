@extends('layouts.adminbase')
@section('title', 'Sipariş Detay')

@section('content')
<div class="main-content-inner">
    <!-- row area start -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- table form start -->
                <div class="col-lg-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Sipariş Detay</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">İsim & Soyisim</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Telefon</th>
                                            <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Adres</th>
                                            <td>{{$data->address}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Tutar</th>
                                            <td>{{ number_format($data->total, 2) }}₺</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Oluşturulma Tarihi</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Son Güncelleme Tarihi</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Durum:</th>
                                            <td>
                                                <form role="form" action="{{route('admin.order.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <textarea name="note" cols="40" rows="2">{{$data->note}}
                                                    </textarea>
                                                    <br>
                                                    <select name="status">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>Yeni</option>
                                                        <option>Onaylanmış</option>
                                                        <option>Tamamlanmış</option>
                                                        <option>Reddedildi</option>
                                                    </select>
                                                    </textarea>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-warning">Durumu Güncelle</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
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
                                                <th scope="col">Durum</th>
                                                <th scope="col">Ürünü Onayla</th>
                                                <th scope="col">Ürünü İptal et</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($datalist as $rs)
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
                                                <td>{{$rs->status}}</td>
                                                <td><a class="ti-check" href="{{route('admin.order.acceptproduct',['id'=>$rs->id])}}" , onclick="return confirm('Ürünü Onaylamak İçin Emin misiniz ?')"></a></td>
                                                <td><a class="ti-trash" href="{{route('admin.order.deleteproduct',['id'=>$rs->id])}}" , onclick="return confirm('İptal Etmek İçin Emin misiniz ?')"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @php
                                    ($data->total =0)
                                    @endphp
                                    @foreach($datalist as $rs)
                                    @php
                                    ($data->total += $rs->quantity * $rs->price)
                                    @endphp
                                    @endforeach
                                    <div class="col-lg-6 col-ml-6">
                                        <div class="shoping__checkout">
                                            <h5>Sepet Tutarı</h5>
                                            <ul>
                                                <li>Toplam Tutar <span>{{ number_format($data->total, 2) }}₺</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- table form end -->
            </div>
        </div>
    </div>
    <!-- row area end -->
    <div class="row mt-5">
    </div>
    <!-- row area start-->
</div>
</div>
<!-- main content area end -->
@endsection
