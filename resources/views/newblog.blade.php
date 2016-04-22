@extends('home')

@section('content')

<div class="container">
  <h2>Create new blog</h2>
  <form role="form" action="/blog" method="post">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea name="content" id="content" cols="138" rows="10"></textarea>
    </div>
    <div class="form-group">
      <label for="author">Author:</label>
      <input type="text" class="form-control" id="author" placeholder="Enter author" name="author">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection