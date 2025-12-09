<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function menu()
    {
        $categories = \App\Models\Category::with(['menuItems' => function($query) {
            $query->where('is_active', true);
        }])->orderBy('sort_order')->get();

        return view('menu.index', compact('categories'));
    }
}
