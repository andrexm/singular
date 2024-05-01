<?php

namespace Src\Controllers;

use Src\Models\User;

class Home
{
    public function index()
    {
        echo view('home', ['msg' => 'Welcome to Singular!']);
    }
}
