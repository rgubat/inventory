<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin_controller extends Controller
{
    function index()
    {
        return view('sections.dashboard');
    }
}
