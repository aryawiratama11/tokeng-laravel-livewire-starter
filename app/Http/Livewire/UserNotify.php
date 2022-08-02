<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UserNotify extends Component
{

    public $senders = [];
    public $usermails = [];
    public $i = 1;
    public $search;

    public $user;
    public $type;

    protected $listeners = ['rubah' => 'change'];

    public function change($payload)
    {
    if ($payload['pos'] == 1) {
        $this->user = $payload['data'];
    } else {
        $this->type = $payload['data'];
    }
    }

    public function delete($will_be_delete){
        DB::table('mail_list')->where('id', $will_be_delete)->delete();
    }

    public function add(){
        $this->user = NULL;
        $this->type = NULL;
        $this->dispatchBrowserEvent('open_dialog_add');
    }

    public function edit(){
        $this->name_add = NULL;
        $this->dispatchBrowserEvent('open_dialog_add');
    }

    public function save(){
        if ( DB::table('mail_list')->where('email', $this->user)->doesntExist() ) {
            if ($this->type == 'To' || $this->type == 'cc') {
                DB::table('mail_list')->insert([
                    'email' => $this->user,
                    'type' => $this->type
                ]);
                $this->dispatchBrowserEvent('toaster', ['message' => 'Data Saved', 'type' => 'success']);
            } else {
                $this->dispatchBrowserEvent('toaster', ['message' => $this->user .' - '.$this->type, 'type' => 'alert']);
            }
        } else {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Email Already Exists', 'type' => 'alert']);
        }
        $this->dispatchBrowserEvent('close_dialog_add');
    }

    public function render()
    {
        $searchterm = $this->search."%";
        $this->senders = DB::table('mail_list')->leftJoin('users', 'mail_list.email', '=', 'users.email')->where('users.role', '<>', 'admin')
        ->select('users.email as email', 'users.name as name', 'mail_list.type as type', 'mail_list.id as id')
        ->get();
        $this->usermails = DB::table('users')->where('role', '<>', 'admin')->get();
        return view('livewire.user-notify');
    }
}
