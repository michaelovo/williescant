<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function show($uuid) {
        $profile = User::where('uuid', $uuid)->first();
        return view('profile.show', compact('profile'));
    }
}
