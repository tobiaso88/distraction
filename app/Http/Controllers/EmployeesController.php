<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;
use App\Http\Requests;
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
            ->user()
            ->today()
            ->firstOrCreate(['date' => Carbon::today(), 'user_id' => Auth::id()])
            ->increment('count');
    }

    public function decrement($id)
    {
        Employee::find($id)
            ->clicks()
            ->user()
            ->today()
            ->firstOrFail()
            ->decrement('count');
    }
}
