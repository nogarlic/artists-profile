<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Cog\Laravel\Love\ReactionType\Models\ReactionType;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->where('user_id', '!=', Auth::user()->id)->paginate(25)->withQueryString();
        return view('dashboard.home', [
            'title' => 'Home',
            'posts' => $posts
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('dashboard.home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'body' => 'required|max:255',
            'image' => 'image|file|max:1024',
        ]);

        if($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['category_id'] = 1;
        $validateData['upvote'] = 0;
        $validateData['downvote'] = 0;

        Post::create($validateData);

        return redirect('/'.auth()->user()->username)->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Post $post)
    {
        return view('dashboard.post', [
            'post' => $post,
            'title' => Auth::user()->name . 'Post'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.post.edit', [
            'post' => $post,
            'title' => 'Edit Post'
            // 'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        $validateData['user_id'] = auth()->user()->id;
        $validateData['category_id'] = $post->id;
        $validateData['upvote'] = $post->upvote;
        $validateData['downvote'] = $post->downvote;

        Post::where('id', $post->id)
            ->update($validateData);

        return redirect('posts/'.$post->id)->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // dump($post);
        Post::destroy($post->id);

        if($post->image) {
            Storage::delete($post->image);
        }

        return redirect('/'.auth()->user()->username)->with('success', 'Post has been deleted!');
    }

    public function likePost(Request $request)
    {
        $post_id = $request['postId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;

        $post = Post::find($post_id);
        if(!$post) {
            return null;
        }
        $user = Auth::user();
        $like = $user->likes->where('post_id', $post_id)->first();
        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->post_id = $post_id;

        if ($update) {
            $like->update();
        } else {
            $like->save();
        }
    }

}


//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Post  $post
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Post $post)
//     {
//         return view('dashboard.posts.edit', [
//             'post' => $post,
//             'categories' => Category::all()
//         ]);
//     }



