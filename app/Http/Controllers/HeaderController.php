<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HeaderController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Header',
            'content' => Header::limit(1)->get(),
        ];
    
        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.header.index', compact('data'));
        }
    
        if ($request->ajax() && $request->isMethod('GET')) {
            try {
                $perPage = $request->input('per_page', 10);
                $query = Header::query();
        
                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('img', 'like', "%$searchTerm%")
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
            'title' => 'Tambah Header'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.header.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'img' => 'image|mimes:png|max:2048',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'img' => null,
            ];
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $data['img'] = $imageName;
                $image->storeAs('public/header/', $imageName);
            }
            
            $create = Header::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'title' => 'Update',
            'content' => Header::find($id),
        ];

        if (!$data['content']) {
            return Response::json(['message' => 'Header not found!', 'code' => 404]);
        }
    
        if ($request->isMethod('GET')) {
            return view('page.dashboard.header.create', compact('data'));
        }
        
        $validator = Validator::make($request->all(), [
            'img' => 'image|mimes:png|max:2048',
        ]);
    
        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }
    
        if ($data['content']->img) {
            Storage::delete('public/header/' . $data['content']->img);
        }

        $image = $request->file('image');
        $imageName = 'header.'.$image->getClientOriginalExtension();
        $image->storeAs('public/header', $imageName);

        $data['content']->img = $imageName;
        $data['content']->save();

        return Response::json(['message' => 'Image updated successfully', 'code' => 200]);
    }    

    public function destroy($id)
    {
        $data = Header::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();
        Storage::delete('public/header/' . $data->img);

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
