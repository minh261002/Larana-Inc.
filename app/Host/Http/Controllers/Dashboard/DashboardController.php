<?php

namespace App\Host\Http\Controllers\Dashboard;

class DashboardController
{
    public function index()
    {
        return view('host.dashboard.index');
    }
}
