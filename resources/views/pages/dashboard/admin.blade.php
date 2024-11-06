@extends('templates.main')

@section('title')
    {{'Dashboard'}}
@endsection
@section('head')
    <!-- Data table css -->
		<link href="{{ asset('assets/plugins/newsticker/newsticker.css') }}" rel="stylesheet" />
@endsection
@section('js')
    <!-- Data tables -->
		<script src="{{ asset('assets/plugins/newsticker/newsticker.js') }}"></script>
		<script src="{{ asset('assets/js/newsticker.js') }}"></script>
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Dashboard Admin</h4>
                </div>
            </div>
            <!--End Page header-->

            <div class="row">
                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="">
                        <div class="js-conveyor-example">
                            <ul class="news-crypto">

                                @foreach ($orders as $order)
                                <li>
                                    <span><span class="font-weight-bold">{{$order->name}}</span> <span class="text-muted fs-10"></span><span class="text-success ml-4">{{$order->created_at->toFormattedDateString()}}</span></span>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <i class="zmdi zmdi-library card-custom-icon icon-dropshadow-primary text-primary fs-60 mt-4"></i>
                                    <p class=" mb-1">Jumlah Destinasi</p>
                                    <h2 class="mb-1 font-weight-bold">{{$count_destination}}</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fa fa-users  card-custom-icon icon-dropshadow-warning text-warning fs-60 mt-4"></i>
                                    <p class=" mb-1">Total Kusir</p>
                                    <h2 class="mb-1 font-weight-bold">{{$count_kusirs}}</h2>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <i class="fa fa-wheelchair-alt card-custom-icon icon-dropshadow-secondary text-secondary fs-60 mt-4"></i>
                                    <p class=" mb-1">Total Drop Point</p>
                                    <h2 class="mb-1 font-weight-bold">{{$count_drop_points}}</h2>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  

        </div>
    </div>

{{-- {!! $classification->links() !!} --}}
</section>

</main>
    
@endsection