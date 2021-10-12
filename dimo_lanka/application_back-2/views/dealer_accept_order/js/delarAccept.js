function createDeliver(x) {
    window.open(URL + "dealer_accept_order/drawIndex_edit_delear_Accept_order?k=1&accc=" + x, null, "height=600,width=1200,status=yes,toolbar=no,menubar=no,top=20,left=20");
}




function deleteRow(id) {

    var ordid = $j('#orderdetail_' + id).val();

$j('#delete_' + id).val('1')
    $j('#' + id).hide();
    var table = document.getElementById('tbl_purchaseorder');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#add_row_' + (i)).show();
    if (ck === 0) {
        $j('#add').hide();
    }
    

    count();
    loadFreeItem();
}

function addDelearAcc() {
    if (!confirm('Are you sure you want to Accept?')) {
        ev.preventDefault();
        return false;
    } else {
        var dataes = $j('#tvc_form').serialize();
        console.log(dataes);

        $j.ajax({
            url: 'getOrderDetailForAccept',
            type: 'POST',
            data: dataes,
            success: function(data) {
              
              
                 window.close();
                 window.opener.location.reload();


            }


        });
        //console.log(dataes);
    }

}