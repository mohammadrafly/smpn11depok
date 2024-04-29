<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Gallery'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.gallery.index', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('GET')) {
            try{
                $perPage = $request->input('per_page', 10);
                $query = Gallery::query()->with('category');

                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('id_categori', 'like', "%$searchTerm%")
                        ->orWhere('created_at', 'like', "%$searchTerm%");
                }

                $data = $query->paginate($perPage);

                if ($data->isEmpty()) {
                    return Response::json(['message' => 'No data found!', 'code' => 404]);
                } 

                return Response::json(['data' => $data, 'code' => 200]);
            } catch (\Exception $e) {
                return Response::json(['message' => 'Error occurred while fetching data!', 'code' => 500]);
            }
        }
    }

    public function create(Request $request)
    {
        $data = [
            'title' => 'Tambah Gallery',
            'category' => Category::all(),
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.gallery.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'id_categori' => 'required',
                'img' => 'img|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'id_categori' => $request->id_categori,
                'img' => null,
            ];
            
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $imageName = time().'.'.$img->getClientOriginalExtension();
                $data['img'] = $imageName;
                $img->storeAs('public/gallery', $imageName);
            }
            
            $create = Gallery::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => Gallery::with('category')->find($id),
            'title'=> 'Update Gallery',
            'category' => Category::all(),
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.gallery.create', compact('data'));
        }
        
        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'id_categori' => 'required',
            'img' => 'img|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        if ($request->hasFile('image')) {
            if ($data['content']->img) {
                Storage::delete('public/gallery/' . $data['content']->img);
            }

            $img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();
            $img->storeAs('public/gallery', $imageName);
            $data['content']->img = $imageName;
        }

        $data['content']->update($request->only(['id_categori']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = Gallery::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();
        Storage::delete('public/gallery/' . $data->img);

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
