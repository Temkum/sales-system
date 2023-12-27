<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::all();

        // get user role
        foreach ($users as $user) {
            $user->role = $user->getRoleNames()->first();
        }

        return view('profile', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('profile', ['user' => $user]);
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        notyf()->addSuccess(__("Info updated successfully!"));

        return redirect()->route('profile.index');
    }
}
