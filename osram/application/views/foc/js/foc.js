/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {

    $j("#tabs").tabs();

    
    if(UserType ==='Sales Rep'){
        $j('#emp_name').val(EmpName);
        $j('#emp_has').val(PlaceID);
        $j('#emp_name').attr('readonly', true);        
    }
    
});

function check_all_orders() {
    var raw_count = $j('#raw_count').val();
    var isChecked = $j('#all_acc').prop('checked');
    if (isChecked) {
        for (var x = 1; x <= raw_count; x++) {
            $j('#check_' + x).prop("checked", true);
        }
    } else {
        for (var x = 1; x <= raw_count; x++) {
            $j('#check_' + x).prop("checked", false);
        }
    }
}

function submit_accept() {
    var warrenty_id = [];
    var update_rows = 0;
    var raw_count = $j('#raw_count').val();
    for (var x = 1; x <= raw_count; x++) {
        var isChecked = $j('#check_' + x).prop('checked');
        if (isChecked) {
            var warr_id_ = $j('#warr_rett_' + x).val();
            var id_item_ = $j('#id_item_' + x).val();
            var item_qty_ = $j('#item_qty_' + x).val();
            var emp_has = $j('#emp_has_' + x).val();
            if (warr_id_ != '') {
                update_rows++;
                var json_ar = {"warr_id": warr_id_,
                    "id_item": id_item_,
                    "item_qty": item_qty_,
                    "emp_has": emp_has
                };
                warrenty_id.push(json_ar);
            }

        }

    }
    if (update_rows != 0) {
        $j.ajax({
            url: 'warrenty_accept',
            method: 'POST',
            data: {
                'warrenty_id': warrenty_id
            },
            success: function(data) {
                location.reload();
//                    alert('Successfully Accepted '+update_rows +' FOC\'s');
            },
            error: function() {
                alert('error');
            }

        });
    } else {
        alert('No Rows Selected For The Action. ');
    }

}
function search_empName() {

    $j("#emp_name").autocomplete({
        source: "search_empName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#emp_has').val(data.item.id_employee_has_place);
            $j('#emp_type').val(data.item.id_employee_type);
            $j('#emp_phy').val(data.item.id_physical_place);


        }
    });
}
function search_item() {

    $j("#item_name").autocomplete({
        source: "search_item",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_item').val(data.item.id_item);
        }
    });
}
function search_Outlet() {
//    alert('aaaaaaaaa');
    $j("#Outlet_name").autocomplete({
        source: "search_Outlet",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_Outlet').val(data.item.id_outlet);
        }
    });
}
function search_foc() {

    $j.ajax({
        url: 'drawFocView',
        method: 'POST',
        data: 
            $j('#search_data').serialize(),
        success: function(data) {

            $j('#serch1').empty();

            $j('#serch1').html(data);
//                    location.reload();
//                    alert('Successfully Accepted '+update_rows +' FOC\'s');
        },
        error: function() {
            alert('error');
        }

    });
}
function clear_data(){

    $j('#emp_name').val("");
    $j('#emp_has').val("");
    $j('#emp_type').val("");
    $j('#emp_phy').val("");
    $j('#item_name').val("");
    $j('#id_item').val("");
    $j('#Outlet_name').val("");
    $j('#id_Outlet').val("");
    $j('#from').val("");
    $j('#to').val("");

}