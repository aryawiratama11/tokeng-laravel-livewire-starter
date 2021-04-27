@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
        <div class="card-header">
                <table style="width:100%">
                <tr>
                <td>
                Part Out
                </td>
                <td align="right">
                            <a href="/partin" class="button success shadowed small"><i class="fa fa-sign-in"
                                    aria-hidden="true"> </i> Part In</a>
                            <a href="/partout" class="button alert shadowed small"><i class="fa fa-sign-out"
                                    aria-hidden="true"> </i> Part Out</a>
                            <a href="/partquest" class="button dark shadowed small"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"> </i> Part Request</a>
                            <a href="/partcheck" class="button info shadowed small"><i class="fa fa-cubes"
                                    aria-hidden="true"> </i> Stock</a>
                        </td>
                </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                <div class="row">
                <div class="cell-5">
                <input type="text" data-role="input" data-prepend="Item_Code: ">
                </div>
                <div class="cell-1">
                <button class="button primary" wire:click="submit">Submit</button>
                </div>
                </div>
                    <div class="row">
                        <div class="cell-12">
                        <div class="row"></div>
                            <table class="table table-striped table-border cell-border" data-cls-table-top="row flex-nowrap" data-cls-search="cell-md-8" data-cls-rows-count="cell-md-4">
                                <thead>
                                    <tr>
                                        <th class="sortable-column">No</th>
                                        <th class="sortable-column">Item Code</th>
                                        <th class="sortable-column">Item Name</th>
                                        <th class="sortable-column">Qty</th>
                                    </tr>
                                </thead>
                                <livewire:table-partout />
                            </table>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection