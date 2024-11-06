@extends('templates.main')

@section('title')
    {{'Edit Orders'}}
@endsection

@section('head')
<link href="{{ asset('/assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Edit Orders</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/orders">List Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Orders</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Orders</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('orders.admin.update',['id'=> $edit->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name :</label>
                                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="name" placeholder="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="weight" class="form-label">Weight :</label>
                                        <input type="text" name="weight" value="{{ $edit->weight }}" class="form-control" id="weight" placeholder="weight">
                                    </div>
                                    <div class="form-group">
                                        <label for="max" class="form-label">Max :</label>
                                        <input type="text" name="max" value="{{ $edit->max }}" class="form-control" id="max" placeholder="max">
                                    </div>
                                    <div class="form-group">
                                        <label for="distance" class="form-label">Distance :</label>
                                        <input type="text" name="distance" value="{{ $edit->distance }}" class="form-control" id="distance" placeholder="distance">
                                    </div>
                                    <div class="form-group">
                                        <label for="cost" class="form-label">Cost :</label>
                                        <input type="text" name="cost" value="{{ $edit->cost }}" class="form-control" id="cost" placeholder="cost">
                                    </div>
                                    <div class="form-group">
                                        <label for="total" class="form-label">Total :</label>
                                        <input type="text" name="total" value="{{ $edit->total }}" class="form-control" id="total" placeholder="total">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status :</label>
                                        <select type="text" name="status" id="status" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option value="pending" {{($edit->status == 'pending') ? "selected":"";}}>Pending</option>
                                            <option value="picked-up" {{($edit->status == 'picked-up') ? "selected":"";}}>Picked-up</option>
                                            <option value="running" {{($edit->status == 'running') ? "selected":"";}}>Running</option>
                                            <option value="dropped-off" {{($edit->status == 'dropped-off') ? "selected":"";}}>Dropped-off</option>
                                            <option value="cancelled" {{($edit->status == 'cancelled') ? "selected":"";}}>Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="drop_point_id" class="form-label">Drop Points :</label>
                                        <select type="text" name="drop_point_id" class="form-control @error('drop_point_id') is-invalid @enderror" placeholder="drop_point_id" id="drop_point_id">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($drop_points as $drop_point)
                                            <option value="{{$drop_point->id}}" {{($drop_point->id == $edit->drop_point_id)?"selected":"";}}>{{$drop_point->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('cabor_id')
                                            <label id="cabor_id-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kusir_id" class="form-label">Kusirs :</label>
                                        <select type="text" name="kusir_id" class="form-control @error('kusir_id') is-invalid @enderror" placeholder="kusir_id" id="kusir_id">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($kusirs as $kusir)
                                                <option value="{{$kusir->id}}" {{($kusir->id == $edit->kusir_id)?"selected":"";}}>{{$kusir->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('cabor_id')
                                            <label id="cabor_id-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="destination_id" class="form-label">Destinations :</label>
                                        <select type="text" name="destination_id" class="form-control @error('destination_id') is-invalid @enderror" placeholder="destination_id" id="destination_id">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($destinations as $destination)
                                            <option value="{{$destination->id}}" {{($destination->id == $edit->destination_id)?"selected":"";}}>{{$destination->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('cabor_id')
                                            <label id="cabor_id-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    

                                </div>
                                <button type="submit" class="btn btn-primary mt-2 mb-0">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Row -->

        </div>
    </div>

</section>

</main>
    
@endsection

@section('js')

<script src="{{asset ('/assets/plugins/wysiwyag/jquery.richtext.js')}}"></script>
<script src="{{asset ('/assets/js/form-editor.js')}}"></script>
    
@endsection
