<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Activity'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.activity.index', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('GET')) {
            try{
                $perPage = $request->input('per_page', 10);
                $query = Activity::query();

                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('nama', 'like', "%$searchTerm%")
                        ->orWhere('waktu', 'like', "%$searchTerm%")
                        ->orWhere('total_siswa', 'like', "%$searchTerm%")
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
            'title' => 'Tambah Activity'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.activity.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'waktu' => 'required|string|max:255',
                'content' => 'required',
                'total_siswa' => 'required',
                'img' => 'img|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'nama' => $request->nama,
                'waktu' => $request->waktu,
                'content' => $request->content,
                'total_siswa' => $request->total_siswa,
                'img' => null,
            ];
            
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $imageName = time().'.'.$img->getClientOriginalExtension();
                $data['img'] = $imageName;
                $img->storeAs('public/foto_kegiatan', $imageName);
            }
            
            $create = Activity::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => Activity::find($id),
            'title'=> 'Update Activity',
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.activity.create', compact('data'));
        }
        
        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'content' => 'required',
            'total_siswa' => 'required',
            'img' => 'img|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        if ($request->hasFile('image')) {
            if ($data['content']->img) {
                Storage::delete('public/foto_kegiatan/' . $data['content']->img);
            }

            $img = $request->file('image');
            $imageName = time().'.'.$img->getClientOriginalExtension();
            $img->storeAs('public/foto_kegiatan', $imageName);
            $data['content']->img = $imageName;
        }

        $data['content']->update($request->only(['nama', 'waktu', 'content', 'total_siswa']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = Activity::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();
        Storage::delete('public/foto_kegiatan/' . $data->img);

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }

    public function activitySingle($id)
    {
        $data = [
            'title' => 'Activity',
            'content' => Activity::find($id),
        ];

        return view('page.home.activity.singleActivity', compact('data'));
    }

    public function activityAll()
    {
        $data = [
            'title' => 'Activity',
            'content' => Activity::all(),
        ];

        return view('page.home.activity.allActivity', compact('data'));
    }
}
