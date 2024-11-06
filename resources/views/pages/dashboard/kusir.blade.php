@extends('templates.main')

@section('title')
    {{'Dashboard'}}
@endsection
@section('head')
    <!-- Data table css -->
		<link href="{{ asset('assets/plugins/newsticker/newsticker.css') }}" rel="stylesheet" />
        <link href="https://api.mapbox.com/mapbox-gl-js/v3.1.0/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v3.1.0/mapbox-gl.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}"  rel="stylesheet">
		<link href="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <!-- Data tables -->
        <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>
		<script src="{{ asset('assets/js/datatables.js') }}"></script>
		<script src="{{ asset('assets/plugins/newsticker/newsticker.js') }}"></script>
		<script src="{{ asset('assets/js/newsticker.js') }}"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.2.0/mapbox-gl-directions.js"></script>
        <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.2.0/mapbox-gl-directions.css" type="text/css">
        <script>
            mapboxgl.accessToken = 'pk.eyJ1Ijoic2luZHVuYXRhIiwiYSI6ImNscm9kZmFwYzFmdmUyanA5cWNmbmUxcW4ifQ.wmlAi4NxuIWiZhi1oCNDpg';
            const map = new mapboxgl.Map({
            container: 'map',
            // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [110.41710240961223, -7.808622959765371],
            zoom: 13
            });

            
            map.addControl(
            new MapboxDirections({
            accessToken: mapboxgl.accessToken
            }),
            'top-left'
            );

            function getCurrentLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (position) {
                            var latitude = position.coords.latitude;
                            var longitude = position.coords.longitude;

                            // Pusatkan peta ke lokasi saat ini
                            map.flyTo({
                                center: [longitude, latitude],
                                zoom: 15
                            });

                            // Tambahkan marker ke lokasi saat ini
                            new mapboxgl.Marker()
                                .setLngLat([longitude, latitude])
                                .setPopup(new mapboxgl.Popup().setHTML('<p>Drop Point 1</p>'))
                                .addTo(map);

                            // Tentukan destinasi yang ingin dioptimalkan
                            var destination = [110.41710240961223, -7.808622959765371];

                            // Panggil fungsi untuk mendapatkan rute yang dioptimalkan
                            getOptimizedRoute([longitude, latitude], destination);
                        },
                        function (error) {
                            console.error('Error getting geolocation:', error);
                        }
                    );
                } else {
                    alert('Geolokasi tidak didukung di perangkat ini.');
                }
            }

            function getOptimizedRoute(start, end) {
                var accessToken = 'pk.eyJ1Ijoic2luZHVuYXRhIiwiYSI6ImNscm9kZmFwYzFmdmUyanA5cWNmbmUxcW4ifQ.wmlAi4NxuIWiZhi1oCNDpg';
                var apiUrl = `https://api.mapbox.com/optimized-trips/v2/mapbox/driving/${start[0]},${start[1]};${end[0]},${end[1]}?access_token=${accessToken}&roundtrip=true`;

                // Gunakan Axios atau metode lain untuk mengirim permintaan HTTP
                axios.post(apiUrl)
                    .then(response => {
                        var optimizedRoute = response.data;
                        console.log(optimizedRoute);

                        // Manipulasi hasil rute yang dioptimalkan sesuai kebutuhan
                    })
                    .catch(error => {
                        console.error('Error optimizing route:', error);
                    });
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script src="/js/app.js"></script>
        <script>
            var vueDataOrders = new Vue({
                el: "#appVue",
                data: {
                    selectedOrder: null
                },
                methods: {
                    // Method untuk menampilkan detail pesanan saat "Oke" ditekan
                    showOrderDetails: function(orderId) {
                        axios.get('{{ route('showOrders') }}', {
                            params: {
                                order_id: orderId
                            }
                        }).then((response) => {
                            // Tampilkan detail pesanan di view
                            this.selectedOrder = response.data.order;
                        }).catch((error) => {
                            console.error('Error fetching order details:', error);
                        });
                    },
                    completeOrder: function(orderId) {
                        Swal.fire({
                            icon: 'question',
                            title: 'Konfirmasi',
                            text: 'Apakah Anda yakin ingin menyelesaikan pesanan?',
                            showCancelButton: true,
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Tidak'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                axios.post('/orders/' + orderId + '/complete')
                                    .then(response => {
                                        // Tampilkan pesan sukses atau lakukan tindakan lain jika diperlukan
                                        console.log('Order successfully completed:', response.data);

                                        this.selectedOrder.status = 'dropped-off';
                                        this.selectedOrder = null;

                                    })
                                    .catch(error => {
                                        // Tangani kesalahan jika terjadi
                                        console.error('Error completing order:', error);
                                    });
                            }
                        });
                    },
                },
            });

            window.Echo.channel('order-channel')
            .listen('OrderProcessed', (event) => {
                console.log('Order Processed:', event.order);

                if (event.order && event.order.name) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Terima Order',
                        text: 'Anda memiliki order baru dengan Penumpang ' + event.order.name,
                        confirmButtonText: 'Oke',
                        showCancelButton: true,
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim permintaan untuk mendapatkan data order
                            axios.get('{{ route('showOrders') }}', {
                                params: {
                                    order_id: event.order.id
                                }
                            }).then((response) => {
                                vueDataOrders.showOrderDetails(response.data.order.id);
                            }).catch((error) => {
                                console.error('Error fetching order details:', error);
                            });
                        }
                    });
                } else {
                    console.error('Invalid order data:', event.order);
                }
            });

    
        </script>
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Dashboard Kusirs</h4>
                </div>
            </div>
            <!--End Page header-->

            {{-- <div class="main-profile" id="appVue">
                <div class="row">
                    <div class="col-lg-12">
                        <div v-if="selectedOrder" class="list-group">
                            <h4>Detail Pesanan</h4>
                            <p>Nama: @{{ selectedOrder.name }}</p>
                            <p>Status: @{{ selectedOrder.status }}</p>
                            <p>Berat: @{{ selectedOrder.weight }} kg</p>
                            <p>Total: @{{ selectedOrder.total }}</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="card crypto-header-section" id="appVue">
                <div class="card-body" v-if="selectedOrder">
                    <div class="row mb-3">
                        <div class="col-xl-2 col-lg-3 mt-3">
                            <div class="border-right">
                                <p class="text-muted">Penumpang</p>
                                <h3 class="mb-0 font-weight-bold">@{{ selectedOrder.name }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 mt-3">
                            <div class="border-right">
                                <p class="text-muted">Berat</p>
                                <h3 class="mb-0 font-weight-bold"> @{{ selectedOrder.weight }}</h3>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 mt-3">
                            <div>
                                <p class="text-muted">Tarif</p>
                                <h3 class="mb-0 font-weight-bold">Rp. @{{ selectedOrder.total }} ,-</h3>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-3 mt-2 pt-2 pt-lg-0 mt-lg-0 mt-xl-4 pt-xl-2 text-lg-right">
                            <a v-if="selectedOrder && selectedOrder.destination && selectedOrder.destination.link" class="btn btn-primary mb-1" :href="selectedOrder.destination.link" target="_blank"><i class="fe fe-plus"></i> Navigate </a>
                            <button @click="completeOrder(selectedOrder.id)" class="btn btn-primary">Selesai Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="row">
                <div class="col-md-12 col-xl-3 col-lg-4">
                    <div class="card">
                        <div class="list-group list-group-transparent mb-0 mail-inbox pb-3">
                            
                            <a href="#" class="list-group-item list-group-item-action d-flex align-items-center active mt-4 mb-4">
                                <svg class="svg-icon mr-2" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 3H5c-1.1 0-2 .9-2 2v7c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM5 10h3.13c.21.78.67 1.47 1.27 2H5v-2zm14 2h-4.4c.6-.53 1.06-1.22 1.27-2H19v2zm0-4h-5v1c0 1.07-.93 2-2 2s-2-.93-2-2V8H5V5h14v3zm-5 7v1c0 .47-.19.9-.48 1.25-.37.45-.92.75-1.52.75s-1.15-.3-1.52-.75c-.29-.35-.48-.78-.48-1.25v-1H3v4c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-4h-7zm-9 2h3.13c.02.09.06.17.09.25.24.68.65 1.28 1.18 1.75H5v-2zm14 2h-4.4c.54-.47.95-1.07 1.18-1.75.03-.08.07-.16.09-.25H19v2z"/><path d="M8.13 10H5v2h4.4c-.6-.53-1.06-1.22-1.27-2zm6.47 2H19v-2h-3.13c-.21.78-.67 1.47-1.27 2zm-6.38 5.25c-.03-.08-.06-.16-.09-.25H5v2h4.4c-.53-.47-.94-1.07-1.18-1.75zm7.65-.25c-.02.09-.06.17-.09.25-.23.68-.64 1.28-1.18 1.75H19v-2h-3.13z" opacity=".3"/></svg> All Orders
                            </a>
                        </div>
                        <div class="card-body border-top">
                            <div class="list-group list-group-transparent mb-0 mail-inbox">
                                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                    <span class="w-3 h-3 brround bg-primary-transparent mr-2"></span> Pending Order
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                    <span class="w-3 h-3 brround bg-success-transparent mr-2"></span> Completed/Running Order
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center px-0 py-2">
                                    <span class="w-3 h-3 brround bg-secondary-transparent mr-2"></span> Cancelled Order
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="card">
                        <div class="card-body p-6">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-nowrap mb-0" id="example1">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Total</th>
                                            <th>Destinations</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $order->name }}</td>
                                            <td>Rp. {{ $order->total }}</td>
                                            <td><a href="{{ $order->destination->link }}">{{ $order->destination->name }}</a> </td>
                                            <td>
                                                @if($order->status == 'pending')
                                                    <span class="badge badge-light badge-pill">Pending</span>
                                                @elseif($order->status == 'picked-up')
                                                    <span class="badge badge-pill badge-warning">Picked Up</span>
                                                @elseif($order->status == 'running')
                                                    <span class="badge badge-pill badge-warning">Running</span>
                                                @elseif($order->status == 'dropped-off')
                                                    <span class="badge badge-pill badge-success">Dropped-Off</span>
                                                @elseif($order->status == 'cancelled')
                                                    <span class="badge badge-pill badge-danger">Cancelled</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ $order->status }}</span>
                                                @endif
                                            </td>
                                    
            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="map" style="width: 100%; height: 500px;"></div>

        </div>
    </div>

</section>

</main>
    
@endsection