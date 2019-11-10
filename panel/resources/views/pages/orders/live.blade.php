@extends('pages.structure.structure')
@section('title', 'Mavi Kuryem - Canli Siparisler')

@section('content')
    <div id="page-content">
        <!-- Table Responsive Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="fa fa-hourglass-start"></i>Canli Siparisler<br><small>Yeni gelen veya onaylanmamis siparisler</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li>Siparisler</li>
            <li><a href="">Canli Siparisler</a></li>
        </ul>
        <!-- END Table Responsive Header -->

        <!-- Responsive Full Block -->
        <div class="block">
            <!-- Responsive Full Title -->
            <div class="block-title">
                <h2><strong>Gelen Siparisler</strong></h2>
            </div>
            <!-- END Responsive Full Title -->

            <!-- Responsive Full Content -->
            <div class="table-responsive">
                <table class="table table-vcenter table-striped" id="liveOrders">
                    <thead>
                    <tr>
                        <th style="width: 150px;" class="text-center">#</th>
                        <th>Musteri</th>
                        <th>Telefon Numarasi</th>
                        <th>Kayitli Adres</th>
                        <th>Not</th>
                        <th>Zaman</th>
                        <th>Durum</th>
                        <th style="width: 150px;" class="text-center">Islem</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">2440</td>
                        <td><a href="page_ready_user_profile.html">client1</a></td>
                        <td>client1@example.com</td>
                        <td><a href="javascript:void(0)" class="label label-success">1625.ada d blok daire 5</a></td>
                        <td>
                            bir adet kisa parliament ve sekersiz kola lutfen
                        </td>
                        <td>14:23:22</td>
                        <td><a href="javascript:void(0)" class="label label-danger">Onaylanmamis</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Onayla" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Iptal Et" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Responsive Full Content -->
        </div>
        <!-- END Responsive Full Block -->
    </div>

    <script src="/js/socket.js"></script>
    <script>
        const socket = io.connect('http://localhost:3000');

        socket.on('newOrder', (data) => {

            const { order: {order_id, order_note, order_time, customer_id, customer_phone, customer_address, order_status} } = data;

            const liveOrders = document.getElementById('liveOrders');
            const row = liveOrders.insertRow(1);
            const order_id_ = row.insertCell(0);
            const customer_id_ = row.insertCell(1);
            const customer_phone_ = row.insertCell(2);
            const customer_adress_ = row.insertCell(3);
            const order_note_ = row.insertCell(4);
            const order_time_ = row.insertCell(5);
            const order_status_ = row.insertCell(6);
            const transaction = row.insertCell(7);


            order_id_.className = 'text-center'
            order_id_.innerHTML = order_id;

            if(customer_id == 23)
                customer_id_.innerHTML = `<a href="">Berk Topcu</a>`;
            else
                customer_id_.innerHTML = `<a href="">Yaman Topcu</a>`;

            customer_phone_.innerHTML = customer_phone;
            customer_adress_.innerHTML = `<a href="javascript:void(0)" class="label label-success">${customer_address}</a>`;
            order_note_.innerHTML = order_note;
            order_time_.innerHTML = order_time;

            if(order_status == 0)
                order_status_.innerHTML = '<a href="javascript:void(0)" class="label label-danger">Onaylanmamis</a>';
            else
                order_status_.innerHTML = '<a href="javascript:void(0)" class="label label-success">Onaylanmis</a>';

            transaction.className = 'text-center';
            transaction.innerHTML = `<div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Onayla" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Iptal Et" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>`;

            const audio = new Audio('/ses.mp3');
            audio.play();

            titleAdmonition();

        })

        titleAdmonition = () => {
            setInterval(() => {
                setTimeout(() => {
                    document.title = 'Siparis var!'
                },1000)
               setTimeout(() => {
                   document.title = 'Mavi Kurye!';
               }, 2000)
            });
        }
    </script>
@endsection

