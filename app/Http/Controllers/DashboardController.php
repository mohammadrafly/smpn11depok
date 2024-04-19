<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'user' => User::count(),
            'artikel' => Artikel::count(),
            'guru' => Guru::count(),
        ];
        
        return view('page.dashboard.index', compact('data'));
    }

    public function profile(Request $request)
    {
        $data = [
            'title' => 'Profile',
            'content' => User::find(Auth::user()->id),
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.dashboard.profile', compact('data'));
        }

        if (!$data['content']) {
            return Response::json(['message' => 'data not found!', 'code' => 404]);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$data['content']->id,
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        $data['content']->update($request->only(['name', 'email']));

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }

    public function changePassword(Request $request)
    {
        $data = User::find(Auth::user()->id);

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return Response::json(['message' => $validator->errors()->first(), 'code' => 422]);
        }

        if (!Hash::check($request->old_password, $data->password)) {
            return Response::json(['message' => 'The old password is incorrect.', 'code' => 422]);
        }

        $data->update(['password' => bcrypt($request->password)]);

        return Response::json(['message' => 'data updated successfully', 'code' => 200]);
    }
}
