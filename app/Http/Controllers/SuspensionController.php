<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuspensionController extends Controller
{
    public function suspensionPage()
    {
        return view('suspension');
    }
}
