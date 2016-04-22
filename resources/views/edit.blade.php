@extends('home')

@section('content')

<div class="container">
  <h2>{{$blog->title}}</h2>
  <form role="form" action="/blog/{{$blog->id}}" method="post">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{$blog->title}}">
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea name="content" id="content" cols="138" rows="10" value="">{{$blog->content}}</textarea>
    </div>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" id="author" placeholder="Enter author" name="author" value="{{$blog->author}}">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection