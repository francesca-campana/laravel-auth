@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Modifica post</h2>

      {{-- Validazione form --}}
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Modify post form --}}
      <form action="{{route('admin.posts.update', $post)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
          <label>Titolo:</label><br>
          <input type="text" name="title" value="{{ old('title') ? old('title') : $post->title}}" placeholder="title">
        </div>

        <div class="mt-2">
          <label>Post:</label><br>
          <textarea class="form-control" name="content" rows="3" value="">{{ old('content') ? old('content') : $post->content}}</textarea>
        </div>

          <div class="mt-2">
            <label>Post Image: </label>
            <input type="file" name="image" accept="image/*">
          </div>

        <div>
          <label>Author: {{ $post->user->name }}</label>
        </div>

          <input class="btn btn-primary" type="submit" name="" value="save">
        </form>

      </div>
    </div>
  </div>
    @endsection
