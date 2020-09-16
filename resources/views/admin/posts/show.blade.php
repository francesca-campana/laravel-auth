@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><small class="text-muted">Author: {{ $post->user->name }} - Creato il: {{ $post->created_at->format('d/m/y') }}</small></p>
            <div class="mb-2">
              <a class="btn btn-primary" href="{{ route('admin.posts.index')}}"> Torna alla lista post</a>
              <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post) }}"> Modifica Post</a>
            </div>


              @if (!empty($post->image))
              <div>
              @if (File::exists('storage'.'/'. $post->image))
                <img class="card-img-bottom" src="{{asset('storage') . '/' . $post->image}}" alt="{{ $post->title }}">
              @else
                <img class="card-img-bottom" src="{{$post->image}}" alt="{{ $post->title }}">
              @endif
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
