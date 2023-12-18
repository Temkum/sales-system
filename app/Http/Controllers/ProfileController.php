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
}