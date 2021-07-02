<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function show($id) {
        $profile = User::where('id', $id)->get()->first();
        return view('profile.show', compact('profile'));
    }

    // Update user profile
    public function update(Request $request, $id) {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'username' => 'required|max:255',
            'phone' => 'required|max:20',
            'address' => 'required',
            'email' => 'required'
        ]);

        $profile = User::find($id);

        $profile->first_name = $request->first_name;
        $profile->last_name = $request->last_name;
        $profile->username = $request->username;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->email = $request->email;
        $profile->update();

        return redirect()->route('profile', $id);
    }

//    update password
    public function changePassword(Request $request)
    {
        //Check if the Current Password matches with what is in the database.
        if(!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return back()->with('error', 'Your current password does not match with what you provided');
        }
        // Compare the Current Password and New Password using[strcmp function]
        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            return back()->with('error', 'Your current password cannot be same with the new password');
        }
        //Validate the Password.
        $request->validate([
            'current_password' => 'required',
            'new_password'     => 'required|string|min:8|different:password|confirmed'
        ]);
        // Save the New Password.
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();
        return back()->with('message', 'Password changed successfully');
    }
}
