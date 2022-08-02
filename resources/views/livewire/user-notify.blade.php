<div class="container2">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Notify Configuration
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
                            <button class="button primary" wire:click="add">Add Recieve</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <table class="table table-striped table-border cell-border">
                                <thead>
                                    <tr>
                                        <th style="width:50px">No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th style="width:100px">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($senders as $index => $sender )
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{$sender->name}}</td>
                                        <td> {{$sender->email}}</td>
                                        <td> {{$sender->type}}</td>
                                        <td>
                                            <button class="button alert small" wire:click="delete('{{$sender->id}}')"><i
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
    <!-- Dialog Add user recieve -->
    <div wire:ignore class="dialog" data-role="dialog" id="adduser">
        <div class="dialog-title">Add User Email Notify</div>
        <div class="dialog-content">
            <div class="row">
                <div class="cell-3">User</div>
                <div class="cell-8">
                <select data-role="select" onChange="update1()" id="onuser">
                        <option value="">Pilih User</option>
                    @foreach ($usermails as $index => $usermail)
                        <option value="{{$usermail->email}}">{{$usermail->username}} - {{$usermail->name}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="row">
                <div class="cell-3">Type</div>
                <div class="cell-8">
                <select data-role="select" onChange="update2()" id="ontype">
                    <option value="">Pilih Opsi</option>
                    <option value="To">To</option>
                    <option value="cc">cc</option>
                </select>
                </div>
            </div>
        </div>
        <div class="dialog-actions">
            <button class="button primary" wire:click="save">save</button>
            <button class="button warning js-dialog-close">Cancel</button>
        </div>
    </div>
</div>