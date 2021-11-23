<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\FileOwner;
use App\Http\Requests\StoreFileOwnerRequest;
use App\Services\FileOwners\{
    onStoreService,
    onUpdateService
};

class FileOwnerController extends Controller
{
    public function index()
    {
        $fileOwners = FileOwner::all('full_name', 'country');
        return Inertia::render('Dashboard/File-Owners/index', [
            'fileOwners' => $fileOwners
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/File-Owners/create');
    }

    public function store(
        StoreFileOwnerRequest $request,
        onStoreService $onStore
    ) {
        return $onStore->fileownerSave($request->validated()) ?
            redirect('api/file-owners')->with('success', 'File owner created successfully !!!') :
            redirect()->back()->withInput()->with('errors', 'Error: While creating file owners. This is a server side error.');
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
