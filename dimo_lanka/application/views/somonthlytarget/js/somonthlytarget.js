/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var targettedParts = new Array();
$j(function() {
    $j("#history_div").accordion({
        collapsible: true,
        active: false,
        //autoHeight: true,
        heightStyle: "content",
    });
});


$j(function() {
    $j(function() {
        var year = new Date().getFullYear();
        $j('#target_month').monthpicker({
            pattern: 'yyyy-mm',
            selectedYear: year,
            startYear: 2000,
            finalYear: year,
            monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        });
    });
});
var all_data = [];
function  clickrowsdata(id) {
    var hiden_part_no = $j('#hiden_part_no_' + id).val();
    var hiden_item_id = $j('#hiden_item_id__' + id).val();
    var hiden_description = $j('#hiden_description_' + id).val();
    var selling_price = $j('#selling_price_' + id).val();
    var cars = [hiden_part_no, hiden_item_id, hiden_description, selling_price];
    all_data.push(cars);
}

var row_plus = 0;
function addtotbl_minimum_target() {
    var rowco = 1;

    $j.each(all_data, function(key, value) {
        console.log($j('#tbl_target_body tr').length);
        var len = $j('#tbl_target_body tr').length;

        if (len == 0) {
            apend_data_to_table(all_data, key);
        } else {
            var haspart = false;
            var minqty = 0;
            var maxqty = 0;
            var ids;
            $j('#tbl_target_body tr').each(function() {
                var row = jQuery(this).closest('tr').attr('id');
                var strs = row.split("_");

                var new_id = strs[2];
                if (all_data[key][1] == $j('#txt_responsibility_id_' + new_id).val()) {
                    haspart = true;
                    console.log(new_id + 'll' + $j('#txt_quantity_' + new_id).val());
                    minqty = $j('#txt_quantity_' + new_id).val();
                    maxqty = $j('#txt_quantity1_' + new_id).val();
                    ids = new_id;
                }

            });

            if (haspart == true) {

//                $j('<div > <table width="100%" align="center">'
//                        + '<tr style="vertical-align: top">'
//                        + '<td> Part NO '
//                        + '</td>'
//                        + '<td>:'
//                        + '</td>'
//                        + '<td>' + all_data[key][0]
//                        + '</td>'
//                        + '</tr>'
//
//                        + '<tr>'
//                        + '<td> Description'
//                        + '</td>'
//                        + '<td>:'
//                        + '</td>'
//                        + '<td>' + all_data[key][2]
//                        + '</td>'
//                        + '</tr>'
//
//                        + '<tr>'
//                        + '<td> Minimum Qty '
//                        + '</td>'
//                        + '<td>:'
//                        + '</td>'
//                        + '<td><input type="text" value="'+minqty+'" id="minqty_'+rowco+'"></>'
//                        + '</td>'
//                        + '</tr>'
//
//                        + '<tr>'
//                        + '<td> Additional Qty '
//                        + '</td>'
//                        + '<td>:'
//                        + '</td>'
//                        + '<td><input type="text" value="'+maxqty+'" id="maxqty_'+rowco+'"></>'
//                        + '</td>'
//                        + '</tr>'
//
//                        + '<tr>'
//                        + '<td colspan="3" style="color:red"> Are you sure you want to update this ? '
//                        + '</td>'
//
//                        + '</tr>'
//
//                        + '</table>').dialog({
//                    modal: true,
//                    title: 'Update Qty',
//                    zIndex: 10000,
//                    autoOpen: true,
//                    width: '350',
//                    resizable: false,
//                    buttons: {
//                        Yes: function() {
//                            console.log('ids:'+rowco+'->'+$j('#minqty_'+rowco).val());
//                            $j('#txt_quantity_'+ids).val($j('minqty_'+rowco).val());
//                            $j('#txt_quantity1_'+ids).val($j('#maxqty_'+rowco).val());
//                            $j(this).dialog("close");
//
//                        },
//                        No: function() {
//                            $j(this).dialog("close");
//                        }
//                    },
//                    close: function(event, ui) {
//                        $j(this).remove();
//                    }
//                });
//                rowco++;
            } else {
                console.log('else..' + all_data);
                apend_data_to_table(all_data, key);
            }
        }




    });
    $j("input:checkbox").attr('checked', false);
    all_data.length = 0;
    console.log('alldatalength:' + all_data.length);

}
function apend_data_to_table(all_data, key) {
    row_plus++;
    $j('#tbl_minimum_target').append(
            '<tr id="select_row_' + row_plus + '">'
            + '<td align="center" style="background-color: #8DC5E6"><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row();" src="' + URL + '/public/images/add2.png"></td>'
            + '<td style="background-color: #8DC5E6">'
            + '<input type="text" readonly="true" id="txt_responsibility_' + row_plus + '" name="txt_responsibility_' + row_plus + '" value="' + all_data[key][0] + '"/><input type="hidden" id="txt_responsibility_id_' + row_plus + '" name="txt_responsibility_id_' + row_plus + '" value="' + all_data[key][1] + '"/>'
            + '</td>'
            + '<td style="background-color: #8DC5E6">'
            + '<input type="text" readonly="true" id="txt_follow_up_' + row_plus + '" name="txt_follow_up_' + row_plus + '" value="' + all_data[key][2] + '"/> '
            + '</td>'
            + '<td style="background-color: #8DC5E6"><input type="text" readonly="true" id="txt_selling_price_' + row_plus + '" name="txt_selling_price_' + row_plus + '" value="' + all_data[key][3] + '" style="text-align: right"/></td>'
            + '<td style="background-color: #8DC5E6"><input type="text" id="txt_quantity_' + row_plus + '" autocomplete="off" value="0" style="text-align : right" onkeyup="calculatePredictedTotal();" name="txt_quantity_' + row_plus + '"/></td>'
            + '<td style="background-color: #8DC5E6"><input type="text" id="txt_quantity1_' + row_plus + '" autocomplete="off" value="0" style="text-align : right" onkeyup="calculatePredictedTotal();"  name="txt_quantity1_' + row_plus + '"/></td>'
            + '<td align="center" style="background-color: #8DC5E6"><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + row_plus + ');" src="' + URL + 'public/images/delete2.png"></td>'
            + '</tr>'
            );
    $j('#emp_count').val(row_plus);
    document.getElementById("lbl_lines").innerHTML = $j("#tbl_minimum_target tr").length - 2;
    calculatePredictedTotal();
}



