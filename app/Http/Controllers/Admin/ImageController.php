<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateImageRequest;
use App\Http\Requests\EditImageRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $images = Image::all();

        return view('admin.image.index')->with('images', $images);
    }

    public function create()
    {
        return view('admin.image.create');
    }

    public function store(CreateImageRequest $request)
    {
        $image = new Image;

        $image->name = $request->get('name');
        $image->artist = $request->get('artist');
        $image->credit = $request->get('credit');

        if($request->file('image')->isValid())
        {
            $image->url = $this->manage_upload($request->file('image'));
            $image->save();

            return redirect()->route('admin.image.index');
        }

        return view('admin.image.create')->withErrors(['image' => 'The uploaded file is not valid']);
    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);

        return view('admin.image.edit')->with('image', $image);
    }

    public function update($id, EditImageRequest $request)
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

        return view('admin.image.image')->with('image', $image);
    }

    public function upload($id, ImageUploadRequest $request)
    {
        $image_data = Image::findOrFail($id);

        if($request->file('image')->isValid())
        {
            $image_data->url = $this->manage_upload($request->file('image'));
            $image_data->save();

            return redirect()->route('admin.image.index');
        }
        else
        {
            return view('admin.image.image')->with('imagedata', $image_data)->withErrors(['image' => 'The uploaded file is not valid']);
        }

    }

    private function manage_upload($file)
    {
        $destinationPath = '/uploads/gallery'; // upload path
        $fileName = $file->getClientOriginalName();
        $file->move(base_path() . '/public'.$destinationPath, $fileName); // uploading file to given path

        return $destinationPath.'/'.$fileName;
    }

}
