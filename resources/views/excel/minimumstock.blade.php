<table >
    <thead>
        <tr>
            <th colspan="7">Minimum Stock</th>
        </tr>
        <tr>
            <th class="sortable-column">No</th>
            <th class="sortable-column">Item Code</th>
            <th class="sortable-column">Item Name</th>
            <th class="sortable-column">Qty</th>
            <th class="sortable-column">Minimum Stock</th>
            <th class="sortable-column">UOM</th>
            <th class="sortable-column">Location</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $dt)
        @if ($dt->qty <= $dt->minimum)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$dt->item_code}}</td>
            <td>{{$dt->item_name}}</td>
            <td>{{$dt->qty}}</td>
            <td>{{$dt->minimum}}</td>
            <td>{{$dt->uom}}</td>
            <td>{{$dt->location}}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>