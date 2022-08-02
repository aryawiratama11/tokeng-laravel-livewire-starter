<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Mail\NotifyService;
use Illuminate\Support\Facades\Mail;

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
            $this->dispatchBrowserEvent('toaster', ['message' => 'Barang Tidak Tersedia', 'type' => 'warning']);
        }else {
            $count   = DB::table('stock')->where('item_code', $id)->select('qty')->value('qty');
            if ($count < $qty) {
                $this->dispatchBrowserEvent('toaster', ['message' => 'Kuantitas Kurang Dari yang Tersedia', 'type' => 'warning']);
            }
            else {
                DB::table('temp_partout')->updateOrInsert([
                    'item_code' => $id, 'item_name' => $item_name
                 ],['qty' => $qty]);
                 $this->dispatchBrowserEvent('toaster', ['message' => 'Barang Berhasil Di Tambah', 'type' => 'success']);
            }
        }
        $this->input_code = "";
        $this->emit('focused');
    }

    public function update($id, $index) {
        $qty    = $this->items[$index]['qty'];
        $remark = $this->items[$index]['remark'];
        $count   = DB::table('stock')->where('item_code', $id)->select('qty')->value('qty');
        if ($count < $qty) {
            $this->dispatchBrowserEvent('toaster', ['message' => 'Kuantitas Kurang Dari yang Tersedia', 'type' => 'warning']);
        } else{
            $item_name = DB::table('stock')->where('item_code', $id)->select('item_name')->value('item_name');
            DB::table('temp_partout')->where('item_code', $id)->update([
                'item_name' => $item_name,
                'qty' => $qty,
                'remark' => $remark
            ]);
            $this->dispatchBrowserEvent('toaster', ['message' => 'Kuantitas Berhasil Dirubah', 'type' => 'success']);
        }
    }
    
    public function delete($id) {
        DB::table('temp_partout')->where('item_code', $id)->delete();
        $this->dispatchBrowserEvent('toaster', ['message' => 'Barang Berhasil Dihapus', 'type' => 'alert']);
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
            if (DB::table('stock')->where('item_code', $mv->item_code)->value('qty') <= DB::table('stock')->where('item_code', $mv->item_code)->value('minimum')) {
                DB::table('temp_data')->insert([
                    'refer' => $mv->item_code,
                    'value' => date('Ymd'),
                    'type'  => 'EMPSTCK',
                ]);
            } else {
                // Do Nothing
            }
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