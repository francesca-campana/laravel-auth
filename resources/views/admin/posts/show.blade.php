@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="media">

            @if (!empty($post->image))
              <div class="media-left media-middle">
                <img class="media-object" src="{{asset('storage') . '/' . $post->image}}" alt="{{ $post->title }}">
              </div>
            @endif


          <div class="media-body">
            <h4 class="media-heading">{{ $post->title }}</h4>
            <p>Author: {{ $post->user->name }} - Creato il: {{ $post->created_at->format('d/m/y') }}</p>
            <p>{{ $post->content }}</p>
            <a class="btn btn-primary" href="{{ route('admin.posts.index')}}"> Torna alla lista post</a>

            <a class="btn btn-warning" href="{{ route('admin.posts.edit', $post) }}"> Modifica Post</a>

          </div>

        </div>

        </div>
      </div>


    </div>

  </div>
@endsection
