<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'video' => Artikel::where('kategori', 'video')->first(),
            'berita' => Artikel::where('kategori', 'berita')->limit(10)->get(),
            'review' => Review::all(),
        ]; 
        
        return view('page.home.index', compact('data'));
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
            'video' => Artikel::where('kategori', 'profile')->first(),
        ]; 
        
        return view('page.home.profile', compact('data'));
    }

    public function pengumuman()
    {
        $data = [
            'title' => 'Pengumuman',
            'video' => Artikel::where('kategori', 'pengumuman')->first(),
        ]; 
        
        return view('page.home.pengumuman', compact('data'));
    }

    public function tentangkami()
    {
        $data = [
            'title' => 'Tentang Kami',
            'video' => Artikel::where('kategori', 'tentang_kami')->first(),
        ]; 
        
        return view('page.home.tentangkami', compact('data'));
    }

    public function hubungikami()
    {
        $data = [
            'title' => 'Hubungi Kami',
            'video' => Artikel::where('kategori', 'hubungi_kami')->first(),
        ]; 
        
        return view('page.home.hubungikami', compact('data'));
    }
}
