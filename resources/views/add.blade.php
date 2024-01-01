@extends('layouts.app')

@section('content')

    @if ($message=Session::get('success'))
        <div class="alert alert-success alert-block">
            {{ $message }}
        </div>
    @endif

    <h2 class="row justify-content-center mt-4 ">Add Image</h2>
   <div class="contianer">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
    <form action="/image/store" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="form-group">
        <label>Name: </label>
        <input type="text" name="name" id="name" required>
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" id="image" class="form-control" required onchange="validateFileType()">
    </div>
    <div class="form-group">
        <label for="">category</label>
        <input types="text" name="category" id="category" required>
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