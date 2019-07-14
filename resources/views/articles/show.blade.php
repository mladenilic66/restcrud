@extends('layouts.app')

@section('content')
    <div class="container">
		<div class="container">
		    <div class="row">
		      	<div class="col-lg-12">
			        <h1 class="mt-4">{{ $article->title }}</h1>
			        <p class="lead">by <em>{{ $article->user->name }}</em></p>
			        <p>{{ $article->created_at->diffForHumans() }}</p>
			        <img class="img-fluid rounded" src="{{ url('/images', $article->image) }}" alt="{{ $article->title }}">
			        <p class="lead">{!! $article->body !!}</p>
		      	</div>
		    </div>
		</div>
	</div>
@endsection