<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Login'
        ];

        if (!$request->ajax() && $request->isMethod('GET')) {
            return view('page.auth.index', compact('data'));
        }

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        $attempt = Auth::attempt($credentials);

        if (!$user) {
            return response()->json([
                'message' => 'Email tidak ada di database!', 
                'code' => 404
            ]);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'Password salah!', 
                'code' => 404
            ]);
        }

        if (!$attempt) {
            return response()->json([
                'message' => 'Gagal login!', 
                'code' => 404
            ]);
        }

        return response()->json([
            'message' => 'Berhasil login', 
            'code' => 200, 
            'redirect' => route('dashboard')
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'message' => 'Berhasil Logout!', 
            'code' => 200, 
            'redirect' => route('login')
        ]);
    }
}
