<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FileOwnerController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/File-Owners/index');
    }

    public function create()
    {
        return Inertia::render('Dashboard/File-Owners/create');
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
