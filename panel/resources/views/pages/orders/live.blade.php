@extends('pages.structure.structure')
@section('title', 'Mavi Kuryem - Canli Siparisler')

@section('content')
    <div id="page-content">
        <!-- Table Responsive Header -->
        <div class="content-header" id="contentHeader" style="transition:0.4s;">
            <div class="header-section">
                <h1>
                    <i class="fa fa-hourglass-start"></i><span id="title">Canli Siparisler</span><br><small id="info" style="transition: 0.4s">Yeni gelen veya onaylanmamis siparisler</small>
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
                <button type="button" id='refreshLive' style='float:right;margin:10px' class="btn btn-xs btn-info float-right"><i class="fa fa-refresh"></i> Yenile</button>

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
                    <tbody id="tbody">

                    </tbody>

                </table>
                <div style="width:50px;margin:0 auto;padding-bottom:50px" id="loadingElement"><i class="fa fa-asterisk fa-spin fa-3x text-success" style=""></i></div>
            </div>
            <!-- END Responsive Full Content -->
        </div>
        <!-- END Responsive Full Block -->
    </div>
    <audio id="alarm" src="/ses.mp3" muted="muted"></audio>


    <script src="/js/socket.js"></script>
    <script src="/js/auth.js"></script>
    <script>
        const socket = io.connect('http://localhost:3000');
        let token = null;

        getUser = async(user_id, token) => {
            try{
                const user = await fetch(`${url}/api/user/${user_id}`,{
                    method:'GET',
                    headers:{
                        'x-access-token': token,
                        'x-api-key': api_key
                    }
                })
                return user;
            }catch(e){
                return e;
            }
        }

        getLiveOrders = async(token) => {
            try{
                const response = await fetch(`${url}/api/orders/notcheckeds`,{
                    method: 'GET',
                    headers:{
                        'x-access-token': token,
                        'x-api-key': api_key
                    },
                })
                return response;
            }catch (e) {
                return e;
            }
        }

        authenticate =  async() => {
            try {
                const response = await fetch(`${url}/authenticate`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'x-api-key': 'fbc9b13d-ee38-4098-aa53-d7ff19a7650c',
                    },
                    body: JSON.stringify({
                        username: 'admin',
                        password: 'admin'
                    }),
                });
                return response
            } catch (e) {
                return e;
            }
        }


        authenticate()
            .then((response) => {
                return response.json()
            })
            .then((data) => {
                token = data.status.token;
                console.log(token);
                return token;
            })
            .then((token) => {
                getLiveOrders(token)
                    .then((response) => {
                        return response.json();
                    })
                    .then((orders) => {

                        orders.forEach((order) => {
                            const { _id, order_note, order_date, customer_id, order_status } = order;
                            insertLiveOrder(_id, order_note, order_date, customer_id, order_status, token);
                        })

                        document.getElementById('loadingElement').style.display = 'none'
                        return true;
                    })
                    .catch(e => {
                        console.log(e)
                    })
            })
            .catch(e => {
                console.log(e);
            })

        document.getElementById('refreshLive').addEventListener('click', () => {


            const table = document.getElementById("liveOrders");

            for(var i = table.rows.length - 1; i > 0; i--)
            {
                table.deleteRow(i);
            }
            document.getElementById('loadingElement').style.display = 'block'


            getLiveOrders(token)
                .then((response) => {
                    return response.json();
                })
                .then((orders) => {

                    orders.forEach((order) => {
                        const { _id, order_note, order_date, customer_id, order_status } = order;
                        insertLiveOrder(_id, order_note, order_date, customer_id, order_status, token, false);
                    })

                    document.getElementById('loadingElement').style.display = 'none'
                    return true;
                })
                .catch(e => {
                    console.log(e)
                })
        });

        insertLiveOrder = (_id, order_note, order_date, customer_id, order_status, token, isNewOrder) => {

            const liveOrders = document.getElementById('liveOrders');
            const row = liveOrders.insertRow(1);
            const order_id_ = row.insertCell(0);
            const customer_id_ = row.insertCell(1); //
            const customer_phone_ = row.insertCell(2); //
            const customer_adress_ = row.insertCell(3); //
            const order_note_ = row.insertCell(4);
            const order_time_ = row.insertCell(5);
            const order_status_ = row.insertCell(6);
            const transaction = row.insertCell(7);

            if(isNewOrder)
                row.style.backgroundColor = '#F0F4C3';

            /* order id */

            order_id_.className = 'text-center';
            order_id_.innerHTML = _id;

            /* uye ile ilgili yerler */


            customer_id_.innerHTML = `<i class="fa fa-spinner fa-spin"></i>`;
            customer_adress_.innerHTML = `<i class="fa fa-spinner fa-spin"></i>`;
            customer_phone_.innerHTML = '<i class="fa fa-spinner fa-spin"></i>';


            getUser(customer_id, token)
                .then((response) => {
                    return response.json();
                })
                .then((user) => {
                    customer_id_.innerHTML = `<a href="">${user.name} <small>(${user.username})</small></a>`;
                    customer_adress_.innerHTML = `<a href="javascript:void(0)" class="label label-success">${user.address}</a>`;
                    customer_phone_.innerHTML = user.phone;
                })
                .catch((err) => console.log(err));


            /* siparis notu */

            order_note_.innerHTML = order_note;

            /* siparis tarihi */

            const timeOfDate_ = order_date.split('T');
            const timeOfDate = timeOfDate_[1].split('.');
            const getDate_ = timeOfDate_[0].split('-');
            const getDay = getDate_[2];
            const getMonth = getDate_[1];

            order_time_.innerHTML = `${getDay}/${getMonth} ${timeOfDate[0]}`;

            /* siparis durumu */

            if(order_status == 0)
                order_status_.innerHTML = '<a href="javascript:void(0)" class="label label-danger">Onaylanmamis</a>';
            else
                order_status_.innerHTML = '<a href="javascript:void(0)" class="label label-success">Onaylanmis</a>';

            /* islem */

            transaction.className = 'text-center';
            transaction.innerHTML = `<div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Onayla" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Iptal Et" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </div>`;

        }

        socket.on('newOrder', (data) => {

            const { order } = data;

            const { order: {_id, order_note, order_date, customer_id, order_status} } = data;

            insertLiveOrder(_id, order_note, order_date, customer_id, order_status, token, true);
            newOrderSound();
            console.log(order);


        })

        titleAdmonition = (start) => {
            if(start) {
                iv1 = setInterval(() => {
                    document.getElementById('contentHeader').style.backgroundColor = '#33af33';
                    document.getElementById('contentHeader').style.color = '#fff';
                    document.getElementById('title').innerHTML = 'Siparis var!';
                    document.getElementById('info').style.color = '#fff';
                    document.title = 'Siparis var!'

                }, 2000);

                iv2 = setInterval(() => {
                    document.getElementById('contentHeader').style.backgroundColor = '#fff';
                    document.getElementById('contentHeader').style.color = '#000';
                    document.getElementById('info').style.color = '#000';
                    document.getElementById('title').innerHTML = 'Canli Siparisler!';

                    document.title = 'Mavi Kurye!';

                }, 4000);
            }else{
                clearInterval(iv1);
                clearInterval(iv2);
                document.getElementById('contentHeader').style.backgroundColor = '#fff';
                document.getElementById('contentHeader').style.color = '#000';
                document.getElementById('info').style.color = '#000';
                document.getElementById('title').innerHTML = 'Canli Siparisler!';
            }

        }

        newOrderSound = () => {
            document.getElementById('alarm').play();
            document.getElementById('alarm').muted = false;
            titleAdmonition(true);
        }

    </script>
@endsection

