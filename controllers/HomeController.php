<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\controllers;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return view('landingpage');
        }
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
