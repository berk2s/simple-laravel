<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>@yield('title', 'Mavi Kuryem - Yonetim Paneli')</title>

    <meta name="author" content="berk topcu">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <link rel="shortcut icon" href="/img/favicon.png">

   <link rel="stylesheet" href="/css/bootstrap.min.css">

    <link rel="stylesheet" href="/css/plugins.css">

    <link rel="stylesheet" href="/css/main.css">

     <link rel="stylesheet" href="/css/themes.css">

    <script src="/js/vendor/modernizr.min.js"></script>


    @yield('especial_header')
</head>
<body>
<div id="page-wrapper">


    <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">

        <!-- Main Sidebar -->
            @include('moduls.leftbar')
        <!-- END Main Sidebar -->

        <!-- Main Container -->
        <div id="main-container">

            @include('moduls.header')


                <!-- END Dashboard Header -->

                @yield('content')

            <!-- END Page Content -->

            <!-- Footer -->
            @include('moduls.footer')
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="/js/vendor/jquery.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/app.js"></script>

<script src="/js/socket.js"></script>
<script src="/js/auth.js"></script>

<script>
    const socket = io.connect('http://localhost:3000');

    socket.on('connect', () => {
        console.log('baglandi!');
        socket.on('newOrder', (data) => {
            const { order: {order_date} } = data;

            document.getElementById('lastOrderTime').innerHTML = orderDateReform(order_date);
        });

        socket.on('changedTotalCanceledOrders', (data) => {
            const {count_1, count_2, count_3, count_4, count_5} = data;

            document.getElementById('canceledOrders').innerHTML = count_1;
            document.getElementById('unrecognizedOrders').innerHTML = count_2;
            document.getElementById('hibarnateOrders').innerHTML = count_3;
            document.getElementById('calledOrders').innerHTML = count_4;
            document.getElementById('deliveredOrders').innerHTML = count_5;
            console.log(data);
        })

        socket.on('changedTotalDeliveredOrders', (data) => {
            const {count_1, count_2, count_3, count_4, count_5} = data;

            document.getElementById('canceledOrders').innerHTML = count_1;
            document.getElementById('unrecognizedOrders').innerHTML = count_2;
            document.getElementById('hibarnateOrders').innerHTML = count_3;
            document.getElementById('calledOrders').innerHTML = count_4;
            document.getElementById('deliveredOrders').innerHTML = count_5;
            console.log(data);
        })

        socket.on('changedTotalCalledOrders', (data) => {
            const {count_1, count_2, count_3, count_4, count_5} = data;

            document.getElementById('canceledOrders').innerHTML = count_1;
            document.getElementById('unrecognizedOrders').innerHTML = count_2;
            document.getElementById('hibarnateOrders').innerHTML = count_3;
            document.getElementById('calledOrders').innerHTML = count_4;
            document.getElementById('deliveredOrders').innerHTML = count_5;
            console.log(data);
        })

        socket.on('changedTotalHibernateOrders', (data) => {
            const {count_1, count_2, count_3, count_4, count_5} = data;

            document.getElementById('canceledOrders').innerHTML = count_1;
            document.getElementById('unrecognizedOrders').innerHTML = count_2;
            document.getElementById('hibarnateOrders').innerHTML = count_3;
            document.getElementById('calledOrders').innerHTML = count_4;
            document.getElementById('deliveredOrders').innerHTML = count_5;

            console.log(data);
        })

        socket.on('changedTotalUnrecognizedOrders', (data) => {
            const {count_1, count_2, count_3, count_4, count_5} = data;

            document.getElementById('canceledOrders').innerHTML = count_1;
            document.getElementById('unrecognizedOrders').innerHTML = count_2;
            document.getElementById('hibarnateOrders').innerHTML = count_3;
            document.getElementById('calledOrders').innerHTML = count_4;
            document.getElementById('deliveredOrders').innerHTML = count_5;

            console.log(data);
        })



    })


    orderDateReform = (date) => {
        const timeOfDate_ = date.split('T');
        const timeOfDate = timeOfDate_[1].split('.');
        const getDate_ = timeOfDate_[0].split('-');
        const getDay = getDate_[2];
        const getMonth = getDate_[1];
        return `${getDay}/${getMonth} ${timeOfDate[0]}`;
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

    getLastOrder = async(token) => {
        try{
            const response = await fetch(`${url}/api/orders/lastorder`,{
                method:'GET',
                headers:{
                    'x-access-token': token,
                    'x-api-key': api_key
                }
            })
            return response;
        }catch(e){
            return e;
        }
    }

    getHibernateOrders = async(token) => {
        try{
            const response = await fetch(`${url}/api/orders/count/hibernates`,{
                method:'GET',
                headers:{
                    'x-access-token':token,
                    'x-api-key':api_key
                },
            })
            return response
        }catch(e){
            return e;
        }
    }

    getCalledOrders = async(token) => {
        try{
            const response = await fetch(`${url}/api/orders/count/called`,{
                method:'GET',
                headers:{
                    'x-access-token':token,
                    'x-api-key':api_key
                },
            })
            return response
        }catch(e){
            return e;
        }
    }

    getCanceledOrders = async(token) => {
        try{
            const response = await fetch(`${url}/api/orders/count/canceled`,{
                method:'GET',
                headers:{
                    'x-access-token':token,
                    'x-api-key':api_key
                },
            })
            return response
        }catch(e){
            return e;
        }
    }

    getDeliveredOrders = async(token) => {
        try{
            const response = await fetch(`${url}/api/orders/count/delivered`,{
                method:'GET',
                headers:{
                    'x-access-token':token,
                    'x-api-key':api_key
                },
            })
            return response
        }catch(e){
            return e;
        }
    }

    getUnrecognizedOrders = async(token) => {
        try{
            const response = await fetch(`${url}/api/orders/count/unrecognised`,{
                method:'GET',
                headers:{
                    'x-access-token':token,
                    'x-api-key':api_key
                },
            })
            return response
        }catch(e){
            return e;
        }
    }

    unrecognizedOrders


    const auth = authenticate()
        .then((response) => {
            return response.json()
        })
        .then((data) => {
            token = data.status.token;
            console.log(token);
            return token;
        })

    auth
        .then((token) => {
            getLastOrder(token)
                .then((response) => response.json())
                .then((order) => {
                    const { order_date } = order[0];
                    document.getElementById('lastOrderTime').innerHTML = orderDateReform(order_date);
                })
                .catch(err => console.log(err))

            getHibernateOrders(token)
                .then(response => response.json())
                .then(count => {
                    document.getElementById('hibarnateOrders').innerHTML = count.count;
                })
                .catch(err => console.log(err))

            getCalledOrders(token)
                .then(response => response.json())
                .then(count => {
                    document.getElementById('calledOrders').innerHTML = count.count;
                })
                .catch(err => console.log(err))

            getCanceledOrders(token)
                .then(response => response.json())
                .then(count => {
                    document.getElementById('canceledOrders').innerHTML = count.count;
                })
                .catch(err => console.log(err))

            getDeliveredOrders(token)
                .then(response => response.json())
                .then(count => {
                    document.getElementById('deliveredOrders').innerHTML = count.count;
                })
                .catch(err => console.log(err))

            getUnrecognizedOrders(token)
                .then(response => response.json())
                .then(count => {
                    document.getElementById('unrecognizedOrders').innerHTML = count.count;
                })
                .catch(err => console.log(err))

        })

    document.getElementById('leftBarRefresh').addEventListener('click', () => {

        document.getElementById('lastOrderTime').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        document.getElementById('hibarnateOrders').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        document.getElementById('calledOrders').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        document.getElementById('canceledOrders').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        document.getElementById('deliveredOrders').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';
        document.getElementById('unrecognizedOrders').innerHTML = '<i class="fa fa-spinner fa-spin"></i>';

        getLastOrder(token)
            .then((response) => response.json())
            .then((order) => {
                const { order_date } = order[0];
                document.getElementById('lastOrderTime').innerHTML = orderDateReform(order_date);
            })
            .catch(err => console.log(err))

        getHibernateOrders(token)
            .then(response => response.json())
            .then(count => {
                document.getElementById('hibarnateOrders').innerHTML = count.count;
            })
            .catch(err => console.log(err))

        getCalledOrders(token)
            .then(response => response.json())
            .then(count => {
                document.getElementById('calledOrders').innerHTML = count.count;
            })
            .catch(err => console.log(err))

        getCanceledOrders(token)
            .then(response => response.json())
            .then(count => {
                document.getElementById('canceledOrders').innerHTML = count.count;
            })
            .catch(err => console.log(err))

        getDeliveredOrders(token)
            .then(response => response.json())
            .then(count => {
                document.getElementById('deliveredOrders').innerHTML = count.count;
            })
            .catch(err => console.log(err))

        getUnrecognizedOrders(token)
            .then(response => response.json())
            .then(count => {
                document.getElementById('unrecognizedOrders').innerHTML = count.count;
            })
            .catch(err => console.log(err))
    });

</script>


@yield('especial_footer')

</body>
</html>
