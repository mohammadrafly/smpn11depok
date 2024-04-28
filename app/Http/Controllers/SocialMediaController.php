<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class SocialMediaController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'SocialMedia'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.socialMedia.index', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('GET')) {
            try{
                $perPage = $request->input('per_page', 10);
                $query = SocialMedia::query();

                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('url', 'like', "%$searchTerm%")
                        ->orWhere('icon', 'like', "%$searchTerm%")
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
            'title' => 'Tambah SocialMedia'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.socialMedia.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'url' => 'required|string|max:255',
                'icon' => 'required',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'url' => $request->url,
                'icon' => $request->icon,
            ];
        
            $create = SocialMedia::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => SocialMedia::find($id),
            'title'=> 'Update SocialMedia',
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.socialMedia.create', compact('data'));
        }
        
        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'url' => 'required|string|max:255',
            'icon' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        $data['content']->update($request->only(['url', 'icon']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = SocialMedia::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
