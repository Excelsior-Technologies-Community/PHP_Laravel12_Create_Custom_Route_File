<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomController extends Controller
{
    /**
     * Show Homepage (from custom route file)
     */
    public function index()
    {
        return view('custom.index');
    }

    /**
     * Show About Page
     */
    public function about()
    {
        return view('custom.about');
    }

    /**
     * Show Contact Page
     */
    public function contact()
    {
        return view('custom.contact');
    }
}
