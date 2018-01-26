<?php

namespace App\Http\Controllers\Cruds;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Facades\App\Facades\AlertManager;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		// Return view with categories list
		$arrayCategories = Category::orderBy('name', 'asc')->where('name', 'like', "%$request->filter%")->paginate(2);
		return view('cruds.category.index')->with(['categories' => $arrayCategories, 'filter' => $request->filter]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		// Return a view
		return view('cruds.category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $request) {
		// Get form data when the field name is the same in th db
		$objCategory = New Category();
		$objCategory->fill($request->all());
		$objCategory->save();

		AlertManager::success('Category save successfully');

		// Another case
		//$objCategory = New Category();
		//$objCategory->name = $request->nombre;
		//$objCategory->description = $request->descripcion;
		//$objCategory->save();

		return redirect()->route('admin.category.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category) {
		// Show object
		return view('cruds.category.show', compact(['category']));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	// EXPLICIT METHOD
	//public function edit($id) {
	// Edit object
	//	$category = Category::findOrFail($id);
	//}

	// IMPLICIT METHOD
	public function edit(Category $category) {
		// Edit object
		return view('cruds.category.edit')->with(['category' => $category]);
		//return view('cruds.category.edit')->with([compact('category')]);
		//return view('cruds.category.edit', compact(['category']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	// EXPLICIT METHOD
	//public function update(Request $request, $id) {
	// Update object

	//}

	// IMPLICIT METHOD
	public function update(Request $request, Category $category) {
		// Validate update form
		$this->validate($request, [
			'name' => "required|min:3|max:50|string|unique:categories,name,{$category->id},id",
			'description' => 'required|min:3|max:150|string',
		]);

		// Update object
		$category->fill($request->all());
		$category->save();

		AlertManager::warning('Category update successfully');

		return redirect()->route('admin.category.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	// EXPLICIT METHOD
	//public function destroy(Category $category) {
	//
	//}

	// IMPLICIT METHOD
	public function destroy(Category $category) {
		// Delete object
		$category->delete();

		AlertManager::danger('Category detete successfully');

		return redirect()->route('admin.category.index');
	}
}
