<div class="container-fluid">
    <div class="row">
        <div class="cell-5">
            <input type="text" autofocus data-role="input" wire:keydown.enter="submit" wire:model.defer="input_code" name="input_code"
                id="input_code" data-prepend="Item_Code: ">
        </div>
        <div class="cell-1">
            <button class="button primary" wire:click="submit">Submit</button>
        </div>
    </div>
    <div class="row">
        <div class="cell-12">
            <table class="table table-striped table-border cell-border">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th style="width:100px">Qty</th>
                        <th>Remark</th>
                        <th style="width:100px">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item )
                    <tr>
                        <td> {{$i++}} </td>
                        <td> {{$item->item_code}} </td>
                        <td> @if ($item->item_name == '') <input type="text" wire:model.defer="items.{{$index}}.item_name" name="item_name"data-role="input" > @else {{$item->item_name}} @endif </td>
                        <td> <input type="text" data-role="input" wire:model.defer="items.{{$index}}.qty" name="qty"></td>
                        <td> <input type="text" data-role="input" wire:model.defer="items.{{$index}}.remark" name="remark"></td>
                        <td>
                            <button class="button primary small" wire:click="update('{{$item->item_code}}', {{$index}})"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></button>
                            <button class="button alert small" wire:click="delete('{{$item->item_code}}')"><i class="fa fa-eraser"
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