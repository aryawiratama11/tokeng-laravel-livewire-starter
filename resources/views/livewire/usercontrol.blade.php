<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            User Control
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-4">
                            <input type="text" wire:model.lazy="search" data-role="input" name="search" id="search"
                                data-prepend="Search: ">
                        </div>
                        <div class="cell-8" align="right">
                            <button class="button primary" wire:click="adduser">New User</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table table-striped table-border cell-border">
                                <thead>
                                    <tr>
                                        <th style="width:50px">No</th>
                                        <th>Name</th>
                                        <th>Nik</th>
                                        <th>Email</th>
                                        <th style="width:100px">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $index => $user )
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$user->name}}</td>
                                        <td> {{$user->username}}</td>
                                        <td> {{$user->email}}</td>
                                        <td>
                                            <button class="button primary small" wire:click="edit('{{$user->id}}')"><i
                                                    class="fa fa-pencil" aria-hidden="true"></i></button>
                                            <button class="button alert small" wire:click="delete('{{$user->id}}')"><i
                                                    class="fa fa-eraser" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" align="center"> Empty Data </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dialog New user -->
    <div wire:ignore class="dialog" data-role="dialog" id="adduser">
        <div class="dialog-title">Add New User</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell-3">Name</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="name_add" data-clear-button="true"
                        type="text">
                </div>
            </div>
            <div class="row">
                <div class="cell-3">NIK</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="nik_add" data-clear-button="true"
                        type="number"></div>
            </div>
            <div class="row">
                <div class="cell-3">Email</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="email_add" data-clear-button="true"
                        type="text">
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Password</div>
                <div class="cell-8"><input data-role="input" wire:model.defer="password1_add" data-clear-button="true"
                        type="password"></div>
            </div>
            <div class="row">
                <div class="cell-3"></div>
                <div class="cell-8"><input data-role="input" wire:model.defer="password2_add" data-clear-button="true"
                        type="password"></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button primary" wire:click="tambah">New User</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>

    <div wire:ignore class="dialog" data-role="dialog" id="edituser">
        <div class="dialog-title">Edit New User</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell-3">Name</div>
                <div class="cell-6"><input data-role="input" wire:model.defer="name_edit" data-clear-button="false"
                        required type="text">
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Email</div>
                <div class="cell-6"><input data-role="input" wire:model.defer="email_edit" data-clear-button="false"
                        required type="text">
                </div>
            </div>
            <div class="row border border-right-none border-top-none border-left-none"></div>
            <div class="row">
                <div class="cell-3">Password</div>
                <div class="cell-6"><input data-role="input" wire:model.defer="password1_edit" data-clear-button="false"
                        required type="password"></div>
            </div>
            <div class="row">
                <div class="cell-3"></div>
                <div class="cell-6"><input data-role="input" wire:model.defer="password2_edit" data-clear-button="false"
                        required type="password"></div>
            </div>
        </div>
        <div class="dialog-actions">
            <button wire:click="save" class="button success js-dialog-close">Save</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>
</div>