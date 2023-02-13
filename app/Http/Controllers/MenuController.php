<?php

namespace App\Http\Controllers;


use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
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
        return view("managements.menus.index")->with([
            "menus" => Menu::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("managements.menus.create")->with([
            "categories" => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMenuRequest $request)
    {
        $this->validate($request, [
            "title" => "required|min:3|unique:menus,title",
            "description" => "required|min:5",
            "image" => "required|image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric"
        ]);
        // dd($request->all());
        if ($request->hasFile("image")) {
            $file = $request->image;
            $imageName = time() . "" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);


            $title = $request->title;
            Menu::create([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" => $request->description,
                "price" => $request->price,
                "category_id" => $request->category_id,
                "image" => $imageName,
            ]);
            return redirect()->route("menus.index")->with([
                "success" => "categorie Ajoute avec success"
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view("managements.menus.create")->with([
            "menus" => Menu::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view("managements.menus.edit")->with([
            "categories" => Category::all(),
            "menu" => $menu

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $this->validate($request, [
            "title" => "required|min:3",
            "description" => "required|min:5",
            "image" => "image|mimes:png,jpg,jpeg|max:2048",
            "price" => "required|numeric",
            "category_id" => "required|numeric"
        ]);

        if ($request->hasFile("image")) {
            unlink(public_path('images/menus/' . $menu->image));
            $file = $request->image;
            $imageName = time() . "" . $file->getClientOriginalName();
            $file->move(public_path('images/menus'), $imageName);


            $title = $request->title;
            $menu->update([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" => $request->description,
                "price" => $request->price,
                "category_id" => $request->category_id,
                "image" => $imageName,
            ]);
            return redirect()->route("menus.index")->with([
                "success" => "menu modifie avec success"
            ]);
        } else {
            $title = $request->title;
            $menu->update([
                "title" => $title,
                "slug" => Str::slug($title),
                "description" => $request->description,
                "price" => $request->price,
                "category_id" => $request->category_id,
            ]);
            return redirect()->route("menus.index")->with([
                "success" => "menue modifie avec success"
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
        if (file_exists(public_path('images/menus/' . $menu->image))) {
            unlink(public_path('images/menus/' . $menu->image));
        }
        $menu->delete();
        return redirect()->route("menus.index")->with([
            "success" => "menue supprime avec success"
        ]);
    }
}
