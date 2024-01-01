<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        $roles = Role::all();

        if (Gate::denies('logged-in')) {
            return response()->view('auth.login');
        }

        if (Gate::allows('is-admin')) {
            return response()->view('admin.users', ['users' => $users, 'roles' => $roles]);
        } else {

            return view('admin.users')->with('error', 'You do not have permission to access this page!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return response()->view('admin.add-user', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $new_user = new CreateNewUser();

        $user = $new_user->create($request->only(['name', 'email', 'password', 'password_confirmation']));

        $user->roles()->sync($request->roles);

        Password::sendResetLink($request->only(['email']));

        notyf()->addSuccess(__('User created successfully!'));

        return redirect(route('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->view('admin.edit-user', ['roles' => Role::all(), 'user' => User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id); // findOrFail prevents deleting users who don't exist

        if (!$user) {
            notyf()->addError(__('You can not edit this user!'));

            return response()->redirect(route('users'));
        }

        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);

        notyf()->addSuccess(__("User updated successfully!"));

        return response()->redirect(route('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        User::destroy($id);

        notyf()->addSuccess(__("User deleted successfully!"));

        return response()->redirect(route('users'));
    }
}
