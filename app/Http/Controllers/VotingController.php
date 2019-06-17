<?php

namespace App\Http\Controllers;

use App\voting;
use Illuminate\Http\Request;

class VotingController extends Controller
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
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function show(voting $voting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function edit(voting $voting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voting $voting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\voting  $voting
     * @return \Illuminate\Http\Response
     */
    public function destroy(voting $voting)
    {
        //
    }

    public function like($x)
    {
        $msg = "This is a like message.";
        return response()->json(array('msg'=> $msg), 200);
    }

    public function unlike($x)
    {
        $msg = "This is a unlike message.";
        return response()->json(array('msg'=> $msg), 200);
    }
}
