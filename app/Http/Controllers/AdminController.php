<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {

        $users = User::with('role')->get();
        $posts = Post::all();
        $comments = Comment::all();

        return view('admin/index', [

            'users' => $users,
            'posts' => $posts,
            'comments' => $comments
            

        ]);
    }
}
