<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TablePartin extends Component
{

    public $input_code;
    public $count = 0;


    public function submit() {
        $id = $this->input_code;
        $item_name = DB::table('stock')->where('item_code', $id)->select('item_name')->value('item_name');
        $qty = DB::table('temp_partin')->where('item_code', $id)->select('qty')->value('qty');

        DB::table('temp_partin')->updateOrInsert([
           'item_code' => $id, 'item_name' => $item_name
        ],['qty' => $qty + 1]);
    }

    public function update(Request $request) {
        if (DB::table('stock')->where('item_code', $id)->doesntExist()) {
            DB::table('stock')->insert([
                'item_code' => $id,
                'item_name' => $request->item_name,
                'qty' => 0,
                'minimum' => 0,
                'uom' => 'Pcs',
            ]);
        } else{
            // Do Nothing
        }
        $item_name = DB::table('stock')->where('item_code', $id)->select('item_name')->value('item_name');
        DB::table('temp_partin')->where('item_code', $id)->update([
            'item_name' => $item_name,
            'qty' => $request->qty,
            'remark' => $request->remark
        ]);
    }
    
    public function delete($id) {
        DB::table('temp_partin')->where('item_code', $id)->delete();
    }

    public function prosess() {
        $move = DB::table('temp_partin')->get();
        foreach ($move as $mv) {
            DB::table('partin')->insert([
                'item_code' => $mv->item_code,
                'item_name' => $mv->item_name,
                'qty' => $mv->qty,
                'remark' => $mv->remark
            ]);
        } 
        
    }

    public function render()
    {
        $table = DB::table('temp_partin')->get();
        return view('livewire.table-partin', ['table' => $table, 'i' => 1]);
    }
}
