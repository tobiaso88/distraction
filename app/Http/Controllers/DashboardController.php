<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
}
