<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Category'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.category.index', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('GET')) {
            try{
                $perPage = $request->input('per_page', 10);
                $query = Category::query();

                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('nama', 'like', "%$searchTerm%")
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
            'title' => 'Tambah Category'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.category.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'nama' => $request->nama,
            ];
        
            $create = Category::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => Category::find($id),
            'title'=> 'Update Category',
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.category.create', compact('data'));
        }
        
        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        $data['content']->update($request->only(['nama']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = Category::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
