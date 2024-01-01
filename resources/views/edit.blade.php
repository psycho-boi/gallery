@extends('layouts.app')

@section('content')

    @if ($message=Session::get('success'))
        <div class="alert alert-success alert-block">
            {{ $message }}
        </div>
    @endif

    <h2 class="row justify-content-center mt-4 text-muted">Editing image {{$image->name}}</h2>
   <div class="contianer">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
    <form action="/image/{{$image->id}}/update" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="form-group">
        <label>Name: </label>
        <input type="text" name="name" id="name" value="{{old('name', $image->name)}}" required>
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" id="image" class="form-control"  onchange="validateFileType()">
    </div>
    <div class="form-group">
        <label for="">category</label>
        <input types="text" name="category" id="category"  value="{{old('category', $image->category)}}" required>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
</div>
</div>
</div>

<script>
    function validateFileType() {
         var selectedFile = document.getElementById('image').files[0];
         var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];

         if (!allowedTypes.includes(selectedFile.type)) {
            alert('Invalid file type. Please upload a JPEG, PNG or JPG file.');
            document.getElementById('image').value = '';
         }
      }
</script>


@endsection