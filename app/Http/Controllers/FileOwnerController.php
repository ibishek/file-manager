<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\FileOwner;
use App\Http\Requests\{
    StoreFileOwnerRequest,
    UpdateFileOwnerRequest
};
use App\Services\FileOwners\{
    onStoreService,
    onUpdateService
};

class FileOwnerController extends Controller
{
    public function index(Request $request)
    {
        $fileOwners = FileOwner::when($request->name, function ($query, $name) {
            $query->where('full_name', 'like', "%$name%");
        })->select('id', 'full_name', 'country')->latest()->paginate(10);

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
        // dd(FileOwner::findOrFail($id));
        return Inertia::render('Dashboard/File-Owners/show', [
            'fileOwner' => FileOwner::findOrFail($id)
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Dashboard/File-Owners/edit', [
            'fileOwner' => FileOwner::findOrFail($id)
        ]);
    }

    public function update(UpdateFileOwnerRequest $request, $id)
    {
        $validated = $request->validated();
        $fileOwner = FileOwner::findOrFail($id);
        return $fileOwner->update($validated) ?
            redirect("api/file-owners/{$fileOwner->id}")->with('success', 'File-Owner updated successfully') :
            redirect()->back()->withInput();
    }

    public function destroy($id)
    {
        $fileOwner = FileOwner::findOrFail($id);
        return $fileOwner->delete() ?
            redirect('api/file-owners')->with('success', 'File-Owner deleted successfully') :
            redirect()->bakc();
    }
}
