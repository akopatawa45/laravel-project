<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.Admin_dashboard');
    }

    public function login()
    {
        return view('Admin_login');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {

            $user = Admin::where('email', $request->input('email'))->first();
            Auth::guard('admin')->login($user);
            return redirect()->route('Admin Dashboard')->with('success', 'Login Succesful');
        } else {
            return redirect()->route('login')->with('error', 'Missing Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login')->with('Logout Successful');
    }

    public function list()
    {

        return view('employees.employee_list');
    }

    public function add_function()
    {

        return view('employees.employee_add');
    }

    public function add_submit(Request $request)
    {
        $user = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'middle_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'email' => 'required|unique:users',
            'phone_number' => 'required',
            'address' => 'required',
            'job_title' => 'required',


        ]);

        $user = new Employee();

        $user->first_name = trim($request->first_name);
        $user->last_name = trim($request->last_name);
        $user->middle_name = trim($request->middle_name);
        $user->date_of_birth = trim($request->date_of_birth);
        $user->gender = trim($request->gender);
        $user->email = trim($request->email);
        $user->phone_number = trim($request->phone_number);
        $user->address = trim($request->address);
        $user->job_title = trim($request->job_title);
        $user->save();

        return redirect()->route('Employee List')->with('success', 'Add Employment Successful');
    }
}