@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            History Part Request
                        </td>
                        <td align="right">
                            <a href="/partin" class="button success shadowed small"><i class="fa fa-sign-in"
                                    aria-hidden="true"> </i> <span> </span> Part In</a>
                            <a href="/partout" class="button alert shadowed small"><i class="fa fa-sign-out"
                                    aria-hidden="true"> </i> <span> </span> Part Out</a>
                            <a href="/partrequest" class="button dark shadowed small"><i class="fa fa-shopping-cart"
                                    aria-hidden="true"> </i> <span> </span> Part Request</a>
                            <a href="/partcheck" class="button info shadowed small"><i class="fa fa-cubes"
                                    aria-hidden="true"> </i> <span> </span> Stock</a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="cell-4 my-search-wrapper"></div>
                        <div class="cell-8" align="right">
                            <a href="/new/partrequest" class="button dark"><i class="fa fa-sign-out" aria-hidden="true">
                                </i>
                                New Request</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="cell-12">
                            <div class="row"></div>
                            <table class="table striped table-border mt-4" data-role="table"
                                data-show-rows-steps="false" data-cls-search="cell-md-4" data-show-search="true"
                                data-search-wrapper=".my-search-wrapper" data-cls-rows-count="cell-md-4">
                                <thead>
                                    <tr>
                                        <th class="sortable-column" data-size="50">No</th>
                                        <th class="sortable-column" data-size="150">Tanggal</th>
                                        <th class="sortable-column">No Referensi</th>
                                        <th class="sortable-column" data-size="150">User</th>
                                        <th class="sortable-column" data-size="100">Status</th>
                                        <th data-size="175">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($table as $tbl)
                                    <tr>
                                        <td> {{$i++}} </td>
                                        <td> {{date('d/m/Y', strtotime($tbl->date))}} </td>
                                        <td> <a href="/detail/partrequest/{{$tbl->noref}}">{{strtoupper($tbl->noref)}}</a></td>
                                        <td> {{$tbl->user}} </td>
                                        <td>
                                            @if ($tbl->approved_1 == 1)
                                            <button class="button primary small"><i class="fa fa-check-square-o"
                                                    aria-hidden="true"></i>
                                            </button>
                                            @else
                                            <button class="button primary small"><i class="fa fa-square-o"
                                                    aria-hidden="true"></i>
                                            </button>
                                            @endif
                                            @if ($tbl->approved_2 == 1)
                                            <button class="button info small"><i class="fa fa-check-square-o"
                                                    aria-hidden="true"></i>
                                            </button>
                                            @else
                                            <button class="button info small"><i class="fa fa-square-o"
                                                    aria-hidden="true"></i>
                                            </button>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/edit/partrequest/{{$tbl->noref}}" class="button success small"><i class="fa fa-pencil"
                                                    aria-hidden="true"></i> <span> Edit</span></i>
                                            </a>
                                            <a href="/delete/partrequest/{{$tbl->noref}}" class="button alert small"><i class="fa fa-trash"
                                                    aria-hidden="true"></i> <span> Delete</span></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>

<script>

</script>
@endsection