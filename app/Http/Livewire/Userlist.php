<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Userlist extends Component {

    public $users;
    public $count = 0;
    public $meth;


    public $test;

    public function render() {
        return view('livewire.userlist');
    }

    public function mount() {
        $this->users = User::all();
    }

    public function activate(User $user) {
        $user->update([
            'active' => $user->active ? 0 : 1
        ]);

        $userUpd = $this->users->find($user->id);
        $userUpd->active = $userUpd->active ? 0 : 1;
        $userUpd->fresh();
    }

    private function orderBy($by) {
        if ($this->count === 0) {
            $this->users = User::orderByDesc($by)->get();
            $this->count = 1;
        } else {
            $this->users = User::orderBy($by)->get();
            $this->count = 0;
        }
    }

    public function orderById() {
        $this->orderBy('id');
    }

    public function orderByFirstName() {
        $this->orderBy('first_name');
    }

    public function orderByLastName() {
        $this->orderBy('last_name');
    }

    public function orderByPhone() {
        $this->orderBy('phone');
    }

    public function orderByEmail() {
        $this->orderBy('email');
    }

    public function orderByActive() {
        $this->orderBy('active');
    }

}
