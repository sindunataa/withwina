<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="/" class="navbar-brand p-0">
            <h1 class="text-primary m-0"><img src="{{asset('img/andong.png')}}" alt="Logo"> WINA</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="/" class="nav-item nav-link @if(Request::segment(1) == '') active @endif">Home</a>
                <a href="/about" class="nav-item nav-link @if(Request::segment(1) == 'about') active @endif">About</a>
                <a href="/destination" class="nav-item nav-link @if(Request::segment(1) == 'destination') active @endif">Destination</a>
                <a href="/drop_point" class="nav-item nav-link @if(Request::segment(1) == 'drop_point') active @endif">Drop Point</a>
                {{-- <a href="package.html" class="nav-item nav-link @if(Request::segment(1) == 'home') active @endif">Booking</a> --}}
            </div>
            <a href="/login" class="btn btn-primary rounded-pill py-2 px-4">Login</a>
        </div>
    </nav>

    