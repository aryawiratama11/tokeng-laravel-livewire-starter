<tbody>
@foreach ($table as $tbl)
    <tr>
        <td> {{$i}} </td>
        <td> {{$tbl->item_code}} </td>
        <td> {{$tbl->item_name}} </td>
        <td> {{$tbl->qty}} </td>
        <td> {{$tbl->remark}} </td>
    </tr>
@endforeach
</tbody>