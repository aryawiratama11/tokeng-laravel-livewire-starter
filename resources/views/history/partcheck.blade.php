@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <table style="width:100%">
                    <tr>
                        <td>
                            Stock Barang
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
            <livewire:history-partcheck />
            </div>
        </div>
    </div>
</div>

<div class="dialog" data-role="dialog" id="demoDialog1">
    <div class="dialog-title" id="dialog-title"></div>
    <div class="dialog-content">
    @csrf
        <input hidden id="itemcode" type="text">
        <div class="row">
        <div class="cell-4">Item Name</div>
        <div class="cell-8"><input id="item_name" type="text" data-role="input"></div>
        </div>
        <div class="row">
        <div class="cell-4">Item Qty</div>
        <div class="cell-5"><input id="item_qty" type="text" data-role="input"> </div>
        <div class="cell-3"><input id="item_uom" type="text" data-role="input" data-clear-button="false"> </div>
        </div>
        <div class="row">
        <div class="cell-4">Minimum Stock</div>
        <div class="cell-8"><input id="minimum_stock" type="text" data-role="input"></div>
        </div>
        <div class="row">
        <div class="cell-4">Location</div>
        <div class="cell-8"><input id="location" type="text" data-role="input"></div>
        </div>
        <div class="row">
        <div class="cell-4">Remark</div>
        <div class="cell-8"><input id="remark" type="text" data-role="input"></div>
        </div>
    </div>
    <div class="dialog-actions">
        <button class="button" onclick="update()">Process</button>
        <button class="button primary" onclick="Metro.dialog.close('#demoDialog1')">Cancel</button>
    </div>
</div>

<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function deleted(id) {
axios.get('/stock/delete/' + id)
  .then(function (response) {
    var options = {
        showTop: true,
        timeout: 2000,
        distance: 80,
        clsToast: 'alert'
    };
    Metro.toast.create('Item Berhasil Dihapus', null, null, null, options);
  });
}
function showmodal(id) {
axios.get('/stock/data/' + id)
  .then(function (response) {
    document.getElementById("dialog-title").innerHTML = 'Rubah Item ' + id;
    document.getElementById("itemcode").value = id;
    document.getElementById("item_name").value = response.data[0].item_name;
    document.getElementById("item_qty").value = response.data[0].qty;
    document.getElementById("item_uom").value = response.data[0].uom;
    document.getElementById("minimum_stock").value = response.data[0].minimum;
    document.getElementById("location").value = response.data[0].location;
    document.getElementById("remark").value = response.data[0].remark;
  });
  Metro.dialog.open('#demoDialog1')
}
function update(id) {
axios.post('/stock/update', {
    _token    : document.getElementsByName("_token")[0].value,
    item_code : document.getElementById("itemcode").value,
    name      : document.getElementById("item_name").value,
    qty       : document.getElementById("item_qty").value, 
    uom       : document.getElementById("item_uom").value,
    minim     : document.getElementById("minimum_stock").value,
    location  : document.getElementById("location").value,
    remark    : document.getElementById("remark").value,
}).then(function (response) {
    Metro.dialog.close('#demoDialog1')
    var options = {
        showTop: true,
        timeout: 2000,
        distance: 80,
        clsToast: 'success'
    };
    Metro.toast.create('Item Berhasil Dirubah', null, null, null, options);
    location.reload();
  })
  .catch(function (error, response) {
    var options = {
        showTop: true,
        timeout: 2000,
        distance: 80,
        clsToast: 'alert'
    };
    Metro.toast.create(error, null, null, null, options);
  });
}
</script>
@endsection