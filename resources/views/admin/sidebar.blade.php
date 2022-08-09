 <!-- sidebar menu area start -->
 <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{route('admin.index')}}"><img src="{{asset('assets')}}/admin/images/icon/izlogo-remove.png" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active"><a href="{{route('admin.index')}}"><i class="ti-home"></i> <span>Anasayfa</span></a></li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Siparişler</span></a>
                                <ul class="collapse">
                                    <li><a href="/admin/siparişler/yeni">Yeni Siparişler</a></li>
                                    <li><a href="/admin/siparişler/onaylanmış">Onaylanmış Siparişler</a></li>
                                    <li><a href="/admin/siparişler/tamamlanmış">Tamamlanmış Siparişler</a></li>
                                    <li><a href="/admin/siparişler/reddedildi">İptal Edilmiş Siparişler</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('admin.category.index')}}"><i class="ti-layout-grid2"></i> <span>Kategoriler</span></a></li>
                            <li><a href="{{route('admin.product.index')}}"><i class="ti-package"></i> <span>Ürünler</span></a></li>
                            <li><a href="{{route('admin.message.index')}}"><i class="ti-email"></i> <span>Mesajlar</span></a></li>
                            <li><a href="{{route('admin.comment.index')}}"><i class="ti-comment"></i> <span>Yorumlar</span></a></li>
                            <li><a href="{{route('admin.faq.index')}}"><i class="ti-help"></i> <span>Sıkça Sorulan Sorular</span></a></li>
                            <li><a href="{{route('admin.setting')}}"><i class="ti-settings"></i> <span>Ayarlar</span></a></li>
                            <li><a href="{{route('admin.user.index')}}"><i class="ti-user"></i> <span>Kullanıcılar</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
