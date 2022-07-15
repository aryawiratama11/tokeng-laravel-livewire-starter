@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            History Part In
                        </td>
                        <td align="right">
                            <a href="/partin" class="button success shadowed small"><i class="fa fa-sign-in"
                                    aria-hidden="true"> </i> <span> </span> Part In</a>
                            <a href="/partout" class="button alert shadowed small"><i class="fa fa-sign-out"
                                    aria-hidden="true"> </i> <span> </span> Part Out</a>
                            <a href="/partrequest" class="button dark shadowed small"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"> </i> <span> </span> Part Request</a>
                            <a href="/partcheck" class="button info shadowed small"><i class="fa fa-cubes"
                                    aria-hidden="true"> </i> <span> </span> Stock</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-4 my-search-wrapper"></div>
                        <div class="cell-8" align="right">
                            <a href="/new/partin" class="button success"><i class="fa fa-sign-out" aria-hidden="true">
                                </i>
                                New Request</a>
                            <a href="/excel/partin" class="button primary"><i class="fa fa-file-excel-o"
                                    aria-hidden="true"> </i> <span> </span> Download Data</a></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <div class="row"></div>
                            <table class="table table-striped table-border cell-border" data-role="table"
                                data-show-rows-steps="false" data-cls-table-top="row flex-nowrap" data-search-wrapper=".my-search-wrapper"
                                data-cls-search="cell-md-4" data-show-search="true" data-cls-rows-count="cell-md-4">
                                <thead>
                                    <tr>
                                        <th class="sortable-column">No</th>
                                        <th class="sortable-column">Tanggal</th>
                                        <th class="sortable-column">Item Code</th>
                                        <th class="sortable-column">Item Name</th>
                                        <th class="sortable-column">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($table as $tbl)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{date('d/m/Y', strtotime($tbl->date))}} </td>
                                        <td> {{$tbl->item_code}} </td>
                                        <td> {{$tbl->item_name}} </td>
                                        <td> {{$tbl->qty}} </td>
                                    </tr>
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