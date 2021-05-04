@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Input Part In
                        </td>
                        <td align="right">
                            <a href="/partin" class="button success shadowed small"><i class="fa fa-sign-in"
                                    aria-hidden="true"> </i> Part In</a>
                            <a href="/partout" class="button alert shadowed small"><i class="fa fa-sign-out"
                                    aria-hidden="true"> </i> Part Out</a>
                            <a href="/partquest" class="button dark shadowed small"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"> </i> Part Request</a>
                            <a href="/partcheck" class="button info shadowed small"><i class="fa fa-cubes"
                                    aria-hidden="true"> </i> Stock</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
            <livewire:table-partin />
                <br>
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection