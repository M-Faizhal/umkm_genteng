<?php

namespace App\Http\Controllers;

use App\Models\Lists;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'ig_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'img_lists.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('img_lists');

        // Handle multiple file uploads
        if ($request->hasFile('img_lists')) {
            $imageFields = ['img_lists', 'img_lists_2', 'img_lists_3', 'img_lists_4'];
            $uploadedFiles = $request->file('img_lists');

            // Ensure $uploadedFiles is an array
            if (!is_array($uploadedFiles)) {
                $uploadedFiles = [$uploadedFiles];
            }

            foreach ($uploadedFiles as $index => $file) {
                if ($file && $index < 4) {
                    $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('uploads/umkm', $filename, 'public');
                    $data[$imageFields[$index]] = $filePath;
                }
            }
        }

        Lists::create($data);

        return redirect()->route('admin.lists.index')->with('success', 'List created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lists $list)
    {
        $list->load('category');
        return view('admin.lists.show', ['list' => $list]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lists $list)
    {
        $categories = Categories::all();
        return view('admin.lists.edit', ['list' => $list, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lists $list)
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
            'ig_url' => 'nullable|url|max:255',
            'tiktok_url' => 'nullable|url|max:255',
            'img_lists.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('img_lists');

        // Handle multiple file uploads
        if ($request->hasFile('img_lists')) {
            $imageFields = ['img_lists', 'img_lists_2', 'img_lists_3', 'img_lists_4'];
            $uploadedFiles = $request->file('img_lists');

            // Ensure $uploadedFiles is an array
            if (!is_array($uploadedFiles)) {
                $uploadedFiles = [$uploadedFiles];
            }

            // Delete old images that will be replaced
            foreach ($uploadedFiles as $index => $file) {
                if ($file && $index < 4) {
                    $fieldName = $imageFields[$index];
                    if ($list->$fieldName && Storage::disk('public')->exists($list->$fieldName)) {
                        Storage::disk('public')->delete($list->$fieldName);
                    }

                    $filename = time() . '_' . $index . '_' . $file->getClientOriginalName();
                    $filePath = $file->storeAs('uploads/umkm', $filename, 'public');
                    $data[$fieldName] = $filePath;
                }
            }        }

        $list->update($data);

        return redirect()->route('admin.lists.index')->with('success', 'List updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */    public function destroy(Lists $list)
    {
        // Delete all image files if they exist
        $imageFields = ['img_lists', 'img_lists_2', 'img_lists_3', 'img_lists_4'];
        foreach ($imageFields as $field) {
            if ($list->$field && Storage::disk('public')->exists($list->$field)) {
                Storage::disk('public')->delete($list->$field);
            }
        }

        $list->delete();
        return redirect()->route('admin.lists.index')->with('success', 'List deleted successfully.');
    }
}
