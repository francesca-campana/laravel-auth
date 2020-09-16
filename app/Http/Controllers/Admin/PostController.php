<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $user = Auth::user();
        return view('admin.posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationData());
        if (!Auth::check()) {
          abort('404');
        }
        $requested_data = $request->all();
        //dd($requested_data);

        $new_post = new Post();
        $new_post->user_id = Auth::id();
        $new_post->title = $requested_data['title'];
        $new_post->content = $requested_data['content'];

        //$post->image = $path;

        if (isset($requested_data['image'])) {
        $path = $request->file('image')->store('images', 'public');
        $new_post->image = $path;
        }

        $new_post->save();
        //dd($new_post->user->email);
        Mail::to($new_post->user->email)->send(new SendNewMail);

        return redirect()->route('posts.show', $new_post);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)

    {
      $user = Auth::user();
      return view('admin.posts.show', compact('post', 'user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $user = Auth::user();
        return view('admin.posts.edit', compact('post', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $request->validate($this->validationData());

      if (!Auth::check()) {
        abort('404');
      }



      $requested_data = $request->all();
      $post->title = $requested_data['title'];
      $post->content = $requested_data['content'];
      $post->user_id = Auth::id();
      // $path = $request->file('image')->store('images', 'public');
      // $post->image = $path;

      if (isset($requested_data['image'])) {
        $path = $request->file('image')->store('images', 'public');
        $post->image = $path;

      } else {
        $post->image = '';
      }

      $post->update();

      $post->save();


      return redirect()->route('posts.show', $post);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();
      return redirect()->route('admin.posts.index');
    }

    public function validationData() {
      return [
        'title' => 'required|max:255',
        'content' => 'required|max:600',
        'image' => 'image',
      ];
    }
}
