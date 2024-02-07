<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class InputController extends Controller
{
    public function index()
    {
        return view('input', ['title' => 'Input']);
    }
}