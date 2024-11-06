@extends('templates.main')

@section('title')
    {{'Add Orders'}}
@endsection

@section('head')
<link href="{{ asset('/assets/plugins/wysiwyag/richtext.css')}}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection

@section('main')
<main id="main" class="main">
<section>
    <div class="app-content page-body">
        <div class="container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Add Orders</h4>
                </div>
                <div class="page-rightheader ml-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home" class="d-flex"><svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 3L2 12h3v8h6v-6h2v6h6v-8h3L12 3zm5 15h-2v-6H9v6H7v-7.81l5-4.5 5 4.5V18z"/><path d="M7 10.19V18h2v-6h6v6h2v-7.81l-5-4.5z" opacity=".3"/></svg><span class="breadcrumb-icon"> Home</span></a></li>
                        <li class="breadcrumb-item"><a href="/orders">List Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Orders</li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add New Orders</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('orders.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Name :</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                        @error('name')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="weight" class="form-label">Weight :</label>
                                        <input type="text" name="weight" class="form-control" id="weight" onkeyup="selectKusirs()" placeholder="Weight">
                                        @error('weight')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="weight">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="max" class="form-label">Max Person:</label>
                                        <input type="text" name="max" class="form-control" id="max_person" onkeyup="selectKusirs()" placeholder="Max">
                                        @error('name')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="max">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="kusir_id" class="form-label">Kusirs :</label>
                                        <select type="text" name="kusir_id" class="form-control @error('kusir_id') is-invalid @enderror" placeholder="Kusirs" id="kusirs" onchange="getCost()">
                                                <option label="Pilih Salah Satu"></option>
                                        </select>
                                        @error('cabor_id')
                                            <label id="cabor_id-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="distance" class="form-label">Distance :</label>
                                        <input type="text" name="distance" class="form-control" id="distance" onchange="getTotal()" placeholder="Distance">
                                        @error('name')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="name">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="cost" class="form-label">Cost :</label>
                                        <input type="text" name="cost" class="form-control" onchange="getTotal()" id="cost" placeholder="cost">
                                        @error('cost')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="cost">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="total" class="form-label">Total :</label>
                                        <input type="text" name="total" class="form-control" id="total" placeholder="total">
                                        @error('total')
                                        <label id="name-error" class="error mt-2 text-danger"
                                            for="total">{{ $message }}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="form-label">Status :</label>
                                        <select type="text" name="status" id="status" class="form-control">
                                            <option label="Pilih Salah Satu"></option>
                                            <option value="pending">pending</option>
                                            <option value="picked-up">picked-up</option>
                                            <option value="running">running</option>
                                            <option value="dropped-off">dropped-off</option>
                                            <option value="cancelled">cancelled</option>
                                        </select>
                                        @error('type')
                                            <label id="type-error" class="error mt-2 text-danger" for="type">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="destination_id" class="form-label">Destinations :</label>
                                        <select type="text" name="destination_id" class="form-control @error('destination_id') is-invalid @enderror" placeholder="Destinations" id="destination" onchange="selectDropPoint()">
                                                <option label="Pilih Salah Satu"></option>
                                            @foreach ($destinations as $destination)
                                                <option value="{{$destination->id}}">{{$destination->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('cabor_id')
                                            <label id="cabor_id-error" class="error mt-2 text-danger" for="cabor_id">{{$message}}</label>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="drop_point_id" class="form-label">Drop Points :</label>
                                        <select type="text" name="drop_point_id" class="form-control @error('drop_point_id') is-invalid @enderror" placeholder="Drop Points" id="dropPoint" >
                                                <option label="Pilih Salah Satu"></option>

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
<script>
    $(document).ready(function() {
        $('form').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Pastikan data anda benar dan Data yang tersimpan tidak dapat diubah!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4454c3',
                cancelButtonColor: '#ff5b51',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind('submit').submit();
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui nilai elemen input berat pada halaman Order
        function updateBeratInput() {
            $.ajax({
                url: '/get-berat/', // Ganti dengan URL rute yang sesuai
                type: "GET",
                success: function(response) {
                    // Setelah berhasil menerima data terbaru, isi nilai berat pada elemen input
                    $('#weight').val(response.berat);
                },
                error: function(xhr) {
                    console.log(xhr.responseText); // Tampilkan pesan kesalahan jika terjadi
                }
            });
        }

        // Jalankan fungsi updateBeratInput secara berkala setiap beberapa detik
        setInterval(updateBeratInput, 1000); // Misalnya, setiap 5 detik
    });

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

    function selectKusirs() {
        var weightID = $('#weight').val();
        var max_personID = $('#max_person').val();
        // console.log(weightID);
        if(weightID) {
            $.ajax({
                url: '/get-kusirs/',
                type: "GET",
                data : {"_token":"{{ csrf_token() }}", "weight": weightID, "max_person": max_personID},
                dataType: "json",
                success:function(data)
                {
                    if(data){
                        $('#kusirs').empty();
                        $('#kusirs').append('<option hidden>Pilih Kusir</option>'); 
                        $.each(data, function(key, kusirs){
                            $('select[id="kusirs"]').append('<option cost="'+ kusirs.cost +'" value="'+ kusirs.id +'">' + kusirs.name+ '</option>');
                        });
                    }else{
                        $('#kusirs').empty();
                    }
                }
            });
        }else{
            $('#kusirs').empty();
        }
    };

    function getTotal() {
        var distanceID = $('#distance').val();
        var costID = $('#cost').val();
        var totalID = parseInt(distanceID) * parseInt(costID);
        $('#total').val(totalID);
    }

    function getCost() {
        var cost = $('#kusirs').find(":selected").attr('cost');
        $('#cost').val(cost);
    }

    // $(document).ready(function() {
    // $('#destination').on('change', function() {
    // var destinationID = $(this).val();
    // if(destinationID) {
    //     $.ajax({
    //         url: '/get-drop-points/'+destinationID,
    //         type: "GET",
    //         data : {"_token":"{{ csrf_token() }}"},
    //         dataType: "json",
    //         success:function(data)
    //         {
    //             if(data){
    //                 $('#dropPoint').empty();
    //                 $('#dropPoint').append('<option hidden>Pilih Drop Point</option>'); 
    //                 $.each(data, function(key, dropPoint){
    //                     $('select[id="dropPoint"]').append('<option value="'+ dropPoint.name +'">' + dropPoint.name+ '</option>');
    //                 });
    //             }else{
    //                 $('#dropPoint').empty();
    //             }
    //         }
    //     });
    // }else{
    //     $('#dropPoint').empty();
    // }
    // });
    
</script>
@endsection