<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

	public function index()
	{
        $categories = Category::all();

		return view('admin.category.index')->with('categories', $categories);
	}

	public function create()
	{
		return view('admin.category.create');
	}

	public function store(CategoryRequest $request)
	{
        Category::create($request->all());

        return redirect()->route('admin.character.index');
	}

	public function edit($id)
	{
        $category = Category::findOrFail($id);

        return view('admin.category.edit')->with('category', $category);
	}

	public function update($id, CategoryRequest $request)
	{
        $category = Category::findOrFail($id);

        $category->update($request->all());

        return redirect()->route('admin.character.index');
	}

	public function destroy($id)
	{
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('admin.character.index');
	}

}
