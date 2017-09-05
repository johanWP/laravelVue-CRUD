<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function allQuery(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        return [
            'departments' => Department::all()
        ];
    }
}
