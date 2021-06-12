<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Auth;

class Changepassword extends Component
{
    public $password1;
    public $password2;
    public $password3;

    protected $rules = [
        'password1' => 'required',
        'password2' => 'required|min:6',
        'password3' => 'required|same:password2',
    ];

    protected $messages = [
        'password1.required' => 'Old Password is Required.',
        'password2.required' => 'New Password is Required',
        'password2.min'      => 'Minimal 6 Character is Required',
        'password3.required' => 'Confirm Password is Required',
        'password3.same'     => "Password didn't Match",
        
    ];

    public function process(){
        $this->validate();
        $a1 = Auth::user();
        $old     = $this->password1;
        $new     = $this->password2;
        $confirm = $this->password3;

        if(Hash::check($old, $a1->password)) {
        DB::table('users')->where('username', $a1->username)->update(
            [
                'password' => bcrypt($new),
            ]);
            $this->dispatchBrowserEvent('toaster', ['message' => 'Password Berhasil Dirbuah', 'type' => 'success']);
        }else {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Password is Wrong', 'type' => 'alert']);
        }
    }

    public function render()
    {
        return view('livewire.changepassword');
    }
}
