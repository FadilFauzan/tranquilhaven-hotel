<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Room;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Cviebrock\EloquentSluggable\Services\SlugService;


class DashboardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if (auth()->guest()) {
        //     abort('403');
        // }

        $this->authorize('admin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|min:3',
            'slug' => 'required|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New category has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categories = Room::latest()->where('category_id', $category->id)->get();
        $totalRooms = Room::where('category_id', $category->id)->count();
        $totalBookedRooms = Room::where('status', 'booked')
        ->where('category_id', $category->id)
        ->count();   

        return view('dashboard.categories.rooms', [
            'categories' => $categories,
            'title' => $category->name . ' Rooms',
            'subtitle' =>' All room in category : ' . $category->name,
            'totalRooms' => $totalRooms,
            'availableRooms' => $totalRooms - $totalBookedRooms,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'slug' => 'required|unique:categories',
        ]);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New category has been added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Category has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
