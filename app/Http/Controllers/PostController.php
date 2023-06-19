<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('index', compact('posts'));
    }

    public function create() {
        return view('create_post');
    }

    public function store() {
        $post = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'images' => '',
        ]);

        $post['user_id'] = Auth::user()->id;

        if (\request()->hasFile('images')) {
            $image = \request()->file('images');
            $imageName = \request()->file('images')->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $post['images'] = $imageName;
        }


        Post::create($post);


        return redirect()->route('posts.index');
    }

    public function show(Post $post) {
        return view('show_post', compact('post'));
    }

    public function edit(Post $post) {
        return view('edit_post', compact('post'));
    }

    public function update(Post $post) {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);
        $post->update($data);

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
