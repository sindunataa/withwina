@extends('main') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Weight</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('berat.update', $item->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="berat">Berat:</label>
                <input type="text" class="form-control mt-2" name="berat" id="berat" value={{ $item->berat }} />
            </div>

            <button type="submit" class="btn btn-primary mt-2">Update</button>
        </form>
    </div>
</div>
@endsection