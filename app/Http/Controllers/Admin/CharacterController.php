<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Character;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CharacterRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Image;
use Illuminate\Http\Request;

class CharacterController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::weighted()->get();

        return view('admin.character.index', compact('categories'));
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

    public function image($id)
    {
        $character = Character::findOrFail($id);

        return view('admin.character.image')->with('character', $character);
    }

    public function upload($id, ImageUploadRequest $request)
    {
        $character = Character::findOrFail($id);

        if($request->file('image')->isValid())
        {
            $destinationPath = '/uploads/avatars'; // upload path
            $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = $character->slug.'.'.$extension;
            $request->file('image')->move(base_path() . '/public'.$destinationPath, $fileName); // uploading file to given path
            // sending back with message
            //Session::flash('success', 'Upload successfully');

            $character->image = $destinationPath.'/'.$fileName;
            $character->save();

            return redirect()->route('admin.character.index');
        }
        else
        {
            return view('admin.character.image')->with('character', $character)->withErrors(['image' => 'The uploaded file is not valid']);
        }

    }

    public function assign($id)
    {
        $character = Character::findOrFail($id);
        $images = Image::all();

        return view('admin.character.assign', compact('character', 'images'));
    }

    public function add($id, $image)
    {
        $character = Character::findOrFail($id);
        $image = Image::findOrFail($image);
        if(!$character->images->contains($image->id))
            $character->images()->attach($image->id);
        $character->save();

        return 'success';
    }

    public function remove($id, $image)
    {
        $character = Character::findOrFail($id);
        $image = Image::findOrFail($image);
        if($character->images->contains($image->id))
            $character->images()->detach($image->id);
        $character->save();

        return 'success';
    }

}
