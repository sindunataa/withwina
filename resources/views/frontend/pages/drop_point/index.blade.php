@extends('frontend.templates.main')

@section('title')
    {{'Drop Points'}}
@endsection

@section('content')
<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white animated slideInDown">Drop Points</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Drop Points</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Package Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Drop Points</h6>
        <h1 class="mb-5">Our Drop Points</h1>
    </div>

    <div class="row g-4 justify-content-center">
        @foreach ($drop_points as $item)
        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="package-item">
                <div class="overflow-hidden">
                    <img class="img-fluid" src="{{asset('uploads/'.$item->image)}}" alt="">
                </div>
                <div class="d-flex border-bottom">
                    <small class="flex-fill text-center border-end py-2"><i class="fa fa-calendar-alt text-primary me-2"></i>Available</small>
                    <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>24/7 Services</small>
                </div>
                <div class="text-center p-4">
                    <h3 class="mb-0">{{$item->name}}</h3>
                    <div class="mb-3">
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                        <small class="fa fa-star text-primary"></small>
                    </div>
                    <p>Convenient location for easy pick-up and drop-off, making the trip smoother and more efficient.</p>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="{{$item->link}}" class="btn btn-sm btn-primary px-3" style="border-radius: 30px 30px;"><i class="fa fa-map-marker-alt text-light me-2"></i>Navigate</a>    
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
</div>
</div>
<!-- Package End -->
@endsection