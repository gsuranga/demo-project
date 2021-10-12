/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {

    $j("#tabs").tabs();

    $j("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    var user_type = $j("#log_type").val();

    if (user_type == "Distributor" || user_type == "Sales Rep") {
        var log_id_employee = $j("#log_id_employee").val();
        var log_employee_name = $j("#log_employee_name").val();
        $j('#manage_employee_name').val(log_employee_name);
        $j('#manage_employee_name_id').val(log_id_employee);

        $j('#manage_employee_name').attr('disabled', true);
    }


});

function isNumberKey(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function save_update_qty() {
    var rowCount = $j('#token_dilivers').val();

    rowCount++;
    var qtys = [];
    var update_rows = 0;
    for (var x = 1; x < rowCount; x++) {

        var isChecked = $j('#ch_di_' + x).prop('checked');

        if (isChecked) {

            var dil_token = $j('#dil_token_' + x).val();
            var txt_di = $j('#txt_di_' + x).val();

            if (txt_di != '') {
                update_rows++;
                var json_ar = {"dil_token": dil_token, "txt_di": txt_di};
                qtys.push(json_ar);
            }
        }


    }

    var token_dilivers_id = $j('#token_dilivers_id').val();
    if (update_rows != 0) {
        $j.ajax({
            url: 'update_dil_qty',
            method: 'POST',
            data: {
                'token_dilivers_id': token_dilivers_id, 'qtys': qtys
            },
            success: function(data) {
                location.reload();
                alert(update_rows + ' Rows Successfully Update');
            },
            error: function() {
                alert('error');
            }

        });
    } else {
        alert('No Rows Selected For The Action. ');
    }

}




function edit_field_row(id) {
    var isChecked = $j('#ch_di_' + id).prop('checked');

    if (isChecked) {
        $j('#txt_di_' + id).attr("readonly", false);
    } else {
        $j('#txt_di_' + id).attr("readonly", true);
    }
}

function num(id) {

    var isChecked = $j('#ch_di_' + id).prop('checked');
    if (isChecked) {
        $j("#txt_di_" + id).keypress(function(e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                $j("#errmsg_" + id).css("color", "red");
                $j("#errmsg_" + id).html("Digits Only").show().fadeOut("slow");
                return false;
            } else {

            }
        });
    } else {

    }


}

function get_order_no() {

    $j("#manage_pod_no").autocomplete({
        source: "getPurcahseOrders",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#manage_podprimary_no').val(data.item.id_dilivery_note);


        }
    });
}

function key_total(id) {
    var price = $j('#price_' + id).val();
    var txt_di = $j('#txt_di_' + id).val();
    var txt_amount = $j('#txt_amount_' + id).text();

    var isChecked = $j('#ch_di_' + id).prop('checked');

    if (isChecked) {
        if (price != '' && txt_di != '') {

            $j('#txt_amount_' + id).text((parseFloat(price) * parseFloat(txt_di)).toFixed(2));

            var rowCount = $j('#token_dilivers').val();
            rowCount++;
            var damount = 0;
            for (var x = 1; x < rowCount; x++) {
                var txt_amount_tr = $j('#txt_amount_' + x).text();
                var xd = txt_amount_tr.replace(',', '');
                damount += parseFloat(xd);
            }
            $j('#amount_orde').text(damount.toFixed(2));
        }
    }


}


function get_employee_no() {

    $j("#manage_employee_name").autocomplete({
        source: "getEmployesByDiliverNote",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#manage_employee_name_id').val(data.item.id_employee_has_place);


        }
    });
}


function delete_diliver_order(id) {

    if (!confirm('Are you sure you want to Delete?')) {
        ev.preventDefault();
        return false;
    } else {
        var detail = new Array();
        var hidden_id_dilivery_note_token = $j("#hidden_purchase_order_" + id).val();
        detail[0] = hidden_id_dilivery_note_token;
        var json_cast = JSON.stringify(detail);

        $j.ajax({
            url: 'deleteDiliver',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                $j('#row_' + id).remove();
                alert('sucsessfully deleted');
            },
            error: function() {
                alert('error');
            }

        });
    }
}

function create_good_recived(id) {
    if (!confirm('Are you sure you want to convert this into Good Received Note ?')) {
        ev.preventDefault();
        return false;
    } else {
        var detail = new Array();
        var hidden_purchase_order = $j("#hidden_purchase_order_" + id).val();
        detail[0] = hidden_purchase_order;
        var json_cast = JSON.stringify(detail);

        $j.ajax({
            url: 'inserGoodRecived',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                alert(data);
                $j('#row_' + id).remove();
                location.reload();
            },
            error: function() {
                alert('error');
            }

        });
    }
}

