<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Concerns\WithTitle;

class minimumStock implements FromView
{
    public function view(): View
    {
        $data = DB::table('stock')->orderBy('qty', 'asc')->get();
        return view('excel.minimumstock', ['data' => $data, 'i' => 1]);
    }
    
    public function properties(): array
    {
        return [
            'creator'        => 'Mada Baskoro',
            'lastModifiedBy' => 'Mada Baskoro',
            'title'          => 'Spare Part Minimum Stock Data',
            'description'    => 'Actual Minimum Stock Data',
            'subject'        => 'Actual Minimum Stock Spare Parts Data',
            'keywords'       => 'Data,Stock,Spare parts, Minimum',
            'category'       => 'Minimum Stock',
            'manager'        => 'Mada Baskoro',
            'company'        => 'Panasonic',
        ];
    }
}
