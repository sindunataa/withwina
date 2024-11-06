@extends('frontend.templates.main')

@section('title')
    {{'Destination'}}
@endsection

@section('content')

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white animated slideInDown">Destination</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Destination</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->

<div class="container-xxl py-5 destination">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Destination</h6>
            <h1 class="mb-5">Popular Destination</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-12 col-md-6">
                <div class="row g-4">

                    @foreach ($destinations as $item)
                    <div class="col-lg-4 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                        <a class="position-relative d-block overflow-hidden" href="{{ route('destination.detail_destination',$item->slug) }}" terget="_blank">
                            <img class="img-fluid" src="{{asset('uploads/'.$item->image)}}" alt="">
                            <div class="bg-white-transparent text-dark fw-bold position-absolute top-0 end-0 m-3 py-1 px-2">{{$item->name}}</div>
                            <div class="bg-white-transparent text-dark position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$item->excerpt}}</div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection