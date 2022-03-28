<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function toggle(User $user)
    {
        if ($user->premium == 1) {
            // add 1 month to premium_expire
            // timestamp from string
            $user->premium_expire = strtotime('+1 month', $user->premium_expire)->addMonth();

            $user->save();
        } else {
            // set premium_expire to now
            $user->premium_expire = now()->addMonth();
            $user->premium = 1;
            $user->save();
        }

        return back();
    }
}