function get_all_sales_officer() {
    $j("#sales_officer_name").autocomplete({
        source: "get_all_sales_officer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#sales_officer_id').val(data.item.sales_officer_id);
        }
    });

}

function get_all_dealer_name() {
    var sales_officer_id = $j('#sales_officer_id').val();

    $j("#dealer_name").autocomplete({
        source: "get_all_dealer_name?sales_officer_id=" + sales_officer_id,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);
            $j('#delar_account_no').val(data.item.delar_account_no);
            // document.getElementById("lbl_discount").html();
            document.getElementById("lbl_discount").innerHTML = ((parseFloat(data.item.discount_percentage)).toFixed(2) + "%");
            document.getElementById("txt_discount").value = (parseFloat(data.item.discount_percentage)).toFixed(2);
            calculatePredictedTotal();
        }
    });

}
function getDealerAccountNo() {
    var sales_officer_id = $j('#sales_officer_id').val();

    $j("#delar_account_no").autocomplete({
        source: "getDealerAccNo?sales_officer_id=" + sales_officer_id,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealer_id').val(data.item.delar_id);
            $j('#dealer_name').val(data.item.delar_name);
            // document.getElementById("lbl_discount").html();
            document.getElementById("lbl_discount").innerHTML = ((parseFloat(data.item.discount_percentage)).toFixed(2) + "%");
            document.getElementById("txt_discount").value = (parseFloat(data.item.discount_percentage)).toFixed(2);
            calculatePredictedTotal();
        }
    });

}

function get_all_branch_name() {
    $j("#branch_name").autocomplete({
        source: "get_all_branch_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#branch_id').val(data.item.branch_id);


        }
    });
}

