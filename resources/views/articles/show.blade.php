@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	      	<div class="col-lg-12">
		        <h1 class="mt-4">{{ $article->title }}</h1><a class="btn btn-outline-info float-right" href="{{ route('articles.edit', $article->id) }}" role="button"><span class="oi oi-pencil"></span></a>
		        <p><span class="oi oi-person"></span> by <em>{{ $article->user->name }}</em></p>
		        <p><span class="oi oi-clock"></span> {{ $article->created_at->diffForHumans() }}</p>
		        @if(!is_null($article->image))
		        	<img class="img-fluid rounded" src="{{ url('/images', $article->image) }}" alt="{{ $article->title }}">
		        @else
		        	<img class="img-fluid rounded" src="https://via.placeholder.com/1110" alt="{{ $article->title }}">
		        @endif()
		        <div class="py-5">
		        	<p class="lead">{!! $article->body !!}</p>
		        </div>
	      	</div>
	    </div>
	</div>
@endsection