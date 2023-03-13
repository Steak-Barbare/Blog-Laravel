<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->get(); /*Fais remonter le derniere post créer en haut de la page(order by creatded at)*/ 

        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        $imageName = $request->image->store('posts');

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName
        ]);
        return redirect()->route('dashboard')->with('success', 'Votre post a été créé');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->with('user')->latest()->get();

        return view('post.show', compact('post', 'comments'));

        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (Gate::denies('update-post', $post)) {
            abort(403);
        }

        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $arrayUpdate = [
            'title' => $request->title,
            'content' => $request->content
        ];

        if ($request->image != null) {
            $imageName = $request->image->store('posts');


            $arrayUpdate = array_merge($arrayUpdate, [
                'image' => $imageName
            ]);
        }

        $post->update($arrayUpdate);

        return redirect()->route('dashboard')->with('success', 'Votre post a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (Gate::denies('destroy-post', $post)) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('dashboard')->with('success', 'Votre post a été supprimé');
    }
}
