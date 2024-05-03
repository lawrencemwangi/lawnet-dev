<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.list_blog' , compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blog.add_blog', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100|unique:blogs',
            'category_id' => 'required|nullable',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);

        $blog = new Blog;

        $blog->title = $validated['title'];
        $blog->slug = str::slug($validated['title']);
        $blog->category_id = $validated['category_id'];
        $blog->description = $validated['description'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('upload/images', $imageName);
            $blog->image = $imagePath; 

        }else{
            $blog->image = '/assets/images/default_image.png';
        }

        $blog->save();

        return redirect()->route('blog.index')->with('success', [
            'message' => 'Blog Added successsfully',
            'duration' => $this->alert_message_duration
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.update_blog', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([

        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
