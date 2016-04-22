@extends('home')

@section('content')
	<br>
	<br>
	<div class="col-sm-2"></div>
	<table class="table-striped table-bordered col-sm-8" style="margin: 0 auto; text-align: center;">
		<thead class="thead">
			<tr>
				<th>Title</th>
				<th>Author</th>
				<th>Created At</th>
				<th>Last Update</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($blogs as $blog)
			<tr>
				<td><a href="/blog/{{$blog->id}}">{{$blog->title}}</a></td>
				<td>{{$blog->author}}</td>
				<td>{{$blog->created_at}}</td>
				<td>{{$blog->updated_at}}</td>
				<td>
					<a href="/blog/{{$blog->id}}/edit" class="btn btn-info">Edit</a>
					<a href="/destroy/{{$blog->id}}" class="btn btn-danger">Delete</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="col-sm-2"></div>

@endsection