function get_all_area_name() {
    $j("#area_name").autocomplete({
        source: "get_all_area_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#area_id').val(data.item.area_id);


        }
    });
}

function get_all_vehicle_part_no(id) {
    $j("#txt_responsibility_" + id).autocomplete({
        source: "get_all_vehicle_part_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#txt_responsibility_' + id).val(data.item.item_part_no);
            $j('#txt_responsibility_id_' + id).val(data.item.item_id);
            $j('#txt_follow_up_' + id).val(data.item.description);
            $j('#txt_selling_price_' + id).val(data.item.selling_price);
            calculatePredictedTotal();

        }
    });
}

//function get_all_vehicle_part_no1(id) {
//    $j("#txt_responsibility1_" + id).autocomplete({
//        source: "get_all_vehicle_part_no",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//            event.preventDefault();
//            $j('#txt_responsibility1_' + id).val(data.item.description);
//            $j('#txt_responsibility1_id_' + id).val(data.item.item_id);
//            $j('#txt_follow_up1_' + id).val(data.item.description);
//
//
//        }
//    });
//}


function get_all_vehicle_description(id) {
    $j("#txt_follow_up_" + id).autocomplete({
        source: "get_all_vehicle_description",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            event.preventDefault();
            $j('#txt_follow_up_' + id).val(data.item.description);
            $j('#txt_responsibility_id_' + id).val(data.item.item_id);
            $j('#txt_responsibility_' + id).val(data.item.item_part_no);
            $j('#txt_selling_price_' + id).val(data.item.selling_price);
            calculatePredictedTotal();

        }
    });
}

//function get_all_vehicle_description1(id) {
//    $j("#txt_follow_up1_" + id).autocomplete({
//        source: "get_all_vehicle_description",
//        width: 265,
//        selectFirst: true,
//        minlength: 1,
//        dataType: "jsonp",
//        select: function(event, data) {
//
//            $j('#txt_follow_up1_id_' + id).val(data.item.all_sales_id);
//            $j('#txt_responsibility1_' + id).val(data.item.part_no);
//
//        }
//    });
//}


//var row_plus = 1;
function add_new_row() {
    row_plus++;
    $j('#emp_count').val(row_plus);
    $j('#tbl_minimum_target').append(
            '<tr style="background: #8DC5E6;color: black;border-right-color: #000000;border-right-width: 2px" id="select_row_' + row_plus + '">'
            + '<td  align="center"><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row(' + row_plus + ');" src="' + URL + '/public/images/add2.png"/></td>'
            + '<td><input type="text" name="txt_responsibility_' + row_plus + '" id="txt_responsibility_' + row_plus + '" autocomplete="off" onfocus="get_all_vehicle_part_no(' + row_plus + ');" placeholder="Part No."/><input type="hidden" id="txt_responsibility_id_' + row_plus + '" name="txt_responsibility_id_' + row_plus + '"/></td>'
            + '<td><input type="text" name="txt_follow_up_' + row_plus + '" id="txt_follow_up_' + row_plus + '" autocomplete="off" onfocus="get_all_vehicle_description(' + row_plus + ');" placeholder="Description"/><input type="hidden" id="txt_follow_up_id_' + row_plus + '" name="txt_follow_up_id_' + row_plus + '"/></td>'
            + '<td><input type="text" readonly="true" id="txt_selling_price_' + row_plus + '" name="txt_selling_price_' + row_plus + '" style="text-align: right" value="0.00"/></td>'
            + '<td><input type="text" name="txt_quantity_' + row_plus + '" id="txt_quantity_' + row_plus + '" autocomplete="off" onkeyup="calculatePredictedTotal()" style="text-align: right" value="0"/></td>'
            + '<td><input type="text" name="txt_quantity1_' + row_plus + '" id="txt_quantity1_' + row_plus + '" autocomplete="off" onkeyup="calculatePredictedTotal()" style="text-align: right" value="0"/></td>'
            + '<td align="center"><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + row_plus + ');" src="' + URL + 'public/images/delete2.png"></td>'
            + '</tr>'
            );
    document.getElementById("lbl_lines").innerHTML = $j("#tbl_minimum_target tr").length - 2;
}

