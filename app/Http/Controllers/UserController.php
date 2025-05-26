<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createProfile()
    {
        $user = User::find(1);

        $user->profile()->create([
            'phone' => '832748234',
            'address' => 'bedali agung 33'
        ]);

        return $user;
    }

    public function userProfile()
    {
        // $user = User::find(1);

        // kita coba pakai all
        $user = User::all();

        // lazy loading (n+1 problem)
        // return $user->profile;

        //eager loading
        // return $user->load('profile');

        return $user;
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(1);

        $user->profile()->update([
            'phone' => '9999999',
            'address' => 'bariiii'
        ]);

        return $user;
    }

    public function deleteProfile()
    {
        $user = User::find(1);

        $user->profile()->delete();

        return $user;
    }
}
