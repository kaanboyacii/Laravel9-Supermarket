@extends('layouts.adminbase')

@section('title', 'İz Market Ürünler')

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
                            <h4 class="header-title">Ürünler</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table text-center">
                                        <thead class="text-uppercase bg-warning">
                                            <tr class="text-white">
                                                <th scope="col">ID</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Başlık</th>
                                                <th scope="col">Fotoğraf</th>
                                                <th scope="col">Galeri</th>
                                                <th scope="col">Ücret</th>
                                                <th scope="col">Stok</th>
                                                <th scope="col">Durum</th>
                                                <th scope="col">düzenle</th>
                                                <th scope="col">detay göster</th>
                                                <th scope="col">kaldır</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $rs)
                                            <tr>
                                                <th scope="row">{{$rs->id}}</th>
                                                <td> {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs->category, $rs->category->title) }}</td>
                                                <td>{{$rs->title}}</td>
                                                <td>
                                                    @if ($rs->image)
                                                    <img src="{{Storage::url($rs->image)}}" style="height:50px ;width:50px; border-radius:2px">
                                                    @endif
                                                </td>
                                                <td style="text-align: center">
                                                    <a href="{{route('admin.image.index',['sid'=>$rs->id])}}" onclick="return !window.open(this.href,'','top=50 left=100 width=1100,height=700')">
                                                        <img src="{{asset('assets')}}/admin/images/gallery.png" style="height:50px ;width:50px; border-radius:2px">
                                                    </a>
                                                </td>
                                                <td>{{$rs->price}}₺</td>
                                                <td>{{$rs->quantity}}</td>
                                                <td>{{$rs->status}}</td>
                                                <td><a class="ti-write" href="{{route('admin.product.edit',['id'=>$rs->id])}}"></a></td>
                                                <td><a class="ti-info-alt" href="{{route('admin.product.show',['id'=>$rs->id])}}"></a></td>
                                                <td><a class="ti-trash" href="{{route('admin.product.delete',['id'=>$rs->id])}}" , onclick="return confirm('Silmek İçin Emin misiniz ?')"></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a class="btn btn-danger" href="{{ route('admin.product.create')}}">Yeni Ürün Ekle</a>
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
