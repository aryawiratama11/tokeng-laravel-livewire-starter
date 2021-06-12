@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Rubah Password
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
            <livewire:changepassword/>
            </div>
        </div>
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