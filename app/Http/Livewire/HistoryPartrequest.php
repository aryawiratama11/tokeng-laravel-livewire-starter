<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Auth;

class HistoryPartrequest extends Component
{
    public $post;
    public $items = [];
    public $refer;

    public function mount($post) {
        $this->refer = $post;
    }

    public function delete($id) {
        $a1 = Auth::user();
        DB::table('partrequest')->where('user', $a1->username)->where('id', $id)->delete();
    }

    public function prosess($no) {
        $a1 = Auth::user();
        $index = DB::table('partrequest')->where('user', $a1->username)->where('noref', $no)->count();
        for ($i = 0; $i < $index;$i++) {
            $idref    = $this->items[$i]['id'];
            $code     = $this->items[$i]['item_code'];
            $name     = $this->items[$i]['item_name'];
            $qty      = $this->items[$i]['qty'];
            $uom      = $this->items[$i]['uom'];
            $rack     = $this->items[$i]['rack'];
            $location = $this->items[$i]['location_used'];
            $cost     = $this->items[$i]['cost_center'];
            $purpose1 = $this->items[$i]['purpose_1'];
            $purpose2 = $this->items[$i]['purpose_2'];
            $purpose3 = $this->items[$i]['purpose_3'];
            $remark   = $this->items[$i]['remark'];
            DB::table('partrequest')->where('user', $a1->username)->where('id', $idref)->update([
                'item_code' => $code,
                'item_name' => $name,
                'qty' => $qty,
                'uom' => $uom,
                'rack' => $rack,
                'location_used' => $location,
                'cost_center' => $cost,
                'purpose_1' => $purpose1 ?: 0,
                'purpose_2' => $purpose2 ?: 0,
                'purpose_3' => $purpose3 ?: 0,
                'remark' => $remark ?: 0,
            ]);
        }
        return redirect('/partrequest');
    }

    public function render()
    {
        $this->items = DB::table('partrequest')->where('noref', $this->refer)->get();
        return view('livewire.history-partrequest');
    }
}
