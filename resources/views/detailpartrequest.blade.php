@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Edit Part Request {{strtoupper($refer)}}
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
                        <div class="cell-12">
                            <table class="table table-striped table-border cell-border">
                                <thead>
                                    <tr>
                                        <th style="width:150px">Item code</th>
                                        <th>Item Name</th>
                                        <th style="width:100px">Qty</th>
                                        <th style="width:125px">Location Use</th>
                                        <th style="width:100px">Cost Center</th>
                                        <th style="width:275px">Purpose</th>
                                        <th style="width:50px">Remark</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($record as $rc)
                                    <tr>
                                        <td>{{$rc->item_code}}</td>
                                        <td>{{$rc->item_name}}</td>
                                        <td>{{$rc->qty}} {{$rc->uom}}</td>
                                        <td>{{$rc->location_used}}</td>
                                        <td>{{$rc->cost_center}}</td>
                                        <td>
                                            <div class="row">
                                                <div class="cell">
                                                    <input type="checkbox" data-role="checkbox" readonly @if($rc->purpose_1 ==
                                                    1) checked @else @endif data-caption="New">
                                                </div>
                                                <div class="cell">
                                                    <input type="checkbox" data-role="checkbox" readonly @if($rc->purpose_2 ==
                                                    1) checked @else @endif data-caption="Keep">
                                                </div>
                                                <div class="cell">
                                                    <input type="checkbox" data-role="checkbox" readonly @if($rc->purpose_3 ==
                                                    1) checked @else @endif data-caption="Project">
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="checkbox" data-role="checkbox" readonly @if($rc->remark == 1) checked
                                            @else @endif data-caption="Stock"></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection