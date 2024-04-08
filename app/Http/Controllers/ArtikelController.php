<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
            $perPage = $request->input('per_page', 10);
            $query = Artikel::query();

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $query->where('title', 'like', "%$searchTerm%")
                      ->orWhere('kategori', 'like', "%$searchTerm%")
                      ->orWhere('author', 'like', "%$searchTerm%")
                      ->orWhere('created_at', 'like', "%$searchTerm%");
            }

            $data = $query->paginate($perPage);

            if ($data->isEmpty()) {
                return Response::json(['message' => 'No data found!', 'code' => 404]);
            } 

            return Response::json(['data' => $data, 'code' => 200]);
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'mata_pelajaran' => 'required|string|max:255',
                'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('foto_artikel', $imageName); 
            
            $data = Artikel::create([
                'nama' => $request->nama,
                'mata_pelajaran' => $request->mata_pelajaran,
                'img' => $imageName,
            ]);
    
            if (!$data) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Artikel::find($id);
        
        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        if ($request->hasFile('img')) {
            if ($data->img) {
                Storage::delete('foto_artikel/' . $data->img);
            }

            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('foto_artikel', $imageName);
            $data->img = $imageName;
        }

        $data->update($request->only(['nama', 'mata_pelajaran']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = Artikel::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();
        Storage::delete('foto_artikel/' . $data->img);

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
