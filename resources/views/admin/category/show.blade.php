@extends('layouts.adminbase')

@section('title', 'İz Market Admin Panel')

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
                            <h4 class="header-title">Hoverable Rows</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Üst Kategori</th>
                                            <td>{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($data, $data->title) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Başlık</th>
                                            <td>{{$data->title}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Anahtar Kelimeler</th>
                                            <td>{{$data->keywords}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Açıklama</th>
                                            <td>{{$data->description}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Fotoğraf</th>
                                            <td>
                                                @if ($data->image)
                                                <img src="{{Storage::url($data->image)}}" style="height:150px ;width:150px; border-radius:2px">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Durum</th>
                                            <td>{{$data->status}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Oluşturulma Tarihi</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Son Güncelleme Tarihi</th>
                                            <td>{{$data->updated_at}}</td>
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
