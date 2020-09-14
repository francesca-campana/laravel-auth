@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Benvenutonella lista dei post</h2>
      </div>
      <ul>
        @foreach ($posts as $post)
          <li>{{ $post->title }}</li>
          <a class="btn btn-success btn-xs" href="{{ route('posts.show', $post) }}">Show</a>
        @endforeach
      </ul>

    </div>

  </div>
@endsection
