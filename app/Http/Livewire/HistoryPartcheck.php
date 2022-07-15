<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HistoryPartcheck extends Component
{
    public $users = [];
    public $i = 1;
    public $search;

    public function update($id) {
        if (DB::table('stock')->where('status', 1)->exists()) {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Selesaikan Terlebih Dahulu Perubahan Terakhir', 'type' => 'warning']);
        }else {
            DB::table('stock')->where('item_code', $id)->update([
                'status' => 1,
            ]);
        }
    }

    public function save($id, $index){
        $name = $this->data[$index]['item_name'];
        $qty = $this->data[$index]['qty'];
        $minimum = $this->data[$index]['minimum'];
        $uom = $this->data[$index]['uom'];
        $loc = $this->data[$index]['location'];
        DB::table('stock')->where('item_code', $id)->update([
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
        if (DB::table('stock')->where('status', 1)->exists()) {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Selesaikan Terlebih Dahulu Perubahan Terakhir', 'type' => 'warning']);
        }else {
        DB::table('stock')->where('item_code', $id)->delete();
        $this->dispatchBrowserEvent('toaster', ['message' => 'Item Berhasil Di Hapus', 'type' => 'alert']);
        }
    }

    public function render()
    {
        $searchterm = $this->search."%";
        $this->users = DB::table('stock')->where('item_code', 'like', $searchterm)->orWhere('item_name', 'like', $searchterm)->get();
        return view('livewire.history-partcheck');
    }
}
