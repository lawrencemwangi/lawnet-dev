<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function admin_dashboard()
    {
        $count_messages = Message::all()->count();
        $count_categories = Category::all()->count();
        $count_users = User::all()->count();


        return view('admin/dashboard', compact(
            'count_messages',
            'count_categories',
            'count_users'
        ));
    }

}
