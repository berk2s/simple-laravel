@extends('pages.structure.structure')
@section('title', 'Mavi Kuryem - Anasayfa')

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Dashboard Header -->
        <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
    @include('moduls.headercontents')
    <!-- Mini Top Stats Row -->
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/canli" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                        <i class="gi gi-sort-by-order"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Canli Siparisler</strong><br>
                        <small>Kurye Bekleyen Siparisler</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/siparisler" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                        <i class="hi hi-th-list"></i>

                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Gecmis Siparisler</strong><br>
                        <small>Basarili Siparis Dokumu</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/kullanicilar" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                        <i class="gi gi-user"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Kullanici Islemleri</strong>
                        <small>Mavi Kuryem'e Kayitli Kullanicilar</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-6 col-lg-3">
            <!-- Widget -->
            <a href="/operatorler" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                        <i class="gi gi-wifi_alt"></i>
                    </div>
                    <h3 class="widget-content text-right animation-pullDown">
                        <strong>Operatörler</strong>
                        <small>Yonetim Paneli Kullanicilari</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>
        <div class="col-sm-12">
            <!-- Widget -->
            <a href="/mali" class="widget widget-hover-effect1">
                <div class="widget-simple">
                    <div class="widget-icon pull-left themed-background animation-fadeIn">
                        <i class="gi gi-wallet"></i>
                    </div>
                    <div class="pull-right">
                        <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                        <span id="mini-chart-sales"></span>
                    </div>
                    <h3 class="widget-content animation-pullDown visible-lg">
                        Mali <strong>Tablo</strong>
                        <small>Gelir/Gider</small>
                    </h3>
                </div>
            </a>
            <!-- END Widget -->
        </div>

    </div>
    <!-- END Mini Top Stats Row -->
    </div>

@endsection


@section('especial_footer')
    <!-- Load and execute javascript code used only in this page -->
    <script src="/js/pages/index.js"></script>
    <script>$(function(){ Index.init(); });</script>
@endsection
