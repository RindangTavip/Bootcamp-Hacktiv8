<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', ['title' => 'Login Page']);
    }
}