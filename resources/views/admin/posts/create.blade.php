@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Crea il tuo post</h2>
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
      <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div>
          <label>Titolo:</label><br>
          <input type="text" name="title" value="{{ old('title')}}" placeholder="title">
        </div>

        <div>
          <label>Post:</label><br>
          <textarea class="form-control" name="content" rows="3">{{ old('content')}}</textarea>
        </div>

        <div>
          <label>Post Image:</label><br>
          <input type="file" name="image" accept="image/*">
        </div>

        <div>
          <input type="submit" name="" value="save">
        </div>

        </form>

      </div>
    @endsection
