<?php

namespace Src\Controllers;

use Src\Models\User;

class Home
{
    public function index()
    {
        echo view('home', ['msg' => 'Welcome to Singular!']);
    }

    public function login()
    {
        if(request()->input("email") && request()->method() == "POST") {
            auth()->attempt();
        }

        echo view("login");        
    }

    public function logout()
    {
        auth()->logout();
        return redirect(url_back());
    }
}
