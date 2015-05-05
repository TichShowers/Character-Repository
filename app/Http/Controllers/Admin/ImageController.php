<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $image = Image::all();

        return view('admin.image.index')->with('Image', $image);
    }

    public function create()
    {
        return view('admin.image.create');
    }

    public function store(SocialLinkRequest $request)
    {
        Image::create($request->all());

        return redirect()->route('admin.image.index');
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);

        return view('admin.image.edit')->with('image', $image);
    }

    public function update($id, SocialLinkRequest $request)
    {
        $image = Image::findOrFail($id);

        $image->update($request->all());

        return redirect()->route('admin.image.index');
    }

    public function destroy($id)
    {
        $image = Image::findOrFail($id);

        $image->delete();

        return redirect()->route('admin.image.index');
    }

    public function image($id)
    {
        $image = Image::findOrFail($id);

        return view('admin.character.image')->with('imagedata', $image);
    }

    public function upload($id, ImageUploadRequest $request)
    {
        $image_data = Image::findOrFail($id);

        if($request->file('image')->isValid())
        {
            $destinationPath = '/uploads/gallery'; // upload path
            $extension = $request->file('image')->getClientOriginalExtension(); // getting image extension
            $fileName = $image_data->slug.'.'.$extension;
            $request->file('image')->move(base_path() . '/public'.$destinationPath, $fileName); // uploading file to given path
            // sending back with message
            //Session::flash('success', 'Upload successfully');

            $image_data->image = $destinationPath.'/'.$fileName;
            $image_data->save();

            return redirect()->route('admin.image.index');
        }
        else
        {
            return view('admin.image.image')->with('imagedata', $image_data)->withErrors(['image' => 'The uploaded file is not valid']);
        }

    }

}
