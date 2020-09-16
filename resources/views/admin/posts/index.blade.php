@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Benvenuto {{ $user->name }}, sei nella lista dei post</h2>

          @foreach ($posts as $post)
            <div class="card mb-3" style="max-width: 1170px;">
              <div class="card-body d-flex justify-content-xl-between">
                <div class="">
                  <h5 class="card-title">{{ $post->title }}</h5>
                  <p class="card-text"><small class="text-muted">Creato da: {{ $post->user->name }}</small></p>

                </div>
                <div class="">
                  <a class="btn btn-success btn-xs" href="{{ route('admin.posts.show', $post) }}">Show</a>
                  <a class="btn btn-warning btn-xs" href="{{ route('admin.posts.create', $post) }}">Add new</a>
                  <form action="{{ route('admin.posts.destroy', $post) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger btn-xs" type="submit" value="Delete">

                  </form>
                </div>


              </div>

          </div>
          @endforeach
        </div>
      </div>
    </div>

@endsection
