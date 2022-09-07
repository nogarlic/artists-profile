<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->where('user_id', '!=', Auth::user()->id)->paginate(25)->withQueryString();
        return view('dashboard.home', [
            'title' => 'Home',
            'posts' => $posts
        ]);
    }

    public function show(Post $post) 
    {
        // // dump($post);
        // $posts = Post::latest()->where('user_id', '==' ,Auth::user()->id)->paginate(25)->withQueryString();
        // return view('dashboard.home', [
        //     "title" => Auth::user()->name,
        //     "posts" => $posts,
        // ]);
    }

    public function showw(User $user) {
        // dump($user);
        // dump($user->posts);
        return view('dashboard.home', [
            "title" => $user->name,
            "posts" => $user->posts,
        ]);
    }


}
