@extends('layouts.adminbase')

@section('title', 'Ürün Oluştur')

@section('content')
<div class="main-content-inner">
    <!-- row area start -->
    <div class="row">
        <div class="col-lg-12 col-ml-12">
            <div class="row">
                <!-- table form start -->
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Ürün Oluştur</h4>
                            <form role="form" action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="">Üst Ürün</label>
                                    <select name="category_id" class="form-control select2">
                                        @foreach($data as $rs)
                                        <option value="{{$rs->id}}"> {{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Başlık</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Başlık" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Anahtar Kelimeler</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Anahtar Kelimeler" name="keywords">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Açıklama</label>
                                    <input type="Description" class="form-control" id="exampleInputName1" placeholder="Açıklama" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Detay</label>
                                    <textarea class="form-control" id="detail" name="detail" placeholder="Detail">
                                    </textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#detail'))
                                            .then(editor => {
                                                console.log(editor);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="price" aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Stok</label>
                                    <input type="number" class="form-control" id="exampleInputName1" placeholder="Stok" name="quantity">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Vergi</label>
                                    <input type="number" class="form-control" id="exampleInputName1" placeholder="Vergi" name="tax">
                                </div>
                                <div class="form-group">
                                    <label>Fotoğraf Yükleme</label>
                                    <div class="input-group col-xs-12">
                                        <label for="formFile" class="form-label"></label>
                                        <input class="form-control" type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Durum</label>
                                    <select name="status" class="form-control">
                                        <option value="aktif">Aktif</option>
                                        <option value="pasif">Pasif</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning me-2">Oluştur</button>
                            </form>
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
