<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InactiveUserController extends Controller
{
    public function InactivePage(Request $request)
    {
        $message = session('message', 'No message available.');
        return view('inactive', compact('message'));
    }
}
