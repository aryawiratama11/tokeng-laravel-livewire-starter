<!DOCTYPE html>
<html lang="en">
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
    <h3>Dear All</h3>

    We are here by remind you about empty stock on Tokeng 
    <br>(Please Check Table Below)
    <br>
    <table>
        <tr>
            <td>Item Code</td>
            <td>Item Name</td>
            <td>Qty</td>
            <td>Location</td>
        </tr>
        @foreach ($data as $dt)
        <tr>
            <td>{{$dt->item_code}}</td>
            <td>{{$dt->item_name}}</td>
            <td>{{$dt->qty}} {{$dt->uom}}</td>
            <td>{{$dt->location}}</td>
        </tr>
        @endforeach
    </table>
    <br>Thank You.
    <br>Tokeng Teams.
    <p style="color:red">{{$easter}}</p>
    
</body>
</html>