<div class="container">
    <div class="row mb-1 mt-3">
        <div class="cell-1">
            <p class="text-left mt-2">Item Name</p>
        </div>
        <div class="cell-3"><input type="text" wire:model.defer="item_name" data-role="input">
            @error('item_name') <small class="fg-red">Please Fill Item Name</small> @enderror</div>
        <div class="cell-1">
            <p class="text-left mt-2">Qty</p>
        </div>
        <div class="cell-1"><input type="text" wire:model.defer="qty" data-role="input">
            @error('qty') <small class="fg-red">Please Fill Qty</small> @enderror</div>
        <div class="cell-1"><input type="text" wire:model.defer="uom" data-role="input">
            @error('uom') <small class="fg-red">Please Fill Uom</small> @enderror</div>
        <div class="cell-1">
            <p class="text-left mt-2 mt-2">Rack</p>
        </div>
        <div class="cell-2"><input type="text" wire:model.defer="rack" data-role="input"></div>
    </div>
    <div class="row mb-1 flex-align-center">
        <div class="cell-1">
            <p class="text-left">Item Code</p>
        </div>
        <div class="cell-3"><input type="text" wire:model.defer="item_code" data-role="input"></div>
        <div class="cell-1">
            <p class="text-left">Location Used</p>
        </div>
        <div class="cell-2"><input type="text" wire:model.defer="location_used" data-role="input"></div>
        <div class="cell-1">
            <p class="text-left">Cost Center</p>
        </div>
        <div class="cell-2"><input type="text" wire:model.defer="cost_center" data-role="input"></div>
    </div>
    <div class="row mb-1 flex-align-center">
        <div class="cell-1">
            <p class="text-left">Purpose</p>
        </div>
        <div class="cell-3">
            <input type="checkbox" data-role="checkbox" wire:model.defer="purpose1" data-caption="New">
            <input type="checkbox" data-role="checkbox" wire:model.defer="purpose2" data-caption="Keep">
            <input type="checkbox" data-role="checkbox" wire:model.defer="purpose3" data-caption="Project">
        </div>
        <div class="cell-1">
            <p class="text-left">Remark</p>
        </div>
        <div class="cell-2">
            <input type="checkbox" data-role="checkbox" wire:model.defer="remark" data-caption="Stock">
        </div>
        <div class="cell-1"></div>
        <div class="cell-1">
            <button class="button primary" type="submit" wire:click="add">Submit</button>
        </div>
    </div>

    <div class="row">
        <div class="cell-12">
            <table class="table table-striped table-border cell-border">
                <thead>
                    <tr>
                        <th style="width:150px">Item code</th>
                        <th>Item Name</th>
                        <th style="width:150px">Qty</th>
                        <th style="width:125px">Location Use</th>
                        <th style="width:100px">Cost Center</th>
                        <th style="width:275px">Purpose</th>
                        <th style="width:50px">Remark</th>
                        <th style="width:100px">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item )
                    <tr>
                        <td><input type="text" wire:model.defer="items.{{$index}}.item_code" name="item_code"
                                data-role="input"></td>
                        <td><input type="text" wire:model.defer="items.{{$index}}.item_name" name="item_name"
                                data-role="input"></td>
                        <td><input type="text" wire:model.defer="items.{{$index}}.qty" name="qty" data-role="input">
                        </td>
                        <td><input type="text" wire:model.defer="items.{{$index}}.uom" name="uom" data-role="input">
                        </td>
                        <td><input type="text" wire:model.defer="items.{{$index}}.cost_center" name="cost_center"
                                data-role="input"></td>
                        <td>
                            <div class="row">
                                <div class="cell">
                                    <input type="checkbox" data-role="checkbox" @if($item->purpose_1 == 1) checked @else
                                    @endif wire:model.defer="items.{{$index}}.purpose_1" data-caption="New">
                                </div>
                                <div class="cell">
                                    <input type="checkbox" data-role="checkbox" @if($item->purpose_2 == 1) checked @else
                                    @endif checked wire:model.defer="items.{{$index}}.purpose_2" data-caption="Keep">
                                </div>
                                <div class="cell">
                                    <input type="checkbox" data-role="checkbox" @if($item->purpose_3 == 1) checked @else
                                    @endif checked wire:model.defer="items.{{$index}}.purpose_3" data-caption="Project">
                                </div>
                            </div>
                        </td>
                        <td><input type="checkbox" data-role="checkbox" @if($item->remark == 1) checked @else @endif
                            wire:model.defer="items.{{$index}}.remark" data-caption="Stock"></td>
                        <td>
                            <button class="button primary small" wire:click="update('{{$item->id}}', {{$index}})"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></button>
                            <button class="button alert small" wire:click="delete('{{$item->id}}')"><i
                                    class="fa fa-eraser" aria-hidden="true"></i></button>
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