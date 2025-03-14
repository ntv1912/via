<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('categories')->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        if($categories->isEmpty()) {
            $categories = [];
        }
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'thumbnail' => 'required|image',
            'description' => 'required',
            'content' => 'required',
        ]);

        $post = Post::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'thumbnail' => $request->file('thumbnail')->store('images', 'public'),
            'description' => $request->description,
            'content' => $request->content,
        ]);

        $post->categories()->attach($request->categories);
        return redirect()->route('posts.index');
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        if($categories->isEmpty()) {
            $categories = [];
        }
        return view('posts.edit', compact('post', 'categories'));
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Xóa thành công!');
    }
}

