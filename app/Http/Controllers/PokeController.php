<?php

namespace App\Http\Controllers;

use App\PokeUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\PersonPoked;
class PokeController extends Controller
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
     * @param  \App\Poke  $poke
     * @return \Illuminate\Http\Response
     */
    public function show(Poke $poke)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poke  $poke
     * @return \Illuminate\Http\Response
     */
    public function edit(Poke $poke)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poke  $poke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poke $poke)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poke  $poke
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poke $poke)
    {
        //
    }
    public function poke(Request $request)
    {
      $pokeRecord = new PokeUser;
      $pokeRecord->user_id = Auth::user()->id;
      $pokeRecord->poked_user_id=$request->pokee;
      $pokeRecord->save();
      broadcast(new PersonPoked($pokeRecord));
    }
}
