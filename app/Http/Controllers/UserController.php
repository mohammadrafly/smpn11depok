<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Users'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.user.index', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('GET')) {
            try {
                $perPage = $request->input('per_page', 10);
                $query = User::query();

                if ($request->has('search')) {
                    $searchTerm = $request->input('search');
                    $query->where('name', 'like', "%$searchTerm%")
                        ->orWhere('email', 'like', "%$searchTerm%")
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
            'title' => 'Tambah User'
        ];

        if ($request->isMethod('GET')) {
            return view('page.dashboard.user.create', compact('data'));
        }

        if ($request->ajax() && $request->isMethod('POST')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
                'password_confirmation' => 'required|string|min:8',
                'img' => 'img|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        
            if ($validator->fails()) {
                return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
            }

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'img' => null,
            ];
            
            if ($request->hasFile('image')) {
                $img = $request->file('image');
                $imageName = time().'.'.$img->getClientOriginalExtension();
                $data['img'] = $imageName;
                $img->storeAs('public/foto_user', $imageName);
            }

            $create = User::create($data);
            
            if (!$create) {
                return Response::json(['message' => 'Failed to create data', 'code' => 500]);
            }
    
            return Response::json(['message' => 'data created successfully', 'code' => 201]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = [
            'content' => User::find($id),
            'title' => 'Update User',
        ];
        
        if ($request->isMethod('GET')) {
            return view('page.dashboard.user.create', compact('data'));
        }

        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$data['content']->id,
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
            $img->storeAs('public/foto_user', $imageName);
            $data['content']->img = $imageName;
        }

        $data['content']->update($request->only(['name', 'email']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function destroy($id)
    {
        $data = User::find($id);

        if (!$data) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $data->delete(); 
        Storage::delete('public/foto_user/' . $data->img);

        return Response::json(['message' => 'data deleted successfully', 'code' => 200]);
    }
}
