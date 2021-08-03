<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->with('user_products')->first();
        return view('admin-panel.users.show', ['user' => $user]);
    }

    public function index(){
        $users = User::paginate(10);

        return view('admin-panel.users.index', ['users' => $users]);
    }

    public function edit($id){
        $user = new User();
        return view('admin-panel.users.edit', ['user' => $user->find($id)]);
    }

    public function update(Request $req, $id){
        $user = User::find($id);
        $user->name = $req->input('name');
        $user->address = $req->input('address');

        $user->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
