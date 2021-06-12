<div class="container">
    <div class="row">
        <div class="cell-2">Old Password</div>
        <div class="cell-3"><input wire:model.defer="password1" data-clear-button="false" type="password" data-role="input">
        @error('password1') <small class="fg-red">{{$message}}</small> @enderror
        </div>
    </div>
    <div class="row">
        <div class="cell-2">New Password</div>
        <div class="cell-3"><input wire:model.defer="password2" data-clear-button="false" type="password" data-role="input">
        @error('password2') <small class="fg-red">{{$message}}</small> @enderror
        </div>
    </div>
    <div class="row">
        <div class="cell-2">Confirm Password</div>
        <div class="cell-3"><input wire:model.defer="password3" data-clear-button="false" type="password" data-role="input">
        @error('password3') <small class="fg-red">{{$message}}</small> @enderror
        </div>
    </div>
    <div class="row">
        <div class="cell-2"></div>
        <div class="cell-2"><button class="button primary" wire:click="process" type="submit">Change Password</button>
        </div>
    </div>
</div>