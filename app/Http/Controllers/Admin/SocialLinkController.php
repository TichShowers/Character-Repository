<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\SocialLinkRequest;
use App\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $social_links = SocialLink::all();

        return view('admin.social_link.index')->with('social_links', $social_links);
    }

    public function create()
    {
        return view('admin.social_link.create');
    }

    public function store(SocialLinkRequest $request)
    {
        SocialLink::create($request->all());

        return redirect()->route('admin.social-link.index');
    }

    public function edit($id)
    {
        $social_link = SocialLink::findOrFail($id);

        return view('admin.social_link.edit')->with('social_link', $social_link);
    }

    public function update($id, SocialLinkRequest $request)
    {
        $social_link = SocialLink::findOrFail($id);

        $social_link->update($request->all());

        return redirect()->route('admin.social-link.index');
    }

    public function destroy($id)
    {
        $social_link = SocialLink::findOrFail($id);

        $social_link->delete();

        return redirect()->route('admin.social-link.index');
    }

}
