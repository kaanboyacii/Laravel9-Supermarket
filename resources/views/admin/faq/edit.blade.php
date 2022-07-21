@extends('layouts.adminbase')

@section('title', 'Ürün düzenleme')

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
                            <h4 class="header-title">Ürün Düzenle</h4>
                            <form role="form" enctype="multipart/form-data" action="{{route('admin.faq.update',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Soru</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Soru" name="question" value="{{$data->question}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Cevap</label>
                                    <textarea class="form-control" id="detail" name="answer" placeholder="Cevap">
                                    {{$data->answer}}
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
                                <div class="form-group">
                                    <label for="exampleSelectGender">Durum</label>
                                    <select name="status" class="form-control">
                                        <option selected value="true">{{$data->status}}</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="pasif">Pasif</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Update Data</button>
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
