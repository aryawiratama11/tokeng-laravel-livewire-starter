<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithProperties;

class partOut implements FromView
{
    public function view(): View
    {
        $data = DB::table('partout')->limit(100)->orderBy('date', 'desc')->get();
        return view('excel.partout', ['table' => $data, 'i' => 1]);
    }
    
    public function properties(): array
    {
        return [
            'creator'        => 'Mada Baskoro',
            'lastModifiedBy' => 'Mada Baskoro',
            'title'          => 'Spare Part Stock Data Output',
            'description'    => 'Actual Stock Data',
            'subject'        => 'Actual Stock Spare Parts Data Output',
            'keywords'       => 'Data,Stock,Spare parts, Output',
            'category'       => 'Stock Output',
            'manager'        => 'Mada Baskoro',
            'company'        => 'Panasonic',
        ];
    }
}
