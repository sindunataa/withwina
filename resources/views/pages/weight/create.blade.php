@extends('main')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Weight</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('berat.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">Berat:</label>
              <input type="text" class="form-control" name="berat" id="berat"/>
          </div>

                       
          <button type="submit" class="btn btn-primary mt-2">Add Berat</button>
      </form>
  </div>
</div>
</div>
@endsection