<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;

class TablePartrequest extends Component
{
    public $input_code;
    public $items = [];

    public $item_code;
    public $item_name;
    public $qty;
    public $uom;
    public $rack;
    public $location_used;
    public $cost_center;
    public $purpose1;
    public $purpose2;
    public $purpose3;
    public $remark;

    protected $rules = [
        'item_name' => 'required',
        'qty' => 'required',
        'uom' => 'required',
    ];

    public function add() {
        $this->validate();
        $a1 = Auth::user();
            DB::table('temp_partrequest')->insert([
                'item_code' => $this->item_code,
                'item_name' => $this->item_name,
                'qty' => $this->qty,
                'uom' => $this->uom,
                'rack' => $this->rack,
                'location_used' => $this->location_used,
                'cost_center' => $this->cost_center,
                'purpose_1' => $this->purpose1 ?: 0,
                'purpose_2' => $this->purpose2 ?: 0,
                'purpose_3' => $this->purpose3 ?: 0,
                'remark' => $this->remark ?: 0,
                'user' => $a1->username
            ]);
    }

    public function update($id, $index) {
        $a1 = Auth::user();
        $code     = $this->items[$index]['item_code'];
        $name     = $this->items[$index]['item_name'];
        $qty      = $this->items[$index]['qty'];
        $uom      = $this->items[$index]['uom'];
        $rack     = $this->items[$index]['rack'];
        $location = $this->items[$index]['location_used'];
        $cost     = $this->items[$index]['cost_center'];
        $purposea  = $this->items[$index]['purpose_1'];
        $purposeb  = $this->items[$index]['purpose_2'];
        $purposec  = $this->items[$index]['purpose_3'];
        $remark   = $this->items[$index]['remark'];

        DB::table('temp_partrequest')->where('id', $id)->where('user', $a1->username)->update([
            'item_code' => $code,
            'item_name' => $name,
            'qty' => $qty,
            'uom' => $uom,
            'rack' => $rack,
            'location_used' => $location,
            'cost_center' => $cost,
            'purpose_1' => $purposea ?: 0,
            'purpose_2' => $purposeb ?: 0,
            'purpose_3' => $purposec ?: 0,
            'remark' => $remark ?: 0,
        ]);
        $this->dispatchBrowserEvent('toaster', ['message' => 'Item Berhasil Dirubah', 'type' => 'success']);
    }
    
    public function delete($id) {
        DB::table('temp_partrequest')->where('id', $id)->delete();
        $this->dispatchBrowserEvent('toaster', ['message' => 'Item Berhasil Dihapus', 'type' => 'warning']);
    }

    public function prosess() {
        $a1 = Auth::user();
        $move = DB::table('temp_partrequest')->where('user', $a1->username)->get();
        foreach ($move as $mv) {
            DB::table('partrequest')->insert([
                "noref" => strtoupper(base_convert(date('YmdHis').$a1->id,10,32)),
                "date" => date('Y-m-d'),
                'item_code' => $mv->item_code,
                'item_name' => $mv->item_name,
                'qty' => $mv->qty,
                'uom' => $mv->uom,
                'rack' => $mv->rack,
                'location_used' => $mv->location_used,
                'cost_center' => $mv->cost_center,
                'purpose_1' => $mv->purpose_1,
                'purpose_2' => $mv->purpose_2,
                'purpose_3' => $mv->purpose_3,
                'remark' => $mv->remark,
                'user' => $a1->username,
            ]);
        } 
        DB::table('temp_partrequest')->where('user', $a1->username)->delete();
        return redirect('/partrequest');
    }
    public function render()
    {
        $a1 = Auth::user();
        $this->items = DB::table('temp_partrequest')->where('user' , $a1->username)->get();
        return view('livewire.table-partrequest');
    }
}
