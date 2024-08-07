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
        $blogs = Blog::get()->all();
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
            'category_id' => 'nullable',
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
            $imageName = $blog->slug . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('blog_images', $imageName, 'public');
            $blog->image = $imageName; 
        }

        $blog->save();

        return redirect()->route('blog.index')->with('success', [
            'message' => 'Blog Added successsfully',
            'duration' => $this->alert_message_duration,
        ]);
    }


    /**
     * Relationship between blog and categories
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $categoryId = $blog->category_id;
        $category = Category::find($categoryId);
        return view('show_blog',compact('blog','category'));
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
            'category_id' => 'nullable',
            'description' => 'required|string',
            'image' => 'nullable|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if($blog->imageName && Storage::exists($blog->imageName)){
                Storage::delete($blog->imageName);
            }

            $imageName = $blog->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $blog->image = $request->file('image')->storeAs('blog_images', $imageName, 'public');
            $validated['image'] = $imageName;
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
    
        if ($blog->image && Storage::disk('public')->exists('blog_images/' . $blog->image)) {
            Storage::disk('public')->delete('blog_images/' . $blog->image);
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', [
            'message' => 'Blog deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
