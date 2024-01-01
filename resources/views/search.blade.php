@extends('layouts.app')

@section('content')
    <section class="gallery-block cards-gallery">
	    <div class="container">
	        <div class="heading">
	          <h2>Gallery</h2>
	        </div>
	        <div class="row">
                @foreach ($images as $images)

	                <div class="col-md-6 col-lg-4 box">
	                    <div class="card border-0 transform-on-hover">
	                    	<a class="lightbox" href="../image/{{ $images->id }}/edit">
	                    		<img src="../image/{{ $images->image }}" alt="Card Image" class="card-img-top img" >
	                    	</a>
	                        <div class="card-body">
                                <h3 >{{ $images->name }}</h3>
                                <h5 class="text-secondary ">{{ $images->category }}</h5>
	                            <h6><a href="../image/{{ $images->id }}/edit" class="btn btn-dark btn-sm">Edit</a></h6>
	                        </div>
	                    </div>
	                </div>
                    
                @endforeach
            </div>
        </div>
    </section>
        
@endsection