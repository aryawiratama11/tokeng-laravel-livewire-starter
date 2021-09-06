<table>
    <thead>
        <tr>
            <th colspan="7">Actual Stock</th>
        </tr>
        <tr>
            <th>No</th>
            <th>Item Code</th>
            <th>Item Name</th>
            <th>Qty</th>
            <th>Minimum Stock</th>
            <th>UOM</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $index => $dt)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$dt->item_code}}</td>
            <td>{{$dt->item_name}}</td>
            <td>{{$dt->qty}}</td>
            <td>{{$dt->minimum}}</td>
            <td>{{$dt->uom}}</td>
            <td>{{$dt->location}}</td>
        </tr>
        @endforeach
    </tbody>
</table>