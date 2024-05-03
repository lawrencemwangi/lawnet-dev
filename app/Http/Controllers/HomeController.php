<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Blog;

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
        $projects = Project::all();
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

    public function ServicePage()
    {
        return view('service');
    }

    public function BlogPage()
    {
        $blogs = Blog::get()->all();
        return view('blog', compact('blogs'));
    }

}
