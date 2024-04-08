<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {

        return view('signin');
    }


    public function customSignin(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Preencha este campo.',
                'password.required' => 'Preencha este campo.',
            ]

        );
        $credentials = $request->only('email', 'password');

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('index')
                ->withSuccess('Signed in');
        }

        return redirect("signin")->withErrors('Email ou senha inválida.');
    }
    public function registration()
    {
        return view('register');
    }

    public function customRegister(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'confirmpassword' => 'required|min:6',
            ],
            [
                'name.required' => 'Userame is required',
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
                'confirmpassword.required' => 'Confirm Password is required',

            ]
        );

        $data = $request->all();
        $check = $this->create($data);

        return redirect("signin")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'confirmpassword' => Hash::make($data['confirmpassword'])
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('index');
        }

        return redirect("signin")->withSuccess('You are not allowed to access');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('signin');
    }
}
