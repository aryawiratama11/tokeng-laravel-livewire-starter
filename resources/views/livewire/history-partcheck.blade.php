<div class="container">
    <div class="row">
        <div class="cell-4">
            <input type="text" wire:model.lazy="search" data-role="input" name="search" id="search" data-prepend="Search: ">
        </div>
        <div class="cell-8" align="right">
            <a href="/new/register" class="button info"><i class="fa fa-cubes" aria-hidden="true"> </i>
                New Register</a>
        </div>
    </div>
    <div class="row">
        <div class="cell-12">
        <table class="table table-striped table-border cell-border">
            <!-- <table class="table table-striped table-border cell-border" data-role="table" data-show-rows-steps="false"
                data-cls-table-top="row flex-nowrap" data-cls-search="cell-md-4" data-show-search="false"
                data-cls-rows-count="cell-md-4"> -->
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Item Code</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Minimum Stock</th>
                        <th>UOM</th>
                        <th>Location</th>
                        <th  style="width:100px">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $dt)
                    @if ($dt->status == 0)
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
                                wire:click="update('{{$dt->item_code}}', {{$index}})"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></button>
                            <button class="button alert small" wire:click="delete('{{$dt->item_code}}')"><i
                                    class="fa fa-eraser" aria-hidden="true"></i></button>
                        </td>
                    </tr>
                    @else
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$dt->item_code}}</td>
                        <td><input type="text" wire:model.defer="data.{{$index}}.item_name" name="item_name" id="item_name" data-role="input"></td>
                        <td><input type="text" wire:model.defer="data.{{$index}}.qty" name="qty" id="qty" data-role="input"></td>
                        <td><input type="text" wire:model.defer="data.{{$index}}.minimum" name="minimum" id="minimum" data-role="input"></td>
                        <td><input type="text" wire:model.defer="data.{{$index}}.uom" name="uom" id="uom" data-role="input"></td>
                        <td><input type="text" wire:model.defer="data.{{$index}}.location" name="location" id="location" data-role="input"></td>
                        <td>
                            <button class="button success small"
                                wire:click="save('{{$dt->item_code}}', {{$index}})"><i class="fa fa-floppy-o"
                                    aria-hidden="true"></i> <span>  Save</span></button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>