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
                            <h4 class="header-title">Yorum Detay</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th style="width: 30px">Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Ürün</th>
                                            <td>{{$data->product->title}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">İsim</th>
                                            <td>{{$data->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Konu</th>
                                            <td>{{$data->subject}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Yorum</th>
                                            <td>{{$data->comment}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Derecelendirme</th>
                                            <td>{{$data->rate}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">IP numarası</th>
                                            <td>{{$data->IP}}</td>
                                        </tr>
                                        <tr>
                                            <th style="width: 30px">Durum</th>
                                            <td>{{$data->status}}</td>
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
                                            <th style="width: 30px">Durum Güncelleme:</th>
                                            <td>
                                                <form role="form" action="{{route('admin.comment.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <select name="status" id="">
                                                        <option selected>{{$data->status}}</option>
                                                        <option>Aktif</option>
                                                        <option>Pasif</option>
                                                    </select>
                                                    </textarea>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-primary">Durumu Güncelle</button>
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
