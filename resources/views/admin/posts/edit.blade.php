@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Modifica post</h2>
      </div>
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

      {{-- Add new post form --}}
      <form action="{{route('admin.posts.update', $post)}}" method="post">
        @csrf
        @method('PUT')
        <label>Titolo:</label><br>
        <input type="text" name="title" value="{{ old('title') ? old('title') : $post->title}}" placeholder="title">
        <div>
          <select name="image">

              <option value="{{$post->image}}">{{$post->image}}</option>
            
          </select>

        </div>

        <br>
        <label>Post:</label><br>
        <textarea class="form-control" rows="3" value="{{ old('content') ? old('content') : $post->content}}"></textarea>


        <div>
          <select name="user_id">
            @foreach ($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>

          </div>

          <input type="submit" name="" value="save">
        </form>

        </div>
      @endsection
