<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithProperties;

class partIn implements FromView
{
    public function view(): View
    {
        $data = DB::table('partin')->orderBy('date', 'desc')->get();
        return view('excel.partin', ['table' => $data, 'i' => 1]);
    }
    
    public function properties(): array
    {
        return [
            'creator'        => 'Mada Baskoro',
            'lastModifiedBy' => 'Mada Baskoro',
            'title'          => 'Spare Part Input',
            'description'    => 'Actual Stock Data Input',
            'subject'        => 'Actual Stock Spare Parts Data Input',
            'keywords'       => 'Data,Stock,Spare parts, Input',
            'category'       => 'Stock Input',
            'manager'        => 'Mada Baskoro',
            'company'        => 'Panasonic',
        ];
    }
}
