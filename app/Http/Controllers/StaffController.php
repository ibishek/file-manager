<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $staffs = User::when($request->name, function ($query, $name) {
            $query->where('name', 'like', "%$name%");
        })->select(['id', 'name'])->latest()->paginate(10);
        return Inertia::render('Dashboard/Staffs/index', [
            'staffs' => $staffs
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Staffs/create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
