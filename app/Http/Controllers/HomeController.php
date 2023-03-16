<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->only('index');
        $this->middleware('auth')->only('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
    

        $posts = Post::latest()->paginate(5);
        return view('home', compact('posts'));
    }


    public function index(){

        return view('index');
    }


public function politique(){
    
    return view('politique');
}

}






