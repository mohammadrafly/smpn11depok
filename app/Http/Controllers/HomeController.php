<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Activity;
use App\Models\Page;
use App\Models\Review;
use App\Models\Video;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'video' => Video::limit(1)->first(),
            'berita' => Artikel::limit(10)->get(),
            'review' => Review::all(),
            'activity' => Activity::all(),
        ]; 
        
        //dd($data);
        return view('page.home.index', compact('data'));
    }

    public function kepalasekolah()
    {
        $data = [
            'title' => 'Profile',
            'content' => Page::where('title', 'Kepala Sekolah')->first(),
        ]; 
        
        //dd($data);
        return view('page.home.profile', compact('data'));
    }

    public function pengumuman()
    {
        $data = [
            'title' => 'Pengumuman',
            'content' => Page::where('title', 'Pengumuman')->first(),
        ]; 
        
        return view('page.home.pengumuman', compact('data'));
    }

    public function tentangkami()
    {
        $data = [
            'title' => 'Tentang Kami',
            'content' => Page::where('title', 'Tentang Kami')->first(),
        ]; 
        
        return view('page.home.tentangkami', compact('data'));
    }

    public function hubungikami()
    {
        $data = [
            'title' => 'Hubungi Kami',
            'content' => Page::where('title', 'Hubungi Kami')->first(),
        ]; 
        
        return view('page.home.hubungikami', compact('data'));
    }
}
