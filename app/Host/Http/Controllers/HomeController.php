<?php

namespace App\Host\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view('host.home');
    }
}
