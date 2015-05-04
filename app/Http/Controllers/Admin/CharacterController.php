<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Character;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CharacterRequest;
use Illuminate\Http\Request;

class CharacterController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $characters = Character::all();

        return view('admin.character.index')->with('characters', $characters);
    }

    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('admin.character.create')->with('categories', $categories);
    }

    public function store(CharacterRequest $request)
    {
        $category = Category::findOrFail($request->input('category_id'));

        $category->characters()->create($request->all());

        return redirect()->route('admin.character.index');
    }

    public function edit($id)
    {
        $character = Character::findOrFail($id);

        $categories = Category::lists('name', 'id');

        return view('admin.character.edit')->with('character', $character)->with('categories', $categories);
    }

    public function update($id, CharacterRequest $request)
    {
        $category = Category::findOrFail($request->input('category_id'));
        $character = Character::findOrFail($id);

        $character->update($request->all());
        $character->category()->associate($category);
        $character->save();

        return redirect()->route('admin.character.index');
    }

    public function destroy($id)
    {
        $character = Character::findOrFail($id);

        $character->delete();

        return redirect()->route('admin.character.index');
    }

}
