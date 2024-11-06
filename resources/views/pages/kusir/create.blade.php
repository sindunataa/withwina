@extends('templates.main')

@section('title')
    {{'Add Kusirs'}}
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Add Kusirs</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/kusirs">List Kusirs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Kusirs</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Kusirs</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kusirs.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name :</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="weight" class="form-label">Weight :</label>
                                        <input type="text" name="weight" class="form-control" id="weight" placeholder="Weight">
                                    </div>
                                    <div class="form-group">
                                        <label for="max" class="form-label">Max Weight:</label>
                                        <input type="text" name="max" class="form-control" id="max" placeholder="Max">
                                    </div>
                                    <div class="form-group">
                                        <label for="cost" class="form-label">Cost :</label>
                                        <input type="text" name="cost" class="form-control" id="cost" placeholder="cost">
                                    </div>
                                    <div class="form-group">
                                        <label for="max_person" class="form-label">Max Person:</label>
                                        <input type="text" name="max_person" class="form-control" id="max_person" placeholder="Max Person">
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status :</label>
                                        <select name="status" id="status" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option value="waiting">Waiting</option>
                                            <option value="runing">Runing</option>
                                            <option value="finished">Finished</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Email">Email :</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="Password" class="form-label">Password :</label>
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="image" class="form-label">Upload Images :</label>
                                        <input type="file" name="image" class="dropify" data-height="250" data-width="200"/>
                                    </div>
                                    
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary mt-2 mb-0">Submit</button>
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
<script type="text/javascript">
  $(document).ready(function(){
$('.dropify').dropify();

$('.dropify-clear').click(function(e){
  e.preventDefault();
  alert('Remove Hit');
  
});
});
</script>
@endsection