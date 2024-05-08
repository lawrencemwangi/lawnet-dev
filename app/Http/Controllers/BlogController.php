<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $imagePath = $image->storeAs('blog_images', $imageName, 'public');
            $blog->image = $imagePath; 
        }

        $blog->save();

        return redirect()->route('blog.index')->with('success', [
            'message' => 'Blog Added successsfully',
            'duration' => $this->alert_message_duration,
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
        $categories = Category::get()->all();
        return view('admin.blog.update_blog', compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|nullable',
            'description' => 'required|string',
            'image' => 'nullable|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('blog_images', $imageName, 'public');

            if (Storage::exists($blog->image)) {
                Storage::delete($blog->image);
            }
    
            $validated['image'] = 'blog_images/' . $imageName;

            $blog->image = $imagePath; 
        }
    

        $validated['slug'] = str::slug($validated['title']);

        $blog->update($validated);

        return redirect()->route('blog.index')->with('success', [
            'message' => 'Blog updated successfully',
            'duration' =>$this->alert_message_duration,
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
