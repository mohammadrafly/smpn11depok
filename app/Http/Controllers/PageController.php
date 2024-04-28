<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Page'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.page.index', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('GET')) {
            try{
                $perPage = $request->input('per_page', 10);
                $query = Page::query();

                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('title', 'like', "%$searchTerm%")
                        ->orWhere('content', 'like', "%$searchTerm%")
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
            'title' => 'Tambah Page'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.page.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'content' => 'required',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'title' => $request->title,
                'content' => $request->content,
            ];
        
            $create = Page::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => Page::find($id),
            'title'=> 'Update Page',
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.page.create', compact('data'));
        }
        
        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        $data['content']->update($request->only(['title', 'content']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = Page::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
