<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="/anasayfa" class="sidebar-brand">
               <span class="sidebar-nav-mini-hide"><strong>Mavi</strong> Kuryem</span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar" style="background:none!important">
                    <a href="">
                        <img src="img/support.png" alt="avatar">
                    </a>
                </div>
                <div class="sidebar-user-name">{{auth()->user()->username}}</div>
                <div class="sidebar-user-links">
                      <a href="/cikis" data-toggle="tooltip" data-placement="bottom" title="Cikis"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->


            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="/anasayfa" class="{{ Request::path() == 'anasayfa' ? 'active' : '' }}"><i class="gi gi-dashboard sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Anasayfa</span></a>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="gi gi-shopping_cart sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Siparisler</span></a>
                    <ul>
                        <li>
                            <a href="/canli">Canli Siparisler</a>
                        </li>


                        <li>
                            <a href="#" class="sidebar-nav-submenu "><i class="fa fa-angle-left sidebar-nav-indicator"></i>Siparisler</a>
                            <ul style="display:;">
                                <li>
                                    <a href="/siparis/tumu">Tum Siparisler</a>
                                </li>
                                <li>
                                    <a href="/siparis/basarili">Basarili Siparisler</a>
                                </li>
                                <li>
                                    <a href="/siparis/iptal">Iptal Edilen Siparisler</a>
                                </li>


                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- END Sidebar Navigation -->

            <!-- Sidebar Notifications -->
            <div class="sidebar-header sidebar-nav-mini-hide">
                                <span class="sidebar-header-options clearfix">
                                    <a href="javascript:void(0)" id='leftBarRefresh' data-toggle="tooltip" title="Yenile"><i class="gi gi-refresh"></i></a>
                                </span>
                <span class="sidebar-header-title">Bilgilendirici</span>
            </div>
            <div class="sidebar-section sidebar-nav-mini-hide">

                <div class="alert alert-success alert-alt">
                    <i class="fa fa-info-circle"></i> Basarili Siparis Sayisi
                    <br>
                    <b id="deliveredOrders"><i class="fa fa-spinner fa-spin"></i></b>
                </div>



                <div class="alert alert-info alert-alt">
                    <i class="fa fa-info-circle"></i> Gorusulen Siparis Sayisi
                    <br>
                    <b id="calledOrders"><i class="fa fa-spinner fa-spin"></i></b>
                </div>

                <div class="alert alert-warning alert-alt">
                    <i class="fa fa-info-circle"></i> Bekleyen Siparis Sayisi
                    <br>
                    <b id="hibarnateOrders"><i class="fa fa-spinner fa-spin"></i></b>
                </div>

                <div class="alert alert-danger alert-alt">
                    <i class="fa fa-info-circle"></i> Onaylanmamis Siparis Sayisi
                    <br>
                    <b id="unrecognizedOrders"><i class="fa fa-spinner fa-spin"></i></b>
                </div>

                <div class="alert alert-danger alert-alt">
                    <i class="fa fa-info-circle"></i> Iptal Edilen Siparis Sayisi
                    <br>
                    <b id="canceledOrders"><i class="fa fa-spinner fa-spin"></i></b>
                </div>

                <div class="alert alert-info alert-alt">
                    <i class="fa fa-info-circle"></i> Son Gelen Siparis Zamani
                    <br>
                    <b id="lastOrderTime"><i class="fa fa-spinner fa-spin"></i></b>
                </div>

            </div>
            <!-- END Sidebar Notifications -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
