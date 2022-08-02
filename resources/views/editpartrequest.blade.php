@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Edit Part Request {{strtoupper($refer)}}
                        </td>
                        <td align="right">
                            <a href="{{ route('part_in') }}" class="button success shadowed small"><i
                                    class="fa fa-sign-in" aria-hidden="true"> </i> <span> </span> Part In</a>
                            <a href="{{ route('part_out') }}" class="button alert shadowed small"><i
                                    class="fa fa-sign-out" aria-hidden="true"> </i> <span> </span> Part Out</a>
                            <a href="{{ route('part_request') }}" class="button dark shadowed small"><i
                                    class="fa fa-shopping-cart" aria-hidden="true"> </i> <span> </span> Part Request</a>
                            <a href="{{ route('part_check') }}" class="button info shadowed small"><i
                                    class="fa fa-cubes" aria-hidden="true"> </i> <span> </span> Stock</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <livewire:history-partrequest :post="$refer" />
                <br>
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