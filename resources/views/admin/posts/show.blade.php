@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Benvenuto nella lista dei post</h2>
      </div>
      <ul>
        @foreach ($posts as $post)
          <li>{{ $post->user->name }} - {{ $post->title }}</li>
          <a class="btn btn-success btn-xs" href="{{ route('admin.posts.show', $post) }}">Show</a>
        @endforeach
      </ul>

    </div>

  </div>
@endsection