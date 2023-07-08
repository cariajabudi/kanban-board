<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AuthRepository;

class AuthController extends Controller
{
    private $authRepository;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function showLoginForm()
    {
        return view("login", [
            "title" => "login"
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $this->authRepository->login($request);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin == '1') {
                return redirect()->intended('dashboard/kanban');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withInput()->with('login_error', 'NIK or password is wrong!');
    }

    public function logout(Request $request)
    {
        $this->authRepository->logout($request);
        return redirect("user/login");
    }
}
