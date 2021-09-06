<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithProperties;

class actualStock implements FromView
{
    public function view(): View
    {
        $data = DB::table('stock')->get();
        return view('excel.stock', ['data' => $data, 'i' => 1]);
    }
    
    public function properties(): array
    {
        return [
            'creator'        => 'Mada Baskoro',
            'lastModifiedBy' => 'Mada Baskoro',
            'title'          => 'Spare Part Stock Data',
            'description'    => 'Actual Stock Data',
            'subject'        => 'Actual Stock Spare Parts Data',
            'keywords'       => 'Data,Stock,Spare parts',
            'category'       => 'Stock',
            'manager'        => 'Mada Baskoro',
            'company'        => 'Panasonic',
        ];
    }
}
