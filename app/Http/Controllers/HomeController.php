<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Lists;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::withCount('lists')->get();
        $featuredLists = Lists::with('category')->latest()->take(6)->get();
        $totalUmkm = Lists::count();

        return view('frontend.home', compact('categories', 'featuredLists', 'totalUmkm'));
    }

    public function category($id, Request $request)
    {
        $category = Categories::findOrFail($id);
        $query = $request->get('search');

        $lists = Lists::where('id_categories', $id)
                     ->with('category')
                     ->when($query, function ($q) use ($query) {
                         return $q->where('nama', 'like', '%' . $query . '%')
                                 ->orWhere('desc', 'like', '%' . $query . '%')
                                 ->orWhere('products', 'like', '%' . $query . '%');
                     })
                     ->paginate(12);

        return view('frontend.category', compact('category', 'lists'));
    }

    public function detail($id)
    {
        $umkm = Lists::with('category')->findOrFail($id);
        $relatedUmkm = Lists::where('id_categories', $umkm->id_categories)
                            ->where('id', '!=', $umkm->id)
                            ->take(4)
                            ->get();

        return view('frontend.detail', compact('umkm', 'relatedUmkm'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $categoryId = $request->get('category');

        $lists = Lists::with('category')
                     ->when($query, function ($q) use ($query) {
                         return $q->where('nama', 'like', '%' . $query . '%')
                                 ->orWhere('desc', 'like', '%' . $query . '%')
                                 ->orWhere('products', 'like', '%' . $query . '%');
                     })
                     ->when($categoryId, function ($q) use ($categoryId) {
                         return $q->where('id_categories', $categoryId);
                     })
                     ->paginate(12);

        $categories = Categories::all();

        return view('frontend.search', compact('lists', 'categories', 'query', 'categoryId'));
    }

    public function allUmkm(Request $request)
    {
        $query = $request->get('search');
        $categoryId = $request->get('category');

        $lists = Lists::with('category')
                     ->when($query, function ($q) use ($query) {
                         return $q->where('nama', 'like', '%' . $query . '%')
                                 ->orWhere('desc', 'like', '%' . $query . '%')
                                 ->orWhere('products', 'like', '%' . $query . '%');
                     })
                     ->when($categoryId, function ($q) use ($categoryId) {
                         return $q->where('id_categories', $categoryId);
                     })
                     ->paginate(12);

        $categories = Categories::all();

        return view('frontend.all-umkm', compact('lists', 'categories'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function kontak()
    {
        return view('frontend.kontak');
    }
}
