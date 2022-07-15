@extends('layouts.app')

@section('content')
<livewire:usercontrol/>
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
window.addEventListener('open_dialog_add', event => {
    Metro.dialog.open('#adduser');
});
window.addEventListener('close_dialog_add', event => {
    Metro.dialog.close('#adduser');
});
window.addEventListener('open_dialog_edit', event => {
    Metro.dialog.open('#edituser');
});
</script>
@endsection