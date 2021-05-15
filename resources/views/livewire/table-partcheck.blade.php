<div class="container-fluid">
    <div class="row">
        <div class="cell-5">
            <input type="text" data-role="input" wire:keydown.enter="submit" wire:model.defer="input_code" name="input_code"
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
                    @foreach ($items as $index => $item )
                    <tr>
                        <td> {{$item->item_code}} </td>
                        <td> <input type="text" wire:model.defer="items.{{$index}}.item_name" name="item_name" data-role="input" ></td>
                        <td> <input type="text" data-role="input" wire:model.defer="items.{{$index}}.qty" name="qty"></td>
                        <td> <input type="text" data-role="input" wire:model.defer="items.{{$index}}.minimum" name="minimum"></td>
                        <td> <input type="text" data-role="input" wire:model.defer="items.{{$index}}.uom" name="uom"></td>
                        <td> <input type="text" data-role="input" wire:model.defer="items.{{$index}}.location" name="location"></td>
                        <td>
                            @if ($item->status == 1)
                            <button class="button success small" wire:click="update('{{$item->item_code}}', {{$index}})"><i class="fa fa-floppy-o"
                                    aria-hidden="true"></i> <span>  Save</span></button> 
                            @else 
                            <button class="button primary small" wire:click="update('{{$item->item_code}}', {{$index}})"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></button> 
                            @endif
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