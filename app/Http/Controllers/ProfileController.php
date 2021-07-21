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
    public function show($id)
    {
        $profile = User::where('id', $id)->get()->first();
        $curr_page = 'profile';
        return view('supplier.profile', compact('profile', 'curr_page'));
    }

    public function updateAvatar(Request $request)
    {
        //        public function
        $profile = User::where('id', Auth::user()->id)->update(['avatar' => $request->avatar]);
    }

    public function switch()
    {
        $user = User::find(Auth::user()->id);
        if ($user->type == 2) {
            $user->update(['type' => 3]);
        } elseif ($user->type == 3) {
            $user->update(['type' => 2]);
        }
        return redirect()->route('home');
    }

    // Update user profile
    public function update(Request $request, $id)
    {
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

        return response()->json();
    }

    //    update password
    public function changePassword(Request $request)
    {
        //Check if the Current Password matches with what is in the database.
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            $data = ['error' => 'Your current password does not match with what you provided'];
        }
        // Compare the Current Password and New Password using[strcmp function]
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            $data = ['error', 'Your current password cannot be same with the new password'];
        }
        //Validate the Password.
        $request->validate([
            'password' => 'required',
            'new_password'     => 'required|string|min:8|different:password|confirmed'
        ]);
        // Save the New Password.
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return response()->json($data);
    }

    public function updatePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|different:password|confirmed'
        ]);

        if ($validator->errors()) {
            return response()->json($validator->errors());
        } else {
            $user = User::find(Auth::user()->id);
            $user->update(['password' => bcrypt($request->new_password)]);
            return response()->json(['message' => 'Password updated successfully']);
        }
    }
}
