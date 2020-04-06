<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($user)
    {
        $user = User::findOrFail($user);
        return view('profile.show', [
            'user' => $user,
        ]);
    }
}
