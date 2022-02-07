<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function settings()
    {
        $user = User::find(auth()->id());
        $profile = Profile::where('user_id', auth()->id())->first();
        return view('user.settings', compact('user', 'profile'));
    }

    public function savesettings(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        // Profile data
        $profile_data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'user_id' => auth()->id()
        ];

        $profile = Profile::where('user_id', auth()->id())->first();
        if($profile){
            $pdata = new Profile();
            $pdata->where('user_id', auth()->id())->update($profile_data);
        }else{
            Profile::create($profile_data);
        }

        // user data
        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if($request->password){
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);

            $user_data['password'] = Hash::make($request->password);
        }
        $userup = new User();
        $userup->where('id', auth()->id())->update($user_data);
        return redirect()->route('user.settings')->with('success', 'Account updated');

    }
}
