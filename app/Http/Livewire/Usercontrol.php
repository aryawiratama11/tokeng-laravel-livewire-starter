<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Usercontrol extends Component
{
    public $users = [];
    public $i = 1;
    public $search;

    public $name_add;
    public $nik_add;
    public $email_add;
    public $password1_add;
    public $password2_add;

    public $id_edit;

    public $name_edit;
    public $email_edit;
    public $password1_edit;
    public $password2_edit;

    public function delete($will_be_delete){
        DB::table('users')->where('id', $will_be_delete)->delete();
    }

    public function edit($apply_now){
        $this->id_edit = $apply_now;
        $this->dispatchBrowserEvent('open_dialog_edit');
        $this->name_edit  = DB::table('users')->where('id', $apply_now)->value('name');
        $this->email_edit = DB::table('users')->where('id', $apply_now)->value('email');
        $this->password1_edit = NULL;
        $this->password2_edit = NULL;
    }

    public function adduser(){
        $this->name_add = NULL;
        $this->nik_add = NULL;
        $this->email_add = NULL;
        $this->password1_add = NULL;
        $this->password2_add = NULL;
        $this->dispatchBrowserEvent('open_dialog_add');
    }

    public function tambah(){
        if ( strlen($this->name_add) > 0 && strlen($this->nik_add) > 0 && strlen($this->email_add) > 0 && strlen($this->password1_add) > 0 && strlen($this->password2_add) > 0 ) {
            if (DB::table('users')->where('username', $this->nik_add)->orWhere('email', $this->email_add)->doesntExist()) {
                if ($this->password1_add == $this->password2_add) {
                        DB::table('users')->insert([
                            'name' => $this->name_add,
                            'username' => $this->nik_add,
                            'email' => $this->email_add,
                            'role' => 'user',
                            'password' => bcrypt($this->password1_add)
                        ]);
                        $this->dispatchBrowserEvent('toaster', ['message' => 'User Add Successfully', 'type' => 'success']);
                } else {
                    $this->dispatchBrowserEvent('toaster', ['message' => 'Please Input Password right', 'type' => 'alert']);
                }
            } else {
                $this->dispatchBrowserEvent('toaster', ['message' => 'User Already Exists', 'type' => 'alert']);
            }
        } else {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Please Fill Form', 'type' => 'alert']);
        }
        $this->dispatchBrowserEvent('close_dialog_add');
    }

    public function save(){
        if ($this->password1_edit == $this->password2_edit) {
            if(DB::table('users')->where('email', $this->email_edit)->exists() && $this->email_edit <> DB::table('users')->where('id', $this->id_edit)->value('email')){
                $this->dispatchBrowserEvent('toaster', ['message' => 'Duplicate Data User', 'type' => 'alert']);
            } else {
                if (strlen($this->password1_edit) > 0) {
                    DB::table('users')->where('id', $this->id_edit)->update([
                        'password' => bcrypt($this->password1_edit)
                    ]);
                } else {
                    // Do Nothing
                }
                DB::table('users')->where('id', $this->id_edit)->update([
                    'name' => $this->name_edit,
                    'email' => $this->email_edit,
                ]);
                $this->dispatchBrowserEvent('toaster', ['message' => 'Data Successfully Save', 'type' => 'success']);
            }
        } else {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Please Input Password right', 'type' => 'alert']);
        }
    }

    public function render()
    {
        $searchterm = $this->search."%";
        $this->users = DB::table('users')->where('role', '<>', 'admin')->get();
        return view('livewire.usercontrol');
    }
}
