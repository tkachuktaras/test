<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->with('user_products')->firstOrFail();
        return view('admin-panel.users.show', ['user' => $user]);
    }

    public function index(){
        $users = User::paginate(10);

        return view('admin-panel.users.index', ['users' => $users]);
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin-panel.users.edit', ['user' => $user]);
    }

    public function update(UserRequest $req, $id){
        $user = User::findOrFail($id);
        $user->name = $req->input('name');
        $user->address = $req->input('address');

        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}
