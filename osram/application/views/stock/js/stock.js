/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getstore_names() {

    $j("#store_name").autocomplete({
        source: "getstoreNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#store_id').val(data.item.id_store);


        }
    });
}


$j(function() {
  
    $j('#allitem').hide();
    var user_type = $j("#log_type").val();
    

    if (user_type == "Assist Manager" || user_type == "Manager" || user_type == "SBU Head" || user_type == "Admin"  || user_type =="Area Sales manager") {

        $j('#employee_name').attr('disabled', false);
    } else {
        $j('#employee_name').attr('disabled', true);
        var log_employee_name = $j("#log_employee_name").val();
        $j('#employee_id').val(PHYSICALPLCAE);
        $j('#employee_name').val(log_employee_name);
        $j.ajax({
                url: 'getStoreNamesByEmployee?employee_id_token=' + PHYSICALPLCAE,
                method: 'GET',
                success: function(data) {
                    var x = JSON.decode(data);
                    $j('#store_name').empty();
                    $j.each(x, function(key, value) {
                        $j('#store_name').append('<option value=' + value['id_store'] + '>' + value['store_name'] + '</option>');
                    });
                    set_store_id();
                    $j("#submit_stock_search").submit();
                },
                error: function() {
                    alert('error');
                }

            });

    }
});

function get_employenames_by_stores() {

    $j("#employee_name").autocomplete({
        source: "getEmployeNamesbyStores",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
            $j('#employee_id').val(data.item.id_physical_place);
            $j.ajax({
                url: 'getStoreNamesByEmployee?employee_id_token=' + data.item.id_physical_place,
                method: 'GET',
                success: function(data) {
                    var x = JSON.decode(data);
                    $j('#store_name').empty();
                    $j.each(x, function(key, value) {
                        $j('#store_name').append('<option value=' + value['id_store'] + '>' + value['store_name'] + '</option>');
                    });
                    set_store_id();
                    $j("#submit_stock_search").submit();
                },
                error: function() {
                    alert('error');
                }

            });

        }
    });
}

function setPalce(id_physical_place) {

    $j.ajax({
        url: 'getStoreNamesByEmployee?employee_id_token=' + id_physical_place,
        method: 'GET',
        success: function(data) {
            var x = JSON.decode(data);
            $j('#store_name').empty();
            $j.each(x, function(key, value) {
                $j('#store_name').append('<option value=' + value['id_store'] + '>' + value['store_name'] + '</option>');
            });
            set_store_id();
            $j("#submit_stock_search").submit();
        },
        error: function() {
            alert('error');
        }

    });
}

function set_store_id() {
    var id = $j('#store_name').val();
    $j('#store_id').val(id);
}

function enable_editing_row(id) {
    var href = $j('#ch_edit_' + id).html();

    if (!confirm('Are you sure you want to Edit?')) {
        ev.preventDefault();
        return false;
    } else {
        if (href === 'Edit') {
            $j('#ch_edit_' + id).html('Save');
            $j("#qty_" + id).attr("readonly", false);

        } else {
            $j('#ch_edit_' + id).html('Edit');
            $j("#qty_" + id).attr("readonly", true);
            save_to_db(id);

        }

    }

}

function save_to_db(id) {
    var qty = $j("#qty_" + id).val();
    $j.ajax({
        url: "saveQty?token_stock_id=" + id + "&qty_ch=" + qty + "",
        method: 'GET',
        success: function(data) {
            alert('sucsessfully update');
            location.reload();
        },
        error: function() {
            alert('error');
        }

    });
}


function get_item_code() {
    $j("#itemCode").autocomplete({
        source: "getItemCode",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#itemidcode').val(data.item.id_item);

        }
    });
}
 
function get_item_name() {
   
    
    
    $j("#itemNameForStock").autocomplete({
        source: "getItemNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#itemidForStock').val(data.item.id_item);

        }
    });
}

function ExportExcel(table_id, title, rc_array) {
    if (document.getElementById(table_id).nodeName == "TABLE") {
        var dom = $j('#' + table_id).clone().get(0);
        var rc_array = (rc_array == undefined) ? [] : rc_array;
        for (var i = 0; i < rc_array.length; i++) {
            dom.tHead.rows[0].deleteCell((rc_array[i] - i));
            for (var j = 0; j < dom.tBodies[0].rows.length; j++) {
                dom.tBodies[0].rows[j].deleteCell((rc_array[i] - i));
            }
        }
        var a = document.createElement('a');
        var tit = ['<table><tr><td></td><td></td></tr><tr><td></td><td><font size="5">', title, '</font></td></tr><tr><td></td><td></td></tr></table>'];
        a.href = 'data:application/vnd.ms-excel,' + encodeURIComponent(tit.join('') + dom.outerHTML);
        a.setAttribute('download', 'gsReport_' + new Date().toLocaleString() + '.xls');
        a.click();
    } else {
        alert('Not a table');
    }
}