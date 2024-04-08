<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => User::count(),
            'artikel' => Artikel::count(),
            'guru' => Guru::count(),
        ];
        
        return view('page.dashboard.index', compact('data'));
    }
}
