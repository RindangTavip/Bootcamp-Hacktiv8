<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function index()
    {
        return view('edit', ['title' => 'Edit']);
    }
}