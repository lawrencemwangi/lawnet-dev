<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Chat;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $user_level = Auth()->user()->$user_level;

            if($user_level==1)
            {
                return redirect()->route('admin_dashboard');
            }
            else if($user_level==2)
            {
                return redirect()->route('home');
            }
            else
            {
                return redirect()->back();
            }
        }
    }

    
    public function Homepage()
    {
        $projects = Project::get();
        return view('home', compact('projects'));
    }

    public function AboutPage()
    {
        return view('about');
    }

    public function ContactPage()
    {
        return view('contact');
    }

    public function chatpage()
    {
        return view('chat');
    }

    public function ServicePage()
    {

        $services = Service::get()->all();
        $categories = []; 
        foreach ($services as $service) {
            $categoryId = $service->category_id; 
            $category = Category::find($categoryId); 

            // Store the category information in the $categories array
            $categories[$service->id] = $category;
        }
    
        return view('service', compact('services','categories'));
    }

    public function BlogPage()
    {
        $blogs = Blog::get()->all();
        
        $categories = []; 
        foreach ($blogs as $blog) {
            $categoryId = $blog->category_id; 
            $category = Category::find($categoryId); 

            // Store the category information in the $categories array
            $categories[$blog->id] = $category;
        }
    
        return view('blog', compact('blogs','categories'));
    }

  

}
