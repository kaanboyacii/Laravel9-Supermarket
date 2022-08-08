@extends('layouts.adminbase')

@section('title', 'Ürün Detay')

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
                            <h4 class="header-title">Mesaj Detay</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">İsim</th>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">E-posta</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Telefon</th>
                                            <td>{{$data->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Konu</th>
                                            <td>{{$data->subject}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Mesaj</th>
                                            <td>{{$data->message}}</td>
                                        </tr>
                                        <tr>
                                        <th style="width: 30px">Durum Güncelle:</th>
                                            <td>
                                                <form role="form" action="{{route('admin.message.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <select name="status" id="">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>Yeni</option>
                                                        <option>Okundu</option>
                                                    </select>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-primary">Durumu Güncelle</button>
                                                    </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Oluşturulma Tarihi</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Son Güncelleme Tarihi</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Yönetici Notu:</th>
                                            <td>
                                                <form role="form" action="{{route('admin.message.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <textarea cols="80" class="textarea" name="note" id="note">
                                                    {{$data->note}}
                                                    </textarea>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-primary">Notu Yükle</button>
                                                    </div>
                                            </td>
                                        </tr>
                                    </table>
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
