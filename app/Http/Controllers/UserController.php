<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
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
            $time = Carbon::createFromFormat('Y-m-d H:i:s', $user->premium_expire)->addMonth();
            $user->premium_expire = $time;


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
