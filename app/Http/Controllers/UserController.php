<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller {

    public function __construct() {
        $this->authorizeResource(User::class, 'user');
    }

    public function index(User $user) {

        $users = $user->all();

        return view('user.index', ['users' => $users]);
    }

    public function activate(User $user) {

        if ($user->active == 1) {
            $user->update([
                'active' => 0
            ]);
        } else {
            $user->update([
                'active' => 1
            ]);
        }

        return redirect()->route('users.index');
    }

}
