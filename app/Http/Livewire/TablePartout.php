<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TablePartout extends Component
{

    public $input_code;
    public $items = [];
    public $i = 1;

    public function submit() {
        $id = strtoupper($this->input_code);
        $item_name = DB::table('stock')->where('item_code', $id)->select('item_name')->value('item_name');
        $qty = DB::table('temp_partout')->where('item_code', $id)->select('qty')->value('qty') + 1;
        if (DB::table('stock')->where('item_code', $id)->doesntExist()) {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Barang Tidak Tersedia']);
        }else {
            $count   = DB::table('stock')->where('item_code', $id)->select('qty')->value('qty');
            if ($count < $qty) {
                $this->dispatchBrowserEvent('toaster', ['message' => 'Kuantitas Kurang Dari yang Tersedia']);
            }
            else {
                DB::table('temp_partout')->updateOrInsert([
                    'item_code' => $id, 'item_name' => $item_name
                 ],['qty' => $qty, 'remark' => '-']);
            }
        }
    }

    public function update($id, $index) {
        $qty    = $this->items[$index]['qty'];
        $remark = $this->items[$index]['remark'];
        $count   = DB::table('stock')->where('item_code', $id)->select('qty')->value('qty');
        if ($count < $qty) {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Kuantitas Kurang Dari yang Tersedia']);
        } else{
            // Do Nothing
        }
        $item_name = DB::table('stock')->where('item_code', $id)->select('item_name')->value('item_name');
        DB::table('temp_partout')->where('item_code', $id)->update([
            'item_name' => $item_name,
            'qty' => $qty,
            'remark' => $remark
        ]);
    }
    
    public function delete($id) {
        DB::table('temp_partout')->where('item_code', $id)->delete();
    }

    public function prosess() {
        $move = DB::table('temp_partout')->get();
        foreach ($move as $mv) {
            DB::table('partout')->insert([
                "date" => date('Y-m-d'),
                "item_code" => $mv->item_code,
                "item_name" => $mv->item_name,
                "qty" => $mv->qty,
                "remark" => $mv->remark
            ]);
            $qty = DB::table('stock')->where('item_code', $mv->item_code)->select('qty')->value('qty');
            DB::table('stock')->where('item_code', $mv->item_code)->update([
                'qty' => $qty - $mv->qty]);
        } 
        DB::table('temp_partout')->truncate();
        return redirect('/partout');
    }

    public function render()
    {
        $this->items = DB::table('temp_partout')->get();
        return view('livewire.table-partout');
    }
}