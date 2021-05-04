<div class="container">
    <div class="row">
        <div class="cell-5">
            <input type="text" data-role="input" wire:keydown.enter="submit" wire:model="input_code" name="input_code"
                id="input_code" data-prepend="Item_Code: ">
        </div>
        <div class="cell-1">
            <button class="button primary" wire:click="submit">Submit</button>
        </div>
    </div>
    <div class="row">
        <div class="cell-12">
            <table class="table table-striped table-border cell-border" data-role="table" data-show-rows-steps="false"
                data-cls-table-top="row flex-nowrap" data-show-search="false" data-cls-rows-count="cell-md-4"
                data-pagination-short-mode="false">
                <thead>
                    <tr>
                        <th class="sortable-column">No</th>
                        <th class="sortable-column">Item Code</th>
                        <th class="sortable-column">Item Name</th>
                        <th class="sortable-column">Qty</th>
                        <th class="sortable-column">Remark</th>
                        <th class="sortable-column">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($table as $tbl)
                    <tr>
                        <td> {{$i++}} </td>
                        <td> {{$tbl->item_code}} </td>
                        <td> @if ($tbl->item_name == '') <input type="text" data-role="input" > @else {{$tbl->item_name}} @endif </td>
                        <td> <input type="text" data-role="input" value="{{$tbl->qty}}"></td>
                        <td> <input type="text" data-role="input" value="{{$tbl->remark}}"></td>
                        <td>
                            <button class="button primary small" wire:click="update('{{$tbl->item_code}}')"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></button>
                            <button class="button alert small" wire:click="delete('{{$tbl->item_code}}')"><i class="fa fa-eraser"
                                    aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="cell-12" align="right">
            <button class="button success" wire:click="prosess">Prosess</button>
        </div>
    </div>
</div>