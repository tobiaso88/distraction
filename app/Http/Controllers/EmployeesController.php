<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Http\Requests;
use Auth;
use Carbon\Carbon;

class EmployeesController extends Controller
{
    public function all()
    {
        return Employee::all();
    }

    public function increase($id)
    {
        return Employee::findOrFail($id)
            ->clicks()
            ->where('user_id', Auth::id())
            ->today()
            ->firstOrCreate(['date' => Carbon::today(), 'user_id' => Auth::id()])
            ->increment('count');
    }

    public function decrement($id)
    {
        Employee::find($id)
            ->clicks()
            ->where('user_id', Auth::id())
            ->today()
            ->firstOrFail()
            ->decrement('count');
    }
}
