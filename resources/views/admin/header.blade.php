        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                            <li class="dropdown">
                                <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                    <span>{{$newcomments->count()}}</span>
                                </i>
                                <div class="dropdown-menu bell-notify-box notify-box">
                                    <span class="notify-title">Yeni {{$newcomments->count()}} Bildiriminiz Var ! <a href="{{route('admin.comment.index')}}">Hepsini incele</a></span>
                                    <div class="nofity-list">
                                        @foreach($newcomments as $rs)
                                        <a href="{{route('admin.comment.show',['id'=>$rs->id])}}" class="notify-item">
                                            <div class="notify-thumb"><i class="ti-comment-alt btn-danger"></i></div>
                                            <div class="notify-text">
                                                <p>{{$rs->user->name}}</p>
                                                <span>{{$rs->product->title}}</span> <br>
                                                <span>{{$rs->subject}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown">
                                <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>{{$newmessages->count()}}</span></i>
                                <div class="dropdown-menu notify-box nt-enveloper-box">
                                    <span class="notify-title">Yeni {{$newmessages->count()}} Mesajınız Var !<a href="{{route('admin.message.index')}}">Hepsini incele</a></span>
                                    <div class="nofity-list">
                                        @foreach($newmessages as $rs)
                                        <a href="{{route('admin.message.show',['id'=>$rs->id])}}" class="notify-item">
                                            <div class="notify-thumb">
                                                <img src="{{asset('assets')}}/admin/images/author/author-img3.jpg" alt="image">
                                            </div>
                                            <div class="notify-text">
                                                <p>{{$rs->name}}</p>
                                                <span class="msg">{{$rs->subject}}</span>
                                                <span>{{$rs->created_at}}</span>
                                            </div>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Panel</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{route('admin.index')}}">Anasayfa</a></li>
                                <li><span>Panel</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            @auth
                            <img class="avatar user-thumb" src="{{asset('assets')}}/admin/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{route('admin.message.index')}}">Mesajlar</a>
                                <a class="dropdown-item" href="{{route('admin.setting')}}">Ayarlar</a>
                                <a class="dropdown-item" href="{{route('admin_logout')}}">Çıkış Yap</a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->