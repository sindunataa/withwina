@extends('frontend.templates.main')

@section('title')
    {{'Home'}}
@endsection

@section('content')

<div class="container-fluid bg-primary py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation With Us</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown">Exploring the Beauty of Tradition, Classic Andong, An Unforgettable Journey.</p>
                <div class="position-relative w-75 mx-auto animated slideInDown">
                </div>
                <div class="container-fluid pb-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="container">
                        <div class="bg-white shadow" style="padding: 25px;">
                            <form action="{{ route('search') }}" method="GET">
                                <div class="row g-2">
                                    <div class="col-md-10">
                                        <div class="row g-2">
                                            <div class="col-md-3">
                                                <div id="name" data-target-input="nearest">
                                                    <input type="text" class="form-control bg-transparent" name="name" id="name" placeholder="Your Name">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-select" id="destination" onchange="selectDropPoint()">
                                                    <option label="Destination"></option>
                                                    @foreach ($destinations as $destination)
                                                    <option value="{{$destination->id}}">{{$destination->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-select" name="dropPoint" id="dropPoint">
                                                    <option label="Drop Point"></option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <select class="form-select" name="person" id="person">
                                                    <option label="Person"></option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</div>   



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
<!-- About End -->


<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Services</h6>
            <h1 class="mb-5">Our Services</h1>
        </div>
        <div class="row g-3">
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-globe text-primary mb-4"></i>
                        <h5>WorldWide Tours</h5>
                        <p>Enjoy the classic beauty of the city on an unforgettable journey.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-user text-primary mb-4"></i>
                        <h5>Travel Guides</h5>
                        <p>Experience the authentic flavors of every corner of the city.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cog text-primary mb-4"></i>
                        <h5>Event Management</h5>
                        <p>An exclusive andong service for those precious moments of a lifetime.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End --> 


<!-- Destination Start -->
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
                            <div class="bg-dark-transparent text-light fw-bold position-absolute top-0 end-0 m-3 py-1 px-2">{{$item->name}}</div>
                            <div class="bg-dark-transparent text-light position-absolute bottom-0 end-0 m-3 py-1 px-2">{{$item->excerpt}}</div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Destination Start -->


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
                        <div class="mb-3 mt-3">
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


<!-- Process Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Process</h6>
            <h1 class="mb-5">3 Easy Steps</h1>
        </div>
        <div class="row gy-5 gx-4 justify-content-center">
            <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                <div class="position-relative border border-primary pt-5 pb-4 px-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                        <i class="fa fa-globe fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-4">Choose A Destination</h5>
                    <hr class="w-25 mx-auto bg-primary mb-1">
                    <hr class="w-50 mx-auto bg-primary mt-0">
                    <p class="mb-0">Choose a variety of interesting tourist destinations that you want to visit.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="position-relative border border-primary pt-5 pb-4 px-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                        <i class="fa fa-dollar-sign fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-4">Pay on Drop Point</h5>
                    <hr class="w-25 mx-auto bg-primary mb-1">
                    <hr class="w-50 mx-auto bg-primary mt-0">
                    <p class="mb-0">Choose and visit the nearest drop point from your location and make payment on the spot.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.5s">
                <div class="position-relative border border-primary pt-5 pb-4 px-4">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary rounded-circle position-absolute top-0 start-50 translate-middle shadow" style="width: 100px; height: 100px;">
                        <i class="fa fa-horse fa-3x text-white"></i>
                    </div>
                    <h5 class="mt-4">Happy Journey</h5>
                    <hr class="w-25 mx-auto bg-primary mb-1">
                    <hr class="w-50 mx-auto bg-primary mt-0">
                    <p class="mb-0">Had a fun and very memorable trip using andong to every corner of the city.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Process Start -->


@endsection

@section('js')
<script>
         function selectDropPoint() {
        var destinationID = $('#destination').val();
        console.log(destinationID);
        if(destinationID) {
            $.ajax({
                url: '/get-drop-point/',
                type: "GET",
                data : {"_token":"{{ csrf_token() }}", "destination_id": destinationID},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#dropPoint').empty();
                        $('#dropPoint').append('<option hidden>Pilih dropPoint</option>'); 
                        $.each(data, function(key, dropPoint){
                            $('select[id="dropPoint"]').append('<option value="'+ dropPoint.id +'">' + dropPoint.name+ '</option>');
                        });
                    }else{
                        $('#dropPoint').empty();
                    }
                }
            });
        }else{
            $('#dropPoint').empty();
        }
    };
</script>

@endsection