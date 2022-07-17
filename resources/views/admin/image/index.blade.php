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
                            <h4 class="card-title">{{$product->title}}</h4>
                            <form role="form" action="{{route('admin.image.store',['sid'=>$product->id])}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Başlık</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Başlık" name="title">
                                    <div class="form-group">
                                        <label>File upload</label>
                                        <div class="input-group col-xs-12">
                                            <label for="formFile" class="form-label"></label>
                                            <input class="form-control" type="file" name="image" id="image">
                                        </div>
                                        <div class="input-group-append">
                                            <input class="input-group-text" type="submit" value="Upload">
                                        </div>
                                    </div>
                            </form>
                            <div class="table-responsive pt-4">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                Id
                                            </th>
                                            <th>
                                                Başlık
                                            <th>
                                                Fotoğraf
                                            </th>
                                            <th>
                                                Kaldır
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($images as $rs)
                                        <tr>
                                            <td>{{$rs->id}}</td>
                                            <td>{{$rs->title}}</td>
                                            <td>
                                                @if ($rs->image)
                                                <img src="{{Storage::url($rs->image)}}" style="height:250px ;width:250px; border-radius:2px">
                                                @endif
                                            </td>
                                            <td><a class="btn btn-danger" style="color: white;" href="{{route('admin.image.delete',['sid'=>$product->id,'id'=>$rs->id])}}" , onclick="return confirm('Silmek için emin misiniz ?')">Delete</a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