//var row_plus = 1;
function add_new_dealar_row() {
    row_plus++;
    $j('#tbl_report_s_o_monthly_target').append(
            '<tr id="select_row_' + row_plus + '">'
            + '<td><input type="button" value="+" ></td>'
            + '</tr>'
            );
}


function appendNewTargetRow(itemID, partNo, description, sellingPrice, minQty, addQty) {
    row_plus++;
    $j('#emp_count').val(row_plus);
    $j('#tbl_minimum_target').append(
            '<tr style="background: #8DC5E6;color: black;border-right-color: #000000;border-right-width: 2px" id="select_row_' + row_plus + '">'
            + '<td  align="center"><img style="width: 20px; height: 20px" type="button"   onclick="add_new_row(' + row_plus + ');" src="' + URL + '/public/images/add2.png"/></td>'
            + '<td><input type="text" name="txt_responsibility_' + row_plus + '" id="txt_responsibility_' + row_plus + '" autocomplete="off" onfocus="get_all_vehicle_part_no(' + row_plus + ');" placeholder="Part No." value="' + partNo + '"/><input type="hidden" id="txt_responsibility_id_' + row_plus + '" name="txt_responsibility_id_' + row_plus + '"/></td>'
            + '<td><input type="text" name="txt_follow_up_' + row_plus + '" id="txt_follow_up_' + row_plus + '" autocomplete="off" onfocus="get_all_vehicle_description(' + row_plus + ');" placeholder="Description" value="' + description + '"/><input type="hidden" id="txt_follow_up_id_' + row_plus + '" name="txt_follow_up_id_' + row_plus + '"/></td>'
            + '<td><input type="text" readonly="true" id="txt_selling_price_' + row_plus + '" name="txt_selling_price_' + row_plus + '" style="text-align: right" value="' + sellingPrice + '"/></td>'
            + '<td><input type="text" name="txt_quantity_' + row_plus + '" id="txt_quantity_' + row_plus + '" autocomplete="off" onkeyup="calculatePredictedTotal()" style="text-align: right" value="' + minQty + '"/></td>'
            + '<td><input type="text" name="txt_quantity1_' + row_plus + '" id="txt_quantity1_' + row_plus + '" autocomplete="off" onkeyup="calculatePredictedTotal()" style="text-align: right" value="' + addQty + '"/></td>'
            + '<td align="center"><img style="width: 20px; height: 20px" type="button"   onclick="remove_select_row(' + row_plus + ',' + itemID + ');" src="' + URL + 'public/images/delete2.png"></td>'
            + '</tr>'
            );
    document.getElementById("lbl_lines").innerHTML = $j("#tbl_minimum_target tr").length - 2;
}


function remove_select_row(row_plus, itemID) {
    $j('#select_row_' + row_plus).remove();
    row_plus = row_plus - 1;
    //document.getElementById("emp_count").value = row_plus;
    document.getElementById("lbl_lines").innerHTML = $j("#tbl_minimum_target tr").length - 2;
    calculatePredictedTotal();
    index = targettedParts.indexOf(itemID);
    console.log(index);
    targettedParts.splice(index, 1);




}

function reportsToExcel(table, name) {

    if (!table.nodeType) {
        table = document.getElementById(table);
        download(table.outerHTML, name, "application/vnd.ms-excel");
    } else {
        alert('not a table');
    }
}

function myFunction() {
    var row = document.getElementById("iresha");
    var x = row.insertCell(7);
    x.innerHTML = "Test";
    x.style.width = "400px";

}

function getDelerHistory() {

    var dealer_account_no = $j('#delar_account_no').val();
    $j.ajax({
        url: 'loadBranchWiseSalesOfficers?hidden_branch_id=' + dealer_account_no,
        method: 'GET',
        success: function(data) {

        }
    });
}


function getTargetHistory() {
    var id = 0;
    var id1 = 0;
    var dealerID = $j('#dealer_id').val();
    var selectedMonth = $j('#target_month').val();
    $j.ajax({
        url: 'drawCurrentStockAtDealer?dealer_id=' + dealerID + '&target_month=' + selectedMonth,
        method: 'POST',
        success: function(data) {
            var x = JSON.parse(data);
            console.log(x['fast_moving_items']);
            $j('#history_body').empty();
            $j('#history_body').append('<tr></tr>')
            jQuery.each(x['target_history'], function(index, value) {

                id++;
                $j('#history_body').append(
                        '<tr><td hidden="hidden">' + value['item_id'] + '</td>'
                        + '<td hidden="hidden"><input type="hidden" id="selling_price_' + id + '" value="' + value['selling_price'] + '" /></td>'
                        + '<td title="Part No." style="width: 120px;max-width: 120px;min-width: 120px;">' + value['item_part_no'] + '<input type="hidden" id="hiden_part_no_' + id + '" value="' + value['item_part_no'] + '" /><input type="hidden" id="hiden_item_id__' + id + '" value="' + value['item_id'] + '" /></td>'
                        + '<td title="Description" style="width: 200px;max-width: 200px;min-width: 200px;">' + value['description'] + '<input type="hidden" id="hiden_description_' + id + '" value="' + value['description'] + '" /></td>'
                        + '<td title="BBF" style="width: 50px;max-width: 50px;min-width: 50px;text-align: center;">' + value['bbf'] + '</td>'
                        + '<td title="Re-Order Qty" style="width: 100px;max-width: 100px;min-width: 100px;text-align: center;">' + value['re_order_qty'] + '</td>'
                        + '<td title="Current Stock" style="width: 100px;max-width: 100px;min-width: 100px;text-align: center;">' + value['current_stock'] + '</td>'
                        + '<td title="Avg. Movement" style="width: 100px;max-width: 100px;min-width: 100px;text-align: center;">' + value['movement'] + '</td>'
                        + '<td title="Month 1 Actual" style="width: 60px;max-width: 60px;min-width: 60px;text-align: center;">' + value['month1_actual'] + '</td>'
                        + '<td title="Month 1 Target" style="width: 60px;max-width: 60px;min-width: 60px;text-align: center;">' + value['month1_target'] + '</td>'
                        + '<td title="Month 2 Actual" style="width: 61px;max-width: 61px;min-width: 61px;text-align: center;">' + value['month2_actual'] + '</td>'
                        + '<td title="Month 2 Target" style="width: 61px;max-width: 61px;min-width: 61px;text-align: center;">' + value['month2_target'] + '</td>'
                        + '<td title="Month 3 Actual" style="width: 61px;max-width: 61px;min-width: 61px;text-align: center;">' + value['month3_actual'] + '</td>'
                        + '<td title="Month 3 Target" style="width: 61px;max-width: 61px;min-width: 61px;text-align: center;">' + value['month3_target'] + '</td>'
                        + '<td title="Select" style="width: 120px;max-width: 120px;min-width: 120px;text-align: center;"><img src="' + URL + 'public/images/add_1.png" id="btn_add_to_target_' + id + '" onclick="inputMinAndAdditionalQty(' + "'" + value['item_id'] + "','" + value['item_part_no'] + "','" + value['description'] + "','" + value['selling_price'] + "'" + ');"value="Add" style="height: 15px;width: 15px;cursor: pointer;"></td></tr>');
            });
            $j('#tbl_fast_moving_item_body').empty();
            $j('#tbl_fast_moving_item_body').append('<tr></tr>')
            jQuery.each(x['fast_moving_items'], function(index, value1) {
                id1++;
                $j('#tbl_fast_moving_item_body').append(
                        '<tr><td hidden="hidden">' + value1['item_id'] + '</td>'
                        + '<td hidden="hidden"><input type="hidden" id="selling_price_' + id1 + '" value="' + value1['selling_price'] + '" /></td>'
                        + '<td title="Part No." style="width: 150px;max-width: 150px;min-width: 150px;">' + value1['item_part_no'] + '<input type="hidden" id="hiden_part_no_' + id1 + '" value="' + value1['item_part_no'] + '" /><input type="hidden" id="hiden_item_id__' + id1 + '" value="' + value1['item_id'] + '" /></td>'
                        + '<td title="Description" style="width: 200px;max-width: 200px;min-width: 200px;">' + value1['description'] + '<input type="hidden" id="hiden_description_' + id1 + '" value="' + value1['description'] + '" /></td>'
                        + '<td title="Avg. Movement" style="width: 200px;max-width: 200px;min-width: 200px;text-align: center;">' + value1['quantity'] + '</td>'
                        + '<td title="Turnover" style="text-align: center;">' + value1['turnover'] + '</td>'
                        + '<td title="Select" style="width: 120px;max-width: 120px;min-width: 120px;text-align: center;"><img src="' + URL + 'public/images/add_1.png" id="btn_fmi_to_target_' + id1 + '" onclick="inputMinAndAdditionalQty(' + "'" + value1['item_id'] + "','" + value1['item_part_no'] + "','" + value1['description'] + "','" + value1['selling_price'] + "'" + ');"value="Add" style="height: 15px;width: 15px;cursor: pointer;wid"></td></tr>'
                        + '</tr>'
                        );
            });
        }
    });
}

function calculatePredictedTotal() {
    discount = parseFloat($j('#txt_discount').val());
    total = 0;
    for (i = 1; i < row_plus + 1; i++) {
        if (document.getElementById("txt_selling_price_" + i)) {
            minimumQty = parseFloat($j('#txt_quantity_' + i).val());
            additionalQty = parseFloat($j('#txt_quantity1_' + i).val());
            sellingPrice = parseFloat($j('#txt_selling_price_' + i).val());
            total += (sellingPrice * (minimumQty + additionalQty));
        }
    }
    totalAmount = parseFloat(total - (total * discount / 100)).toFixed(2);
    document.getElementById("txt_totat").value = (totalAmount);


}
// Change the selector if needed
var $table = $j('table.scroll'),
        $bodyCells = $table.find('tbody tr:first').children(),
        colWidth;

// Adjust the width of thead cells when window resizes
$j(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
        return $j(this).width();
    }).get();

    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
        $j(v).width(colWidth[i]);
    });
}).resize(); // Trigger resize handler



$j(document).ready(function() {
    $j("#dialog-form").dialog({
        autoOpen: false,
    });
    $j('#txt_min_qty').keydown(function(e) {
        if (e.keyCode == 13) {
            $j('#txt_add_qty').focus();
        }
    });
    $j('#txt_add_qty').keydown(function(e) {
        if (e.keyCode == 13) {
            $j('#btn_add_to_targets').focus();
        }
    });
});


var partNo = '';
function inputMinAndAdditionalQty(itemID, partNo, description, sellingPrice) {
    $j('#msg_div').empty();
    $j('#txt_min_qty').val('0');
    $j('#txt_add_qty').val('0');
    $j("#dialog-form").dialog({
        modal: true,
        title: partNo,
        //zIndex: 10000,
        autoOpen: true,
        width: '330',
        resizable: false,
        show: {
            effect: "slide",
            duration: 100
        },
        buttons: {
            "Add": {
                id: "btn_add_to_targets",
                text: "Add",
                click: function() {
                    minQty = $j('#txt_min_qty').val();
                    addQty = $j('#txt_add_qty').val();
                    if (minQty > 0) {
                        if (targettedParts.indexOf(itemID) < 0) {
                            targettedParts.push(itemID);
                            appendNewTargetRow(itemID, partNo, description, sellingPrice, minQty, addQty);
                            $j(this).dialog("close");
                            calculatePredictedTotal();

                        } else {
                            $j('#msg_div').empty();
                            $j('#msg_div').append(
                                    '<p style="color: #ff0f14">Part No. already exsists in target</p>'
                                    );
                        }

                    } else {
                        $j('#msg_div').empty();
                        $j('#msg_div').append(
                                '<p style="color: #FFBE01">Please insert a minimum qty</p>'
                                );
                    }
                }
            },
            No: function() {
                $j(this).dialog("close");
                $j('#txt_min_qty').val('0');
                $j('#txt_add_qty').val('0');
            }
        },
        close: function(event, ui) {
        }
    });

    //------------------------------
    //var detail = $j('#profit_detail').serialize();

}