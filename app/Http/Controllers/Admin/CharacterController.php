<?php namespace App\Http\Controllers\Admin;

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
        return view('admin.character.create');
    }

    public function store(CharacterRequest $request)
    {
        Character::create($request->all());

        return redirect()->route('admin.character.index');
    }

    public function edit($id)
    {
        $character = Character::findOrFail($id);

        return view('admin.character.edit')->with('character', $character);
    }

    public function update($id, CharacterRequest $request)
    {
        $character = Character::findOrFail($id);

        $character->update($request->all());

        return redirect()->route('admin.character.index');
    }

    public function destroy($id)
    {
        $character = Character::findOrFail($id);

        $character->delete();

        return redirect()->route('admin.character.index');
    }

}
