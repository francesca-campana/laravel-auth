@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="media">
          <div class="media-left media-middle">
            <img class="media-object" src="{{$post->image}}" alt="{{ $post->title }}">
          </div>
          <div class="media-body">
            <h4 class="media-heading">{{ $post->title }}</h4>
            <p>Creato il: {{ $post->created_at->format('d/m/y') }}</p>
            <p>{{ $post->content }}</p>
            <a class="btn btn-primary" href="{{ route('admin.posts.index')}}"> Torna alla lista post</a>
            

          </div>

        </div>

        </div>
      </div>


    </div>

  </div>
@endsection
