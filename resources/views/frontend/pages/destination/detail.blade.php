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
                        <li class="breadcrumb-item"><a href="#">Destination</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">{{$destinations->name}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="img-fluid position-absolute w-100 h-100" src="{{asset('uploads/'.$destinations->image)}}" alt="" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                <h1 class="mb-4">{{$destinations->name}} </h1>
                <p class="mb-4">{!! $destinations->excerpt !!}</p>
                <p class="mb-4">{!! $destinations->description !!}</p>
                
                <a class="btn btn-primary py-3 px-5 mt-2" href="/drop_point">Let's Start!</a>
            </div>
        </div>
    </div>
</div>

@endsection