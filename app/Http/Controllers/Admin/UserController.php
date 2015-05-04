<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();

        return view('admin.user.index')->with('users', $users);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->all());

        return redirect()->route('admin.user.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit')->with('user', $user);
    }

    public function update($id, UserRequest $request)
    {
        $user = user::findOrFail($id);

        $user->update($request->all());

        return redirect()->route('admin.user.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.user.index');
    }

    public function password($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.password')->with('user', $user);
    }

    public function passwordsave($id, PasswordChangeRequest $request)
    {
        $user = User::findOrFail($id);

        $user->password = Hash::make($request->get('password'));

        $user->save();

        return redirect()->route('admin.user.index');
    }

}
