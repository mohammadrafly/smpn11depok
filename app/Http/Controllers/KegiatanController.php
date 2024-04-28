<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Kegiatan'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.kegiatan.index', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('GET')) {
            try{
                $perPage = $request->input('per_page', 10);
                $query = Kegiatan::query();

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
            'title' => 'Tambah Kegiatan'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.kegiatan.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string|max:255',
                'waktu' => 'required|string|max:255',
                'content' => 'required',
                'total_siswa' => 'required',
                'foto' => 'foto|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'nama' => $request->nama,
                'waktu' => $request->waktu,
                'content' => $request->content,
                'total_siswa' => $request->total_siswa,
                'foto' => null,
            ];
            
            if ($request->hasFile('image')) {
                $foto = $request->file('image');
                $imageName = time().'.'.$foto->getClientOriginalExtension();
                $data['foto'] = $imageName;
                $foto->storeAs('public/foto_kegiatan', $imageName);
            }
            
            $create = Kegiatan::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => Kegiatan::find($id),
            'title'=> 'Update Kegiatan',
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.kegiatan.create', compact('data'));
        }
        
        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'waktu' => 'required|string|max:255',
            'content' => 'required',
            'total_siswa' => 'required',
            'foto' => 'foto|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        if ($request->hasFile('image')) {
            if ($data['content']->foto) {
                Storage::delete('public/foto_kegiatan/' . $data['content']->foto);
            }

            $foto = $request->file('image');
            $imageName = time().'.'.$foto->getClientOriginalExtension();
            $foto->storeAs('public/foto_kegiatan', $imageName);
            $data['content']->foto = $imageName;
        }

        $data['content']->update($request->only(['nama', 'waktu', 'content', 'total_siswa']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = Kegiatan::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete();
        Storage::delete('public/foto_kegiatan/' . $data->foto);

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
