<?php

namespace App\Http\Controllers;

use Illuminate\Htpp\RedirectResponse;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('user.login', ['title' => 'Login']);
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if(empty($username) || empty($password))
        {
            return response->view('login', [
                'title' => 'Login',
                'error' => 'Username and password is required'
            ]);
        }

        if($this->userService->login($username, $password))
        {
            $request->session()->put('username', $username);
            return redirect('/');
        }

        return response->view('login', [
            'title' => 'Login',
            'error' => 'Wrong username or password'
        ]);
    }

    public function doLogout(Request $request)
    {
        $request->session()->forget('username');
        return redirect('/');
    }
}
