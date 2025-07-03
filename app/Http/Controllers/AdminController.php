<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Lists;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCategories = Categories::count();
        $totalLists = Lists::count();
        $totalUsers = User::count();
        $recentLists = Lists::with('category')->latest()->take(5)->get();

        return view('admin.dashboard', compact('totalCategories', 'totalLists', 'totalUsers', 'recentLists'));
    }

    public function categories()
    {
        $categories = Categories::withCount('lists')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function lists()
    {
        $lists = Lists::with('category')->paginate(10);
        return view('admin.lists.index', compact('lists'));
    }

    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }
}
