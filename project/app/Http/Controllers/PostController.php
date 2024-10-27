<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $posts = auth()->check() ? Post::all() : Post::where('status', 'published')->get();
    return view('posts.index', compact('posts'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function publish($id)
    {
        $post = Post::findOrFail($id);
        if (auth()->user()->hasRole('admin')) {
            $post->status = 'published';
            $post->save();
            return redirect()->route('posts.index')->with('success', 'Post published successfully.');
        }
        return redirect()->route('posts.index')->with('error', 'Unauthorized');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required',
        'content' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);

    Post::create([
        'title' => $validated['title'],
        'content' => $validated['content'],
        'category_id' => $validated['category_id'],
        'status' => 'draft', // Statut par défaut
    ]);

    if (!auth()->user()->hasRole('admin') ) {
        return redirect()->route('posts.index')->with('success', 'Post created successfully by Admin');
    }else{
        return redirect()->route('posts.index')->with('error', 'Unauthorized');

    }

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (auth()->user()->id === $post->user_id && $post->status === 'draft') {
             return view('posts.edit', compact('post'));
        }
            return redirect()->route('posts.index')->with('error', 'Unauthorized');
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
