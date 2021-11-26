<?php

namespace App\Http\Controllers;

use App\Exceptions\FullPage404Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Services\PasswordReset\FirstTimePasswordResetService;

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

    public function store(Request $request, FirstTimePasswordResetService $passwordReset)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email']
        ]);
        return $passwordReset->onPasswordReset($validated) ?
            redirect('api/staffs')->with('success', 'Staff created successfully') :
            redirect()->back()->with('error', 'Unable to create staff. Internal error occurred.');
    }

    public function show($id)
    {
        try {
            $staff = User::findOrFail($id);
            $role = $staff->getRoleNames(); // It will attach role collection to staff automatically. So, it is obsolete to send props.
        } catch (\Exception $e) {
            throw new FullPage404Exception;
        }
        return Inertia::render('Dashboard/Staffs/show', [
            'staff' => $staff,
            'firstTimeActivate' => $staff->hasColumnChanged() ? 'activate' : 'do-not'
        ]);
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
