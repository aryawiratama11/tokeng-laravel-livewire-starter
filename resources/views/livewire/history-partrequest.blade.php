<div class="container">
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
                        <th style="width:50px">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $index => $item )
                    <tr>
                        <td hidden><input type="text" wire:model.defer="items.{{$index}}.id" name="id"
                                data-role="input"></td>
                        <td><input type="text" wire:model.defer="items.{{$index}}.item_code" name="item_code"
                                data-role="input"></td>
                        <td><input type="text" wire:model.defer="items.{{$index}}.item_name" name="item_name"
                                data-role="input"></td>
                        <td>
                            <div class="row">
                                <div class="cell">
                                    <input type="text" data-clear-button="false" wire:model.defer="items.{{$index}}.qty"
                                        name="qty" data-role="input">
                                </div>
                                <div class="cell">
                                    <input type="text" data-clear-button="false" wire:model.defer="items.{{$index}}.uom"
                                        name="uom" data-role="input">
                                </div>
                            </div>
                        </td>
                        <td><input type="text" data-clear-button="false" wire:model.defer="items.{{$index}}.location_used" name="location_used"
                                data-role="input"></td>
                        <td><input type="text" data-clear-button="false" wire:model.defer="items.{{$index}}.cost_center"
                                name="cost_center" data-role="input"></td>
                        <td>                            <div class="row">
                                <div class="cell">
                                <input type="checkbox" data-role="checkbox" @if($item->purpose_1 == 1) checked @else @endif wire:model.defer="items.{{$index}}.purpose_1" data-caption="New">
                                </div>
                                <div class="cell">
                                <input type="checkbox" data-role="checkbox" @if($item->purpose_2 == 1) checked @else @endif wire:model.defer="items.{{$index}}.purpose_2" data-caption="Keep">
                                </div>
                                <div class="cell">
                                <input type="checkbox" data-role="checkbox" @if($item->purpose_3 == 1) checked @else @endif wire:model.defer="items.{{$index}}.purpose_3" data-caption="Project">
                                </div>
                            </div></td>
                        <td><input type="checkbox" data-role="checkbox" @if($item->remark == 1) checked @else @endif wire:model.defer="items.{{$index}}.remark" data-caption="Stock"></td>
                        <td>
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
            <button class="button success" wire:click="prosess('{{$refer}}')">Prosess</button>
        </div>
    </div>
</div>