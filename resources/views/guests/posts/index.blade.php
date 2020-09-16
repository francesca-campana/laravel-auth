@extends('layouts.app')

@section('content')
  <<div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Benvenuto sei nella lista dei post</h2>

          @foreach ($posts as $post)
            <div class="card mb-3" style="max-width: 1170px;">
              <div class="card-body d-flex justify-content-xl-between">
                <h5 class="card-title">{{ $post->title }}</h5>

                <a class="btn btn-primary btn-xs" href="{{ route('posts.show', $post) }}">Show</a>

              </div>

          </div>
          @endforeach
          {{ $posts->links() }}
        </div>
      </div>
    </div>

@endsection
