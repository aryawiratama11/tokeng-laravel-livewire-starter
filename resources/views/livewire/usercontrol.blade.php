<div class="container">
    <div class="row">
        <div class="cell-4">
            <input type="text" wire:model.lazy="search" data-role="input" name="search" id="search" data-prepend="Search: ">
        </div>
        <div class="cell-8" align="right">
        <button class="button primary" onclick="Metro.dialog.open('#demoDialog1')">New User</button>
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
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Dialog New user -->
<div class="dialog" data-role="dialog" id="demoDialog1">
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