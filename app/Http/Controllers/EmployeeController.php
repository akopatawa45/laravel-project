<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.Employee_dashboard');
    }

    public function login()
    {
        return view('Employee_login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('employee')->attempt($credentials)) {
            $user = Employee::where('email', $request->input('email'))->first();
            Auth::guard('employee')->login($user);
            return redirect()->route('employee_dashboard')->with('success', 'Login Successful');
        } else {
            return redirect()->route('login')->with('error', 'Missing Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('employee')->logout();
        return redirect()->route('Employee_login')->with('success', 'Logout Successful');
    }
}
