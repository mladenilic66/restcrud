@extends('layouts.app')

@section('content')
    <div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-md-12">
	        	@include('include.error')
	        	@include('include.flash')
	        </div>
	        <div class="col-md-12">
	        	<h2>Update article</h2>

	        	<form method="post" action="{{ route('editarticle', $article->id) }}" enctype="multipart/form-data">
	        		@csrf
					<div class="form-group">
					    <label>Title</label>
					    <input type="text" name="title" class="form-control" value="{{ $article->title }}">
					</div>
                  	<div class="form-group">
                      	<input type="file" name="image" class="form-control-file" accept="image/jpg">
	        			@if(!is_null($article->image))
				        	<img class="img-fluid rounded" src="{{ url('/images', $article->image) }}" alt="{{ $article->title }}">
				        @else
				        	<img class="img-fluid rounded" src="https://via.placeholder.com/1110" alt="{{ $article->title }}">
				        @endif()
                  	</div>
					<div class="form-group">
					    <label>Description</label>
					    <textarea name="body" class="form-control" rows="7">{{ $article->body }}</textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
	        </div>
	    </div>
	</div>
@endsection