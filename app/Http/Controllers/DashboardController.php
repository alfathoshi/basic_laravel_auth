<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pass data user ke view
        return view('dashboard.index', compact('user'));
    }

}
