<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TablePartin extends Component
{

    public $input_code;
    public $items = [];
    public $i = 1;

    public function submit() {
        $id = strtoupper($this->input_code);
        $item_name = DB::table('stock')->where('item_code', $id)->select('item_name')->value('item_name');
        $qty = DB::table('temp_partin')->where('item_code', $id)->select('qty')->value('qty') + 1;

        DB::table('temp_partin')->updateOrInsert([
            'item_code' => $id, 'item_name' => $item_name
         ],['qty' => $qty, 'remark' => '-']);
        if (DB::table('temp_partin')->where('item_code', $id)->where('item_name', $item_name)->doesntExist()) {
             $this->dispatchBrowserEvent('toaster', ['message' => 'Item Berhasil Ditambah']);
        } else {
             $this->dispatchBrowserEvent('toaster', ['message' => 'Kuantitas Berhasil Dirubah']);
        }
    }

    public function update($id, $index) {
        $qty = $this->items[$index]['qty'];
        $remark = $this->items[$index]['remark'];
        if (DB::table('stock')->where('item_code', $id)->doesntExist()) {
            $name = $this->items[$index]['item_name'];
            DB::table('stock')->insert([
                'item_code' => $id,
                'item_name' => $name,
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
            'qty' => $qty,
            'remark' => $remark
        ]);
        $this->dispatchBrowserEvent('toaster', ['message' => 'Kuantitas Berhasil Dirubah']);
    }
    
    public function delete($id) {
        DB::table('temp_partin')->where('item_code', $id)->delete();
    }

    public function prosess() {
        $move = DB::table('temp_partin')->get();
        foreach ($move as $mv) {
            DB::table('partin')->insert([
                "date" => date('Y-m-d'),
                "item_code" => $mv->item_code,
                "item_name" => $mv->item_name,
                "qty" => $mv->qty,
                "remark" => $mv->remark
            ]);
            $qty = DB::table('stock')->where('item_code', $mv->item_code)->select('qty')->value('qty');
            DB::table('stock')->where('item_code', $mv->item_code)->update([
                'qty' => $qty + $mv->qty
            ]);
        } 
        DB::table('temp_partin')->truncate();
        return redirect('/partin');
    }

    public function render()
    {
        $this->items = DB::table('temp_partin')->get();
        return view('livewire.table-partin');
    }
}
