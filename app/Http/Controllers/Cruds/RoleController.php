<?php

namespace App\Http\Controllers\Cruds;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Role;
use Facades\App\Facades\AlertManager;
use Illuminate\Http\Request;

class RoleController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		// Return view with roles list
		$arrayRoles = Role::orderBy('name', 'asc')->where('name', 'like', "%$request->filter%")->paginate(2);
		return view('cruds.role.index')->with(['roles' => $arrayRoles, 'filter' => $request->filter]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		// Return a view
		return view('cruds.role.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(RoleRequest $request) {
		$objRole = New Role();
		$objRole->fill($request->all());
		$objRole->save();

		AlertManager::success('Role save successfully');

		return redirect()->route('admin.role.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function show(Role $role) {
		// Show object
		return view('cruds.role.show', compact(['role']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Role $role) {
		// Edit object
		return view('cruds.role.edit')->with(['role' => $role]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Role $role) {
		// Validate update form
		$this->validate($request, [
			'name' => "required|min:3|max:50|string|unique:roles,name,{$role->id},id",
			'description' => 'required|min:3|max:150|string',
		]);

		// Update object
		$role->fill($request->all());
		$role->save();

		AlertManager::warning('Role update successfully');

		return redirect()->route('admin.role.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Role  $role
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Role $role) {
		// Delete object
		$role->delete();

		AlertManager::danger('Role detete successfully');

		return redirect()->route('admin.role.index');
	}
}
