@extends('layouts.app')

@section('content')
    <div class="container">
	    <div class="row justify-content-center">
	    	<div class="col-md-12">
	        	@include('include.error')
	        	@include('include.flash')
	        </div>
	        <div class="col-md-12">
	        	<h2>Create new article</h2>

	        	<form method="post" action="{{ route('addarticle') }}" enctype="multipart/form-data">
	        		@csrf
					<div class="form-group">
					    <label>Name</label>
					    <input type="text" name="title" class="form-control" placeholder="Doe Doeson">
					</div>
                  	<div class="form-group">
                      	<input type="file" name="image" class="form-control-file" accept="image/jpg">
                  	</div>
					<div class="form-group">
					    <label>Description</label>
					    <textarea name="body" class="form-control" rows="5"></textarea>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
	        </div>
	    </div>
	</div>
@endsection