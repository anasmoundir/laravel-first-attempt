<?php

namespace App\Http\Controllers;

use Dotenv\Util\Str;
use App\Models\Table;
// use Illuminate\Support\str;
use Illuminate\Support\Collection;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use Illuminate\Console\View\Components\Task;
use Illuminate\Pagination\LengthAwarePaginator;

class TableController extends Controller
{


    public function __construct()
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

        $tables = Table::all();

        return view('managements.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("managements.tables.create")
            ->with([
                "tables" => table::paginate(5)
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTableRequest $request, Table $table)
    {
        //validation
        $this->validate($request, [
            "name" => "required|unique:tables,name," . $table->id,
            "status" => "required|boolean"
        ]);

        $name = $request->name;
        Table::create([
            "name" => $name,
            "slug" => Str::slug($name),
            "status" => $request->status
        ]);
        return redirect()->route("tables.index")->with([
            "success" => "table Ajoute avec success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view("managements.tables.edit")->with([
            "table" => $table
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTableRequest  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        $this->validate(
            $request,
            [
                "name" => "required|unique:tables,name," . $table->id . ",id",
                "status" => "required |boolean"
            ]
        );
        $name = $request->name;
        $table->update([
            "name" => $name,
            "slug" => Str::slug($name),
            "status" => $request->status,
        ]);
        return redirect()->route("tables.index")->with([
            "success" => "table modifie avec success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->route("tables.index")->with([
            "success" => "table supprime  avec success"
        ]);
    }
}
