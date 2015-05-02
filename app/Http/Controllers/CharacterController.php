<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CharacterController extends Controller {

	public function index()
    {
        $categories  = Category::all();

        return view('home', compact('categories'));
    }

    public function show($category, $character)
    {
        $category = Category::where('slug', '=', $category)->first();

        $found = $category->characters()->where('slug', '=', $character)->first();

        return view('character')->with('character', $found);
    }

    public function gallery($category, $character)
    {
        return view('gallery');
    }
}
