<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Requests\StoreMenuRequest;
use App\Models\Menu;
use Illuminate\Support\str;

class CategoryController extends Controller
{





   public function __construct()
    {
        $this->middleware('auth');
    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        // return the view and pass the categories to it
        return view('managements.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("managements.categories.create")
            ->with([
                "categories" => Category::paginate(5)
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //validation
        $this->validate($request, [
            "title" => "required|min:3"
        ]);

        $title = $request->title;
        Category::create([
            "title" => $title,
            "slug" => Str::slug($title),
        ]);
        return redirect()->route("categories.index")->with([
            "success" => "categorie Ajoute avec success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("managements.categories.edit")->with([
            "category" => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->validate(
            $request,
            [
                "title" => "required"
            ]
        );
        //store the data
        $title = $request->title;

        $category->update([
            "title" => $title,
            "slug" => Str::slug($title)
        ]);

        return redirect()->route("categories.index")->with([
            "success" => "categorie modifie avec success"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("categories.index")->with([
            "success" => "categorie supprime  avec success"
        ]);
    }
}
