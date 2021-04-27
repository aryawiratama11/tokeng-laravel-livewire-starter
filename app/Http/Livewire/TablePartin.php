<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TablePartin extends Component
{

    public function render()
    {
        $table = DB::table('temp_partin')->get();
        return view('livewire.table-partin', ['table' => $table]);
    }
}
