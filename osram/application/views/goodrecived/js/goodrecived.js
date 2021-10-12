/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



function create_good_recived(id) {
    if (!confirm('Are you sure you want to convert this into Good Received ?')) {
        ev.preventDefault();
        return false;
    } else {
        var detail = new Array();
        var hidden_purchase_order = $j("#hidden_purchase_order_" + id).val();
        detail[0] = hidden_purchase_order;
        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'createDiliveryNote',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                console.log(data);
                $j('#row_'+id).remove();
                location.reload();
            },
            error: function() {
                alert('error');
            }

        });
    }
}

function get_employee_names() {
    
    $j("#manage_employee_name").autocomplete({
        source: "getEmployeeNamesByGood",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#manage_employee_name_id').val(data.item.id_employee_has_place);
        }
    });
}



function get_grn_no() {
    
    $j("#grn_no").autocomplete({
        source: "getGrnByGood",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#grn_no_hidden_token').val(data.item.id_good_received);
        }
    });
}

function delete_good_recived(id) {
    
    if (!confirm('Are you sure you want to Delete?')) {
        ev.preventDefault();
        return false;
    } else {
        var detail = new Array();
        var hidden_grn_no_token = $j("#hidden_grn_no" + id).val();
        detail[0] = hidden_grn_no_token;
        var json_cast = JSON.stringify(detail);
        
        $j.ajax({
            url: 'deleteGrn',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                $j('#row_'+id).remove();
                alert('sucsessfully deleted');
            },
            error: function() {
                alert('error');
            }

        });
    }
}

$j(function (){
   
    $j("#start_grn").datepicker({
        dateFormat: "yy:mm:dd",
        altField: "#start_grn",
        altFormat: "yy:mm:dd"

    });

    $j("#end_grn").datepicker({
        dateFormat: "yy:mm:dd",
        altField: "#end_grn",
        altFormat: "yy:mm:dd"

    });
    
    var user_type = $j("#log_type").val();

    if (user_type == "Distributor" || user_type == "Sales Rep") {
        var log_id_employee = $j("#log_id_employee").val();
        var log_employee_name = $j("#log_employee_name").val();
        $j('#manage_employee_name').val(log_employee_name);
        $j('#manage_employee_name_id').val(log_id_employee);
        
        $j('#manage_employee_name').attr('disabled',true);
    }
    
});