<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = Menu::latest()->take(6)->get();
        $totalMenu = Menu::count();

        return view('dashboard', compact('menus','totalMenu'));
    }
}