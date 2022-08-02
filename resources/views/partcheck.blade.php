@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Stock Barang
                        </td>
                        <td align="right">
                            <a href="{{ route('part_in') }}" class="button success shadowed small"><i
                                    class="fa fa-sign-in" aria-hidden="true"> </i> <span> </span> Part In</a>
                            <a href="{{ route('part_out') }}" class="button alert shadowed small"><i
                                    class="fa fa-sign-out" aria-hidden="true"> </i> <span> </span> Part Out</a>
                            <a href="{{ route('part_request') }}" class="button dark shadowed small"><i
                                    class="fa fa-shopping-cart" aria-hidden="true"> </i> <span> </span> Part Request</a>
                            <a href="{{ route('part_check') }}" class="button info shadowed small"><i
                                    class="fa fa-cubes" aria-hidden="true"> </i> <span> </span> Stock</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row mb-2">
                        <div class="cell-md-4 my-search-wrapper"></div>
                        <div class="cell-md-6"></div>
                        <div class="cell-md-2 my-rows-wrapper" align="right"> <a href="/excel/minimumstock"
                                class="button primary"><i class="fa fa-file-excel-o" aria-hidden="true"> </i> <span>
                                </span> Download Data</a></div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table table-striped table-border cell-border" data-role="table"
                                data-show-rows-steps="false" data-cls-table-top="row flex-nowrap"
                                data-search-wrapper=".my-search-wrapper" data-cls-rows-count="cell-md-4">
                                <thead>
                                    <tr>
                                        <th class="sortable-column">No</th>
                                        <th class="sortable-column">Item Code</th>
                                        <th class="sortable-column">Item Name</th>
                                        <th class="sortable-column">Qty</th>
                                        <th class="sortable-column">Minimum Stock</th>
                                        <th class="sortable-column">UOM</th>
                                        <th class="sortable-column">Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $dt)
                                    @if ($dt->qty <= $dt->minimum)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$dt->item_code}}</td>
                                            <td>{{$dt->item_name}}</td>
                                            <td>{{$dt->qty}}</td>
                                            <td>{{$dt->minimum}}</td>
                                            <td>{{$dt->uom}}</td>
                                            <td>{{$dt->location}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
@endsection