<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:25|max:1000',
            'tags' => 'required|min:3|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);

        Post::create([
            'content' => $request->content,
            'tags' => $request['tags'],
            'image' => isset($request['image']) ? uploadImage($request['image']) : "default_user.jpg",
            'user_id' => Auth::user()->id

        ]);

        return redirect()->route('home')->with('message', 'Message crée avec succès');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post/edit', ['post' => $post]);
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
        $this->authorize('update', $post);

        $request->validate([
            'content' => 'required|min:25|max:1000',
            'tags' => 'required|min:3|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $post->content = $request->input('content');
        $post->image = isset($request['image']) ? uploadImage($request['image']) : $post->image;
        $post->tags = $request->input('tags');

        $post->save();



        return redirect()->route('home')->with('message', 'Message a bien été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();

        return redirect()->route('home')->with('message', 'suppression réussie');
    }


    public function search(request $request)
    {
        $request->validate([

            'search' => 'required|min:3|max:20',

        ]);

        $search = $request->input('search');
        //on va chercher les messages qui comportent cette recherche
        //dans leur tags et / ou dans leur contenue

        $posts = Post::where('tags', 'like', "%$search%")
            ->orwhere('content', 'like', "%$search%")
            ->latest()->paginate(3);

        return view('home', ['posts' => $posts]);
    }
}
