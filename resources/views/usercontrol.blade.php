@extends('layouts.app')

@section('content')
<div class="container">
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
            <input type="text" wire:model.lazy="search" data-role="input" name="search" id="search" data-prepend="Search: ">
        </div>
        <div class="cell-8" align="right">
        <button class="button primary" onclick="Metro.dialog.open('#adduser')">New User</button>
        </div>
    </div>
    <div class="row">
        <div class="cell-12">
        <table class="table table-striped table-border cell-border">
                <thead>
                    <tr>
                        <th style="width:50px">No</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email Approve 01</th>
                        <th>Email Approve 02</th>
                        <th style="width:100px">Option</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $index => $user )
                    <tr>
                        <td> {{$i++}} </td>
                        <td> {{$user->name}}</td>
                        <td> {{$user->approve01}}</td>
                        <td> {{$user->approve02}}</td>
                        <td>
                            <button class="button primary small" wire:click="edit('{{$user->id}}')"><i class="fa fa-pencil"
                                    aria-hidden="true"></i></button>
                            <button class="button alert small" wire:click="delete('{{$user->id}}')"><i class="fa fa-eraser"
                                    aria-hidden="true"></i></button>
                        </td>
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

<!-- Dialog New user -->
<div class="dialog" data-role="dialog" id="adduser">
    <div class="dialog-title">Add New User</div>
    <div class="dialog-content">
        <div class="row">
        <div class="cell-3">Name</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="name" data-clear-button="false" type="text"></div>
        </div>
        <div class="row">
        <div class="cell-3">Username</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="username" data-clear-button="false" type="text"></div>
        </div>
        <div class="row">
        <div class="cell-3">Password</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="password1" data-clear-button="false" type="password"></div>
        </div>
        <div class="row">
        <div class="cell-3"></div>
        <div class="cell-6"><input data-role="input" wire:model.defer="password2" data-clear-button="false" type="password"></div>
        </div>
        <div class="row">
        <div class="cell-3">Approval 01</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="approve01" data-clear-button="false" type="text"></div>
        </div>
        <div class="row">
        <div class="cell-3">Approval 02</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="approve02" data-clear-button="false" type="text"></div>
        </div>
    </div>
    <div class="dialog-actions">
        <button wire:click="add" class="button success js-dialog-close">Add</button>
        <button class="button warning js-dialog-close">Cancel</button>
    </div>
</div>

<!-- Dialog Edit user -->
<div class="dialog" data-role="dialog" id="edituser">
    <div class="dialog-title">Add New User</div>
    <div class="dialog-content">
        <div class="row">
        <div class="cell-3">Name</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="name" data-clear-button="false" type="text"></div>
        </div>
        <div class="row">
        <div class="cell-3">Approval 01</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="approve01" data-clear-button="false" type="text"></div>
        </div>
        <div class="row">
        <div class="cell-3">Approval 02</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="approve02" data-clear-button="false" type="text"></div>
        </div>
        <div class="row border border-right-none border-top-none border-left-none"></div>
        <div class="row">
        <div class="cell-3">Password</div>
        <div class="cell-6"><input data-role="input" wire:model.defer="password1" data-clear-button="false" type="password"></div>
        </div>
        <div class="row">
        <div class="cell-3"></div>
        <div class="cell-6"><input data-role="input" wire:model.defer="password2" data-clear-button="false" type="password"></div>
        </div>
    </div>
    <div class="dialog-actions">
        <button wire:click="add" class="button success js-dialog-close">Add</button>
        <button class="button warning js-dialog-close">Cancel</button>
    </div>
</div>

<script>
window.addEventListener('toaster', event => {
    var options = {
        showTop: true,
        timeout: 2000,
        distance: 80,
        clsToast: event.detail.type
    };
    Metro.toast.create(event.detail.message, null, null, null, options);
});
</script>
@endsection