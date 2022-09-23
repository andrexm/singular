<?php

namespace Src\Controllers;

class Home
{
    public function index()
    {
        echo view('home', ['msg' => 'welcome!']);
    }
}
