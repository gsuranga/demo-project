/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var rowCount = 0;
$j(function() {
    $j("#start_date_mr").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
//    $j('#order_time').ptTimeSelect();

    $j("#end_date_mr").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#order_date1").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date1",
        altFormat: "yy-mm-dd"

    });
    $j('#hid_rows').val($j('#viewstock tr').length);
    rowCount = $j('#hid_rows').val();
    countRow();
});

var e = 1;

function addRow() {
    rowCount++;

    $j('#item_table').append("<tr id='row" + e + "'><td align='center'><input type='button' value='+' onClick='addRow()'/></td><td><input type='text' id='item_name_" + e + "' onfocus='get_product_names(" + e + ")' name='item_name_" + e + "'/><input type='hidden' id='hidn_token_" + e + "'  name='hidn_token_" + e + "'/></td><td align='center'><input id='available_qty_" + e + "' name='available_qty_" + e + "' type='text' disabled></td><td align='center'><input type='text' id='supply_qty_" + e + "' onkeyup='setCalculation("+e+")' name='supply_qty_" + e + "' /><input type='hidden' id='mnes_qty_" + e + "'  name='mnes_qty_" + e + "'/></td><td align='center'><input type='button' value='-' onClick='removeRow(" + e + ")' /></td></tr>");
    $j('#tbl_count').val(e);

    $j('#viewstock').append("<tr id='row" + rowCount + "'><td align='center'><input type='button' value='+' onClick='addRow()'/></td><td><input type='text' id='order_date" + rowCount + "'  name='order_date" + rowCount + "' autocomplete='off' onmouseover='set_hellodate(" + rowCount + ");' placeholder='Date'/></td><td align='center'><input id='item_name_" + rowCount + "' name='item_name_" + rowCount + "' type='text' onfocus='get_product_names(" + rowCount + ")'placeholder='Select Item'><input type='hidden' id='hidn_token_" + rowCount + "'  name='hidn_token_" + rowCount + "'/><input type='hidden' id='id_vanStock_HD" + rowCount + "'  name='id_vanStock_HD" + rowCount + "'/><input style='width: 100px' type='hidden' id='id_vanStock_HD' readonly='true'value=''/></td><td align='center'><input type='text' id='item_price" + rowCount + "' name='item_price" + rowCount + "' disabled /></td><td align='center'><input type='text' id='item_qty" + rowCount + "' name='item_qty" + rowCount + "' placeholder='Quantity' onkeyup='setprice(" + rowCount + ")'/></td><td align='center'><input type='text' id='amount" + rowCount + "' name='amount" + rowCount + "' disabled /></td><td align='center'><input type='button' value='-' onClick='removeRow(" + rowCount + ")' />  </td></tr>");
    $j('#tbl_count').val(e);
    e++;

}

function removeRow(k) {
    var count = 0;
    for (var i = 0; i < e; i++) {
        if ($j('#supply_qty_' + i).val() !== undefined) {
            count = Math.abs(count) + Math.abs($j('#supply_qty_' + i).val());
            $j('#txt_total').val(count);
        }
    }
    count = Math.abs(count) - Math.abs($j('#supply_qty_' + k).val());
    $j('#txt_total').val(count);
    $j('#row' + k).remove();


}





function get_product_names(e) {

    $j("#item_name_" + e).autocomplete({
        source: "getProducts",
        autoFocus: true,
        minLength: 1,
        select: function(event, data) {

            console.log(data.item.id_products);
            $j('#hidn_token_' + e).val(data.item.id_products);
            $j('#item_nameHD_' + e).val(data.item.id_products);




         $j.ajax({
               url: 'getstockQty?product_id_token=' + data.item.id_products,
               method: 'GET',
               success: function(data) {

                   var x = JSON.decode(data);
                   console.log(x[0]['product_price']);
                   
                   var qty=parseFloat(x[0]['qty']);
                   var relevel=parseFloat(x[0]['reorder_level']);
                   var buff=parseFloat(x[0]['buffer_stock']);
                   
                   if(qty <= buff){
                       $j('#available_qty_' + e).css('color','red');
//                        alert('buff');
                   }else if(qty <= relevel){
                       $j('#available_qty_' + e).css('color','orange');
//                       alert('relevel');
                   }
                   $j('#available_qty_' + e).val(x[0]['qty']);
                   $j('#item_price' + e).val(x[0]['product_price']);
                   $j('#product_Price_' + e).val(x[0]['product_price']);
                   

                   
                   
              },
               error: function() {
                   alert('error');
               }

           });
        }

    });

}

function getVehicleNO() {

    $j("#vehicle_no").autocomplete({
        source: "getVehicleNO",
        autoFocus: true,
        minLength: 1,
        select: function(event, data) {
            $j('#id_vehicleno').val(data.item.id_van);

        }

    });
}

function getVehicleNO1() {

    $j("#vehicle_no").autocomplete({
        source: "getVehicleNO1",
        autoFocus: true,
        minLength: 1,
        select: function(event, data) {
            $j('#id_vehicleno').val(data.item.id_van);

        }

    });
}

