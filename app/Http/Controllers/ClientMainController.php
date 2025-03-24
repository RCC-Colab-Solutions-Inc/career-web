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

    public function messagepage()
    {
        return view('clients.message');
    }

    public function companyprofile()
    {
        return view('clients.company-profile');
    }
}
