<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class Product extends Controller
{
    function index()
    {
        return view('sections.product');
    }

}
