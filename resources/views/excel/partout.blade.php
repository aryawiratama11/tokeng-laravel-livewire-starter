<table>
    <thead>
        <tr>
            <th colspan="5">Part Output</th>
        </tr>
        <tr>
            <th class="sortable-column">No</th>
            <th class="sortable-column">Tanggal</th>
            <th class="sortable-column">Item Code</th>
            <th class="sortable-column">Item Name</th>
            <th class="sortable-column">Qty</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($table as $tbl)
        <tr>
            <td> {{$i++}} </td>
            <td> {{date('d/m/Y', strtotime($tbl->date))}} </td>
            <td> {{$tbl->item_code}} </td>
            <td> {{$tbl->item_name}} </td>
            <td> {{$tbl->qty}} </td>
        </tr>
        @endforeach
    </tbody>
</table>