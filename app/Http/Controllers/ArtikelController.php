<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Artikel'
        ];
    
        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.artikel.index', compact('data'));
        }
    
        if ($request->ajax() && $request->isMethod('GET')) {
            try {
                $perPage = $request->input('per_page', 10);
                $query = Artikel::query();
        
                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('title', 'like', "%$searchTerm%")
                          ->orWhere('kategori', 'like', "%$searchTerm%")
                          ->orWhere('author', 'like', "%$searchTerm%")
                          ->orWhere('created_at', 'like', "%$searchTerm%");
                }
                
                $articles = $query->paginate($perPage);

                if ($articles->isEmpty()) {
                    return Response::json(['message' => 'No data found!', 'code' => 404]);
                } 
        
                return Response::json(['data' => $articles, 'code' => 200]);
            } catch (\Exception $e) {
                return Response::json(['message' => 'Error occurred while fetching data!', 'code' => 500]);
            }
        }
    }

    public function create(Request $request)
    {
        $data = [
            'title' => 'Tambah Artikel'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.artikel.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'content' => 'required',
                'kategori' => 'required',
                'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'title' => $request->title,
                'content' => $request->content,
                'kategori' => $request->kategori,
                'author' => Auth::user()->id,
                'img' => null,
            ];
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $data['img'] = $imageName;
                $image->storeAs('public/foto_artikel', $imageName);
            }
            
            $create = Artikel::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => Artikel::find($id),
            'title' => 'Update Artikel',
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.artikel.create', compact('data'));
        }

        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'kategori' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        if ($request->hasFile('image')) {
            if ($data['content']->img) {
                Storage::delete('dpublic/foto_artikel/' . $data['content']->img);
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/foto_artikel', $imageName);
            $data['content']->img = $imageName;
        }

        $data['content']->update($request->only(['title', 'content', 'kategori']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = Artikel::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();
        Storage::delete('public/foto_artikel/' . $data->img);

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }

    public function artikelSingle($id)
    {
        $data = [
            'title' => 'Berita',
            'content' => Artikel::with('user')->find($id),
        ];

        return view('page.home.artikel.singleArtikel', compact('data'));
    }
}
