<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){

$users = User::with('role')->get();
$posts =Post::all();

        return view('admin/index', [
            
        'users' => $users,
        'posts' => $posts,

        
        ]);
    }

    
}
