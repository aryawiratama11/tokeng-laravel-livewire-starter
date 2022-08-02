<div class="container">
    <div class="row">
        <div class="cell-4 my-search-wrapper">
        </div>
        <div class="cell-8" align="right">
            <a href="{{ route('new_register') }}" class="button info"><i class="fa fa-cubes" aria-hidden="true"> </i>
                New Register</a>
            <a href="{{ route('excel', 'stock') }}" class="button primary"><i class="fa fa-file-excel-o"
                                    aria-hidden="true"> </i> <span> </span> Download Data</a>
        </div>
    </div>
    <div class="row">
        <div class="cell-12">
        <!-- <table class="table table-striped table-border cell-border"> -->
            <table class="table table-striped table-border cell-border" data-role="table" data-show-rows-steps="false"
                data-search-wrapper=".my-search-wrapper"
                data-cls-table-top="row flex-nowrap" data-cls-search="cell-md-4"
                data-cls-rows-count="cell-md-4">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Minimum Stock</th>
                        <th>UOM</th>
                        <th>Location</th>
                        <th style="width:100px">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $dt)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$dt->item_code}}</td>
                        <td>{{$dt->item_name}}</td>
                        <td>{{$dt->qty}}</td>
                        <td>{{$dt->minimum}}</td>
                        <td>{{$dt->uom}}</td>
                        <td>{{$dt->location}}</td>
                        <td>
                            <button class="button primary small"
                                    onclick="showmodal('{{$dt->item_code}}')"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></button>
                            <button class="button alert small" onclick="deleted('{{$dt->item_code}}')"><i
                                class="fa fa-eraser" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
