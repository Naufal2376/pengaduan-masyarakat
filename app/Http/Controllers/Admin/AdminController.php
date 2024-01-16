<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        if (Auth::guard('admin')->attempt(['username' => $data['username'], 'password' => $data['password']])) {
            return redirect()->route('dashboard.index');
        }
        return redirect()->back()->with(['error' => 'username atau password salah']);
    }

    public function dashboard()
    {
        return view('admin.home');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}