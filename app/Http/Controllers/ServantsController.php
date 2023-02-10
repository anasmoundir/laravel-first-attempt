<?php

namespace App\Http\Controllers;

use App\Models\Servants;
use App\Http\Requests\StoreServantsRequest;
use App\Http\Requests\UpdateServantsRequest;

class ServantsController extends Controller
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
     * @param  \App\Http\Requests\StoreServantsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServantsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function show(Servants $servants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function edit(Servants $servants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServantsRequest  $request
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServantsRequest $request, Servants $servants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servants $servants)
    {
        //
    }
}
