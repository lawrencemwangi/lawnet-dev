<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::get()->all();
        return view('admin.services.list_service', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.services.add _service', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:services',
            'category_id' => 'nullable',
            'price' => 'required|string',
            'image' => 'nullable|max:2048',
        ]);

        $service = new Service;

        $service->title = $validated['title'];
        $service->slug = str::slug($validated['title']);
        $service->category_id = $validated['category_id'];
        $service->price = $validated['price'];
        $service->description = $request->input('description', null);
        $service->discount_price = $request->input('discount_price', null);
        $service->featured = $request->input('featured', 1);
        $service->visibility = $request->input('visibility',1);
        $service->duration = $request->input('duration');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $service->slug . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('service', $imageName, 'public');
            $service->image = $imageName; 
        }
        
        $service->save();
        
        return redirect()->route('service.index')->with('success', [
            'message' => 'Service added successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categories = Category::get()->all();
        return view('admin.services.update_service', compact('categories', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required| string',
            'category_id' => 'nullable',
            'price' => 'required|string',
            'image' => 'max:2048',
        ]);

        $service->title = $request->title;
        $service->slug = Str::slug($request->title);
        $service->category_id = $request->category_id;
        $service->price = $request->price;
        $service->discount_price = $request->discount_price;
        $service->description = $request->description;
        $service->featured = $request->featured;
        $service->visibility = $request->visibility;
        $service->duration = $request->duration;

        if ($request->hasFile('image')) {

            if($service->imageName && Storage::exists($service->imageName)){
                Storage::delete($service->imageName);
            }

            $imageName = $service->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $service->image = $request->file('image')->storeAs('service', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $service->save();

        return redirect()->route('service.index')->with('success', [
            'message' => 'Service Updated Successfully',
            'duration' => $this->alert_message_duration,
        ]);
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        if ($service->image && Storage::disk('public')->exists('service/' . $service->image)) {
            Storage::disk('public')->delete('service/' . $service->image);
        }

        $service->delete();

        return redirect()->route('service.index')->with('success', [
            'message' => 'service deleted successfully',
            'duration' => $this->alert_message_duration,
        ]);
    }
}
