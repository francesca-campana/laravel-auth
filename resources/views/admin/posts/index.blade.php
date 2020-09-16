@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Benvenuto {{ $user->name }}, sei nella lista dei post</h2>

          @foreach ($posts as $post)
            <div class="card mb-3" style="max-width: 1170px;">
              <div class="row no-gutters">
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text"><small class="text-muted">Creato da: {{ $post->user->name }}</small></p>
                    <a class="btn btn-success btn-xs" href="{{ route('admin.posts.show', $post) }}">Show</a>

                  </div>

                </div>


            </div>

          </div>
          @endforeach
        </div>
      </div>
    </div>

@endsection
