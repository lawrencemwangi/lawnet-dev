<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.services.list_category', compact('categories') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:80|unique:categories',
        ]);

        $validated['title'] = str::lower($validated['title']);
        $validated['slug'] = str::slug($validated['title']);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', [
            'message' => 'Category added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.services.update_category', compact('category') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:80|unique:categories,title,' . $category->id,
        ]);

        $validated['title'] = str::lower($validated['title']);
        $validated['slug'] = str::slug($validated['title']);

        $category->update($validated);  
        
        return redirect()->route('category.index')->with('success',[
            'message' => 'Category updated successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success',[
            'message' => 'Category deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
