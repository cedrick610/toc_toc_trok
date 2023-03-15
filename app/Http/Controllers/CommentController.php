<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
    
        Comment::create([
            'content' => $request['content'],
            'tags' => $request['tags'],
            'image' => isset($request['image']) ? uploadImage($request['image']) : "default_user.jpg",
            'user_id' => Auth::user()->id,
            'post_id' => $request['post_id']
    
        ]);

        return redirect()->route('home')->with('message' , 'Commentaire crée avec succès');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comment/edit' , ['comment' =>$comment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);

        $request->validate([
            'content' => 'required|min:25|max:1000',
            'tags' => 'required|min:3|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    
    
        ]);
    
        $comment->content = $request->input('content');
        $comment->image = isset($request['image']) ? uploadImage($request['image']) : $comment->image;
        $comment->tags = $request->input('tags');

        $comment->save();

        return redirect()->route('home')->with('message' , 'Le commentaire a bien été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();

        return redirect()->route('home')->with('message' , 'suppression réussie');
    }
}
