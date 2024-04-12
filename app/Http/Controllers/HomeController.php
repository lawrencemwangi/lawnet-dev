<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
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
        return view('blog');
    }

}
