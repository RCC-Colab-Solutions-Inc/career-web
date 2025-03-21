<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientMainController extends Controller
{
    public function client()
    {
        return view('clients.login');
    }

    public function dashboardpage()
    {
        return view('clients.dashboard');
    }

    public function applicantspage()
    {
        return view('clients.applicants');
    }
}
