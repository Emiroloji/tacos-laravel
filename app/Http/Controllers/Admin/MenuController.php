<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::with('category')->latest()->get();
        return view('admin.menu.index', compact('menuItems'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.menu.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')->store('menu-images', 'public');
        }
        $validated['is_active'] = $request->has('is_active');

        MenuItem::create($validated);

        return redirect()->route('admin.menu.index')->with('success', 'Menu Item created successfully.');
    }

    public function edit(MenuItem $menu)
    {
        $categories = Category::all();
        return view('admin.menu.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, MenuItem $menu)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean', // In update forms, unchecked checkbox often means not present, so default fallback handled by logic
        ]);

        // Fix logic for checkbox: if not present in request but we are updating, it means false?
        // Usually yes. Laravel validation boolean handles "1", "true", "on", "yes".
        // But if field is missing, validate might fail or succeed depending if it's required. It's not required here.
        // Better logic below:
        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
             if ($menu->image_path) {
                 Storage::disk('public')->delete($menu->image_path);
             }
            $validated['image_path'] = $request->file('image')->store('menu-images', 'public');
        }

        $menu->update($validated);

        return redirect()->route('admin.menu.index')->with('success', 'Menu Item updated successfully.');
    }

    public function destroy(MenuItem $menu)
    {
        if ($menu->image_path) {
            Storage::disk('public')->delete($menu->image_path);
        }
        $menu->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu Item deleted successfully.');
    }
}
