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
                            <h4 class="header-title">{{$data->name}}</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th>Id</th>
                                            <td>{{$data->id}}</td>
                                        </tr>
                                        <tr>
                                            <th>İsim</th>
                                            <td>{{$data->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>E-posta</th>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Roller</th>
                                            <td>
                                                @foreach($data->roles as $role)
                                                {{$role->name}}
                                                <a href="{{route('admin.user.destroyrole',['uid'=>$data->id,'rid'=>$role->id])}}" , onclick="return confirm('Silmek için emin misiniz ?')">[x]</a>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Oluşturulma Tarihi</th>
                                            <td>{{$data->created_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Son Güncelleme Tarihi</th>
                                            <td>{{$data->updated_at}}</td>
                                        </tr>
                                        <tr>
                                            <th>Add to role user</th>
                                            <td>
                                                <form role="form" action="{{route('admin.user.addrole',['id'=>$data->id])}}" method="POST" class="forms-sample">
                                                    @csrf
                                                    <select name="role_id">
                                                        @foreach($roles as $role)
                                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn-primary">Add Role</button>
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
