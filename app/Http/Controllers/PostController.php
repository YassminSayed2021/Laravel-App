<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();       //select * from posts;
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.insert');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->post_title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        $post->save();
        return back()->with('success', 'post Add Successfully');
        return redirect()->route('posts')->with('success', 'post Add Successfully');
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, string $id)
    {
        post::where('id', $id)->update([
            'post_title' => $request->post_title,
            'content' => $request->content
        ]);     //update table post set post_name=$request where postid=$id
        //return response('post Updated Succ');
        return redirect('/posts');
    }

    public function show(string $id)
    {
        $post = post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        post::where('id', $id)->delete();        //delete from posts where id=$id
        return redirect('/posts');
    }
    public function deleteCust(string $id)
    {
        post::findOrFail($id)->delete();
        return redirect('/posts');
    }

    public function user_posts(string $id)
    {
        $user_posts = User::find($id)->posts;
        return view('posts.user_posts', compact('user_posts'));
    }
}
