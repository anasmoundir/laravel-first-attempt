<?php

namespace App\Http\Controllers;

use App\Models\Servants;
use App\Http\Requests\StoreServantsRequest;
use App\Http\Requests\UpdateServantsRequest;

class ServantsController extends Controller
{

    public function _construct()
    {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servants = Servants::all();

        return view('managements.servants.index', compact('servants'));

        // return view("managements.servants.index")->with([
        //     "servants" => Servants::paginate(4)
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        return view("managements.servants.create");
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
        $this->validate($request, [
            "name" => "required|min:3"
        ]);


        Servants::create([
            "name" => $request->name,
            "adress" => $request->adress
        ]);
        return redirect()->route("servants.index")->with([
            "success" => "table Ajoute avec success"
        ]);
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
    public function edit($id)
    {
        // dd($id);
        $var = Servants::findOrFail($id);
        return view("managements.servants.edit")->with([
            "servant" => Servants::findOrFail($id),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServantsRequest  $request
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServantsRequest $request, $id)
    {
        //
        $this->validate($request, [
            "name" => "required|min:3"
        ]);
        $servant = Servants::findOrFail($id);
        
        $servant->update([
            "name" => $request->name,
            "adress" => $request->adress
        ]);
        return redirect()->route("servants.index")->with([
            "success" => "table modifie avec success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servants  $servants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $servant = Servants::findOrFail($id);
        $servant->delete();
        return redirect()->route("servants.index")->with([
            "success" => "table supprime avec success  avec success"
        ]);
    }
}
