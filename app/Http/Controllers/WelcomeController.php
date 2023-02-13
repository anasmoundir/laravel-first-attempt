<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{

    public function index()
    {
        $menus = Menu::with('category')->get();
        return view('/welcome', compact('menus'));
    }
}
