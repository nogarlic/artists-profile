<?php

namespace App\Http\Controllers;

use App\Models\MemberProfile;
use App\Models\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $title = '';
        $id = 0;
        if (request('member')) {
            $member_profile = MemberProfile::firstWhere('name', request('member'));
            $title = $member_profile->name . " ";
            $id = $member_profile->id;
        }

        return view('gallery', [
            "title" => "Multimedia " . $title,
            // "photos" => Photo::latest()->get(),
            "photos" => Photo::where('member_profile_id', $id)->paginate(3)->withQueryString(),
            "members" => MemberProfile::all()
        ]);
    }

    // public function show(Post $post) 
    // {
    //     return view('post', [
    //         "title" => "Single Post",
    //         "post" => $post,
    //         "active" => "posts"
    //     ]);
    // }
}
