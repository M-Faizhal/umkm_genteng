<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\Categories;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Lists::with('category')->paginate(10);
        return view('admin.lists.index', compact('lists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.lists.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_categories' => 'required|exists:categories,id',
            'nama' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telp' => 'nullable|string|max:20',
            'owner' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'full_desc' => 'nullable|string',
            'about' => 'nullable|string',
            'products' => 'nullable|string',
            'op_hour' => 'nullable|string|max:255',
            'img_lists' => 'nullable|string|max:255'
        ]);

        Lists::create($request->all());

        return redirect()->route('admin.lists.index')->with('success', 'List created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lists $lists)
    {
        $lists->load('category');
        return view('admin.lists.show', compact('lists'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lists $lists)
    {
        $categories = Categories::all();
        return view('admin.lists.edit', compact('lists', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lists $lists)
    {
        $request->validate([
            'id_categories' => 'required|exists:categories,id',
            'nama' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telp' => 'nullable|string|max:20',
            'owner' => 'nullable|string|max:255',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'full_desc' => 'nullable|string',
            'about' => 'nullable|string',
            'products' => 'nullable|string',
            'op_hour' => 'nullable|string|max:255',
            'img_lists' => 'nullable|string|max:255'
        ]);

        $lists->update($request->all());

        return redirect()->route('admin.lists.index')->with('success', 'List updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lists $lists)
    {
        $lists->delete();
        return redirect()->route('admin.lists.index')->with('success', 'List deleted successfully.');
    }
}
