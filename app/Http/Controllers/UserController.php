<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('dashboard.profile.edit', [
            'user' => $user,
            'posts' => $user->posts,
            'title' => 'Edit Profile'
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
    public function update(Request $request, User $user)
    {
        $rules = [
            'header_photo' => 'image|file|max:1024',
            'photo_profile' => 'image|file|max:1024',
            'name' => 'required',
            'username' =>['required','min:3','max:255'],
            'bio' => 'max:2555'
        ];

        $validateData = $request->validate($rules);

        if($request->file('header_photo')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['header_photo'] = $request->file('header_photo')->store('post-images');
        }

        if($request->file('photo_profile')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['photo_profile'] = $request->file('photo_profile')->store('post-images');
        }


        User::where('id', $user->id)
            ->update($validateData);

        return redirect('/forum')->with('success', 'Profile has been updated!');
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
