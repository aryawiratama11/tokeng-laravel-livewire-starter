<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TablePartout extends Component
{
    public function render()
    {
        $table = DB::table('temp_partout')->get();
        return view('livewire.table-partout', ['table' => $table]);
    }
}
