<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:roles index|roles create|roles edit|roles delete']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $roles = Role::latest()->paginate(10);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $permissions = Permission::latest()->get();
        return view('roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // validasi roles
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // create role
        $role = Role::create([
            'name' => $request->name,
        ]);

        // assign permission kedalam role
        $role->syncPermissions($request->permissions);

        return to_route('role.index')->with('success', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        $permissions = Permission::latest()->get();

        return view('roles.edit', compact('permissions', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // update Role
        $role->update([
            'name' => $request->name
        ]);

        //update assign permission ke role

        $role->syncPermissions($request->permissions);

        return to_route('role.index')->with('success', 'data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return to_route('role.index')->with('success', 'data berhasil dihapus');
    }
}
