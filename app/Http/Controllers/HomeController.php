<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Activity;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Review;
use App\Models\SocialMedia;
use App\Models\Teacher;
use App\Models\Video;
use Illuminate\Support\Facades\Response;

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
        
        return view('page.home.index', compact('data'));
    }

    public function kepalasekolah()
    {
        $data = [
            'title' => 'Profile',
        ]; 
        
        return view('page.home.kepalasekolah', compact('data'));
    }

    public function pengumuman()
    {
        $activities = Activity::all();
        $data = [
            'title' => 'Pengumuman',
            'content' => $activities->isEmpty() ? null : $activities,
            'category' => Category::all(),
        ]; 
        
        return view('page.home.pengumuman', compact('data'));
    }

    public function tentangkami()
    {
        $data = [
            'title' => 'Tentang Kami',
        ]; 
        
        return view('page.home.tentangkami', compact('data'));
    }

    public function hubungikami()
    {
        $data = [
            'title' => 'Hubungi Kami',
        ]; 
        
        return view('page.home.hubungikami', compact('data'));
    }

    public function guru()
    {
        $data = [
            'title' => 'Guru',
            'content' => Teacher::all(),
        ]; 
        
        return view('page.home.guru', compact('data'));
    }

    public function tatatertib()
    {
        $data = [
            'title' => 'Tata Tertib',
        ]; 
        
        return view('page.home.tatatertib', compact('data'));
    }

    public function fasilitas()
    {
        $category = Category::where('nama', 'Fasilitas')->first();
        $data = [
            'title' => 'Fasilitas',
            'content' => $category === null ? null : Gallery::with('category')->where('id_categori', $category->id)->get(),
        ]; 
        
        return view('page.home.fasilitas', compact('data'));
    }

    public function gallery()
    {
        $data = [
            'title' => 'Gallery',
            'content' => Gallery::all(),
        ]; 
        
        return view('page.home.gallery', compact('data'));
    }

    public function getSocialMedia()
    {
        $socialmedia = SocialMedia::all();

        if ($socialmedia->isEmpty()) {
            return Response::json(['message' => 'No data found!', 'code' => 404]);
        } 

        return Response::json(['data' => $socialmedia, 'code' => 200]);
    }
    
    public function getCategoryById($id)
    {
        $artikel = Artikel::with('category')->where('id_categori', $id)->get();
        $data = [
            'title' => 'Category',
            'content' => $artikel->isEmpty() ? null : $artikel,
            'category' => Category::all(),
        ];

        return view('page.home.category', compact('data'));
    }
}
