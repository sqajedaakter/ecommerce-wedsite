<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginview()
    {
        return view('backend.login');
    }
    public function login(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required',

            ]
        );
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('error', ' Email not mach');
        } else {
            if (password_verify($request->password, $admin->password)) {
                session()->put('adminName', $admin->name);
                session()->put('adminID', $admin->id);
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->with('error', ' Password not mach');
            }
        }
    }
    public function adminDashboard()
    {
        return view('backend.home.index');
    }
    public function adminLogout()
    {
        session()->flush();
        return redirect('/admin/login');
    }
}
