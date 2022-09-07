<?php

namespace App\Http\Controllers;

use App\Models\MemberProfile;
use App\Http\Requests\StoreMemberProfileRequest;
use App\Http\Requests\UpdateMemberProfileRequest;

class MemberProfileController extends Controller
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
     * @param  \App\Http\Requests\StoreMemberProfileRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function show(MemberProfile $memberProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberProfile $memberProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberProfileRequest  $request
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberProfileRequest $request, MemberProfile $memberProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberProfile  $memberProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberProfile $memberProfile)
    {
        //
    }
}
