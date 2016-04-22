@extends('home')

@section('content')
	<br>
	<br>
	<h2>Post Title : {{$blogs->title}}</h2>
	<blockquote>
		<pre>{{$blogs->content}}</pre>
		<footer>{{$blogs->author}}</footer>
	</blockquote>
	<a href="/blog/{{$blogs->id}}/edit" class="btn btn-info">Edit</a>
	<a href="/destroy/{{$blogs->id}}" class="btn btn-danger">Delete</a>

@endsection