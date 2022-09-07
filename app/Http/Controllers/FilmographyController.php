<?php

namespace App\Http\Controllers;

use App\Models\Filmography;
use App\Http\Requests\StoreFilmographyRequest;
use App\Http\Requests\UpdateFilmographyRequest;

class FilmographyController extends Controller
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
     * @param  \App\Http\Requests\StoreFilmographyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmographyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Filmography  $filmography
     * @return \Illuminate\Http\Response
     */
    public function show(Filmography $filmography)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Filmography  $filmography
     * @return \Illuminate\Http\Response
     */
    public function edit(Filmography $filmography)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFilmographyRequest  $request
     * @param  \App\Models\Filmography  $filmography
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilmographyRequest $request, Filmography $filmography)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Filmography  $filmography
     * @return \Illuminate\Http\Response
     */
    public function destroy(Filmography $filmography)
    {
        //
    }
}
