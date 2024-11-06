@extends('frontend.templates.main')

@section('title')
    {{'About Us'}}
@endsection

@section('content')

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white animated slideInDown">About Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- About Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="row g-5">
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
            <div class="position-relative h-100">
                <img class="img-fluid position-absolute w-100 h-100" src="img/about.jpg" alt="" style="object-fit: cover;">
            </div>
        </div>
        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
            <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
            <h1 class="mb-4">Welcome to <span class="text-primary">WINA</span></h1>
            <p class="mb-4">Welcome to WINA, the destination of choice for unique and memorable travel experiences! We are an exclusive travel service provider that presents the traditional beauty of using andong, a distinctive vehicle that combines classic nuances with modern convenience.</p>
            <p class="mb-4">From historical tours to local cuisine, every trip with WINA is an all-round experience. Enjoy breathtaking views, the soothing sounds of horses, and attentive service from our team willing to cater to your every need.</p>
            <div class="row gy-2 gx-4 mb-4">
                <div class="col-sm-6">
                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Tours</p>
                </div>
                <div class="col-sm-6">
                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
                </div>
                <div class="col-sm-6">
                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
                </div>
                <div class="col-sm-6">
                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Premium City Tours</p>
                </div>
                <div class="col-sm-6">
                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                </div>
            </div>
            <a class="btn btn-primary py-3 px-5 mt-2" href="/drop_point">Let's Start!</a>
        </div>
    </div>
</div>
</div>

@endsection