function get_employe_names() {

    $j("#employee_name").autocomplete({
        source: "getEmployeeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_emphsplc').val(data.item.id_employee_has_place);
            $j('#emphasPH_ID').val(data.item.id_employee_has_place);

        }
    });
}

function get_employe_names1() {

    $j("#employee_name").autocomplete({
        source: "getEmployeeNames1",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_emphas').val(data.item.id_employee_has_place);

        }
    });
}

$j("#order_date").datepicker({
    dateFormat: "yy-mm-dd",
    altField: "#order_date",
    altFormat: "yy-mm-dd"

});

function setCalculation(x) {
 var supqty = $j('#supply_qty_'+x).val();
 var availbq=$j('#available_qty_'+x).val();
 var mines=0;
 mines= availbq-supqty;
  $j('#mnes_qty_'+x).val(mines);
  $j('#mnes_qty_'+x).val(mines);
  
 
 
    var count = 0;
    for (var i = 0; i < e; i++) {
        if ($j('#supply_qty_' + i).val() !== undefined) {
            count = Math.abs(count) + Math.abs($j('#supply_qty_' + i).val());
            $j('#txt_total').val(count);
        }
    }
}


function set_hellodate(id) {

    $j("#order_date" + id).datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date" + id,
        altFormat: "yy-mm-dd"

    });
}

function set_hellodateED(id) {

    $j("#date_Edit_" + id).datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#date_Edit_" + id,
        altFormat: "yy-mm-dd"

    });
}

function setprice(rowCount) {

    var tot = 0;

    var prc = $j('#item_price' + rowCount).val();

    var supqty = $j('#item_qty' + rowCount).val();

    var tot = prc * supqty;

    $j('#amount' + rowCount).val(tot);


}

function setprice2(rowCount) {

    var tot = 0;

    var prc = $j('#product_Price_' + rowCount).val();

    var supqty = $j('#van_stok_qty_' + rowCount).val();

    var tot = prc * supqty;

    $j('#tot_' + rowCount).val(tot);


}


function countRow() {
    var count = ($j('#viewstock tr').length) - 2;


    for (var k = 0; k < count; k++) {
        $j('#add_row_' + k).hide();
    }
}




function delete_item(id) {

    var item_token_primary = $j("#item_nameHD_" + id).val();
    var van_token = $j("#id_vanStore_HD" + id).val();

    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {

        var detail = new Array();
        detail[0] = item_token_primary;
        detail[1] = van_token;


        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'deleteItem',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                alert('sucsessfully delete');
                location.reload();
            },
            error: function() {
                alert('error');
            }

        });

    }

}


function activate_and_save_to_db(id) {
    var href = $j('#manage_edit_' + id).html();

    if (!confirm('Are you sure you want to edit?')) {
        ev.preventDefault();
        return false;
    } else {
        if (href === 'Edit') {
            $j('#manage_edit_' + id).html('Save');
            $j("#date_Edit_" + id).attr("disabled", false);
            $j("#item_name_" + id).attr("readonly", false);
            $j("#product_Price_" + id).attr("readonly", true);
            $j("#van_stok_qty_" + id).attr("readonly", false);
            $j("#tot_" + id).attr("readonly", true);


        } else {

            var ItemDate = $j("#date_Edit_" + id).val();
            var VanStoreID = $j("#id_vanStore_HD" + id).val();
            var idProduct = $j("#item_nameHD_" + id).val();
            var mngVanStock_Qty = $j("#van_stok_qty_" + id).val();
            var status = 1;



            var details = new Array();
            details[0] = ItemDate;
            details[1] = VanStoreID;
            details[2] = idProduct;
            details[3] = mngVanStock_Qty;
            details[4] = status;




            var json_cast = JSON.stringify(details);
            $j.ajax({
                url: 'updateItem',
                method: 'POST',
                data: {
                    'data': json_cast
                },
                success: function(data) {
                    alert('sucsessfully update');
                    location.reload();
                },
                error: function() {
                    alert('error');
                }

            });
            $j('#manage_edit_' + id).html('Edit');
            $j("#date_Edit_" + id).attr("disabled", true);
            $j("#item_name_" + id).attr("readonly", true);
            $j("#product_Price_" + id).attr("readonly", true);
            $j("#van_stok_qty_" + id).attr("readonly", true);
            $j("#tot_" + id).attr("readonly", true);


        }

    }


}

function delete_item1(id) {

    var item_token_primary = $j("#idvan_Store_" + id).val();


    //var van_token = $j("#id_vanStore_HD" + id).val();

    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {

        var detail = new Array();
        detail[0] = item_token_primary;
        // detail[1] = van_token;


        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'deleteItem1',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                alert('sucsessfully delete');
                location.reload();
            },
            error: function() {
                alert('error');
            }

        });

    }

}

function setempId(){
  
    $id=$j('#vehicle_no').val();
      alert($id);
    $j('#emphasPH_ID').val($id);
}







