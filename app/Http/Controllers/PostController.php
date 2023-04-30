<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function viewSinglePost(Post $post) {
        //$ourHTML = Str::markdown($post->body);
        $post['body'] = strip_tags(Str::markdown($post->body), "<p><ul><ol><li><strong><em><h3><br>");
        return view('one-post', ['post' => $post]);
    }
    public function newPost(Request $request) {
        $dataMasuk = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $dataMasuk['title'] = strip_tags($dataMasuk['title']);
        $dataMasuk['body'] = strip_tags($dataMasuk['body']);
        $dataMasuk['user_id'] = auth()->id();
        Post::create($dataMasuk);

        $postBaru = Post::create($dataMasuk);

        return redirect("/post/{$postBaru->id}")->with('success', 'New Post Successfully Created!');
    }
    public function showCreateForm() {
        return view ('create-post');
    }
}
