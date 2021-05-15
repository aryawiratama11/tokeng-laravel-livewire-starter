<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TablePartcheck extends Component
{
    public $input_code;
    public $items = [];

    public function submit() {
        $id = $this->input_code;
        if (DB::table('temp_register')->where('item_code', $id)->exists()) {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Barang Sudah Terdaftar', 'type' => 'alert']);
        } elseif (DB::table('temp_register')->where('status', 1)->exists()) {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Selesaikan Transaksi Terlebih Dahulu', 'type' => 'warning']);
        }else {
                DB::table('temp_register')->insert([
                    'item_code' => $id, 
                    'item_name' => '',
                    'qty' => 0,
                    'minimum' => 0,
                    'uom' => 'Pcs',
                    'location' => '-'
                 ]);
        }
    }

    public function update($id, $index) {
        $name = $this->items[$index]['item_name'];
        $qty = $this->items[$index]['qty'];
        $minimum = $this->items[$index]['minimum'];
        $uom = $this->items[$index]['uom'];
        $loc = $this->items[$index]['location'];
        DB::table('temp_register')->where('item_code', $id)->update([
            'item_name' => $name,
            'qty' => $qty,
            'minimum' => $minimum,
            'uom' => $uom,
            'location' => $loc,
            'status' => 0,
        ]);
        $this->dispatchBrowserEvent('toaster', ['message' => 'Perubahan berhasil Disimpan', 'type' => 'success']);
    }
    
    public function delete($id) {
        DB::table('temp_register')->where('item_code', $id)->delete();
        $this->dispatchBrowserEvent('toaster', ['message' => 'Barang Berhasil Di Hapus', 'type' => 'warning']);
    }

    public function prosess() {
    if (DB::table('temp_register')->where('status', 1)->exists()) {
        $this->dispatchBrowserEvent('toaster', ['message' => 'Selesaikan Transaksi Terlebih Dahulu', 'type' => 'warning']);
        session()->flash('error', 'warn');
    }else {
        $move = DB::table('temp_register')->get();
        foreach ($move as $mv) {
            DB::table('stock')->insert([
                'item_code' => $mv->item_code,
                'item_name' => $mv->item_name,
                'qty' => $mv->qty,
                'minimum' => $mv->minimum,
                'uom' => $mv->uom,
                'location' => $mv->location,
            ]);
        } 
        DB::table('temp_register')->truncate();
        return redirect('/partcheck');
    }
    }

    public function render()
    {
        $this->items = DB::table('temp_register')->get();
        return view('livewire.table-partcheck');
    }
}