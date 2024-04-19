<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'video' => Artikel::where('kategori', 'video')->first(),
        ]; 
        
        return view('page.home.index', compact('data'));
    }
}
