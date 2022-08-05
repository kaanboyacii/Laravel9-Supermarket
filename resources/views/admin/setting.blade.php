@extends('layouts.adminbase')

@section('title', 'Yönetici Paneli Ayarlar')

@section('content')
<div class="main-content-inner">
    <div class="col-lg-12 mt-5">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="genel-tab" data-toggle="tab" href="#genel" role="tab" aria-controls="genel" aria-selected="false">Genel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active show" id="smtp-tab" data-toggle="tab" href="#smtp" role="tab" aria-controls="smtp" aria-selected="true">Smtp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sosyal-tab" data-toggle="tab" href="#sosyal" role="tab" aria-controls="sosyal" aria-selected="false">Sosyal Medya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="hakkımızda-tab" data-toggle="tab" href="#hakkımızda" role="tab" aria-controls="hakkımızda" aria-selected="false">Hakkımızda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="iletişim-tab" data-toggle="tab" href="#iletişim" role="tab" aria-controls="iletişim" aria-selected="false">Bize Ulaşın</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="referans-tab" data-toggle="tab" href="#referans" role="tab" aria-controls="referans" aria-selected="false">Referanslarımız</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="kişisel-tab" data-toggle="tab" href="#kişisel" role="tab" aria-controls="kişisel" aria-selected="false">Kişisel Verilerin Korunması Hakkında</a>
                    </li>
                </ul>
                <form role="form" action="{{route('admin.settingupdate')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content mt-3" id="myTabContent">
                        <div class="tab-pane fade" id="genel" role="tabpanel" aria-labelledby="genel-tab">
                            <input type="hidden" id="id" name="id" value="{{$data->id}}" class="form-control">
                            <div class="form-group">
                                <label for="exampleInputName1">Başlık</label>
                                <input type="text" class="form-control" id="exampleInputName1" id="title" name="title" value="{{$data->title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Anahtar Kelimeler</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="keywords" value="{{$data->keywords}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Açıklama</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="description" value="{{$data->description}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Şirket</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="company" value="{{$data->company}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Adres</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="adress" value="{{$data->adress}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Telefon</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="phone" value="{{$data->phone}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">E-posta Adresi</label>
                                <input type="Description" class="form-control" id="exampleInputName1" name="email" value="{{$data->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">İcon</label>
                                <div class="custom-file">
                                    <input type="file" name="icon" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02">Dosya Seç</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Çalışma Saati</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="opentime" value="{{$data->opentime}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Durum</label>
                                <select name="status" class="form-control">
                                    <option selected>{{$data->status}}</option>
                                    <option value="true">Aktif</option>
                                    <option value="false">Pasif</option>
                                </select>
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="smtp" role="tabpanel" aria-labelledby="smtp-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Smtp Server</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="smtpserver" value="{{$data->smtpserver}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Smtp Email</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="smtpemail" value="{{$data->smtpemail}}">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="">Smtp Password</label>
                                <input type="password" class="form-control" id="inputPassword" name="smtppassword" value="{{$data->smtppassword}}" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Smtp Port</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="smtpport" value="{{$data->smtpport}}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sosyal" role="tabpanel" aria-labelledby="sosyal-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Facebook</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="facebook" value="{{$data->facebook}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">İnstagram</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="instagram" value="{{$data->instagram}}">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="">Twitter</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="twitter" value="{{$data->twitter}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Youtube</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="youtube" value="{{$data->youtube}}">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="hakkımızda" role="tabpanel" aria-labelledby="hakkımızda-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Hakkımızda</label>
                                <textarea class="form-control" id="aboutus" name="aboutus" value="{{$data->aboutus}} placeholder=" aboutus">
                                {{$data->aboutus}}
                                </textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#aboutus'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="iletişim" role="tabpanel" aria-labelledby="iletişim-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Bize Ulaşın</label>
                                <textarea class="form-control" id="contact" name="contact" value="{{$data->contact}} placeholder=" contact">
                                {{$data->contact}}
                                </textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#contact'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="referans" role="tabpanel" aria-labelledby="referans-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Referanslarımız</label>
                                <textarea class="form-control" id="references" name="references" value="{{$data->references}} placeholder=" references">
                                {{$data->references}}
                                </textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#references'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kişisel" role="tabpanel" aria-labelledby="kişisel-tab">
                            <div class="form-group">
                                <label for="exampleInputName1">Kişisel Verilerin Korunması Hakkında</label>
                                <textarea class="form-control" id="personaldata" name="personaldata" value="{{$data->personaldata}} placeholder=" personaldata">
                                {{$data->personaldata}}
                                </textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#personaldata'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Ayarları Güncelle</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- main content area end -->
@endsection
