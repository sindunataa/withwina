@extends('frontend.templates.main')

@section('title')
    {{'Home'}}
@endsection

@section('content')

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white animated slideInDown">{{$greeting}}</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Let's Start Your Unforgettable Journey.</p>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->


<!-- Team Start -->
<div class="container-xxl py-5">
<div class="container">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
        <h6 class="section-title bg-white text-center text-primary px-3">Travel Guide</h6>
        <h1 class="mb-5">Meet Our Kurirs</h1>
    </div>
    <div class="row g-4">
        @if ($kusirs->isEmpty())
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                        <h1 class="mb-4">Kusirs Not Found</h1>
                        <p class="mb-4">We’re sorry, the Kusirs is not Available yet. Maybe go to our home page or try to use a search?</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="/">Go Back To Home</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        
            @foreach ($kusirs as $item)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{asset('uploads/'.$item->image)}}" alt="">
                        </div>
                        <div class="d-flex border-bottom">
                            <small class="flex-fill text-center border-end py-2">
                                @if($item->status == 'waiting')
                                    <i class="fa fa-clock text-primary me-2"></i>
                                    <span class="text-primary">Waiting</span>
                                @elseif($item->status == 'running')
                                    <i class="fa fa-bars text-primary me-2"></i>
                                    <span class="text-danger">Running</span>
                                @elseif($item->status == 'finished')
                                    <i class="fa fa-bars text-primary me-2"></i>
                                    <span class="text-primary">Finished</span>
                                @else
                                    <i class="fa fa-bars me-2"></i>
                                    {{$item->status}}
                                @endif
                            </small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-coins text-primary me-2"></i>Rp. {{$item->cost}} / Km</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$item->max_person}} Person</small>
                        </div>
                        <div class="text-center p-4">
                            <div class="mb-3 mt-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                            </div>
                            <h3 class="mb-0">{{$item->name}}</h3>
                            <div class="d-flex justify-content-center mb-2 mt-4">
                                <a href="/drop_point" class="btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px;">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        
        @endif
        
        
    </div>
</div>
</div>
<!-- Team End -->


@endsection