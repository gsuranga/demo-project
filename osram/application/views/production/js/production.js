
var row = 1;
var field_row = 1;
$j(function() {
    $j("#date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#expdate",
        altFormat: "yy-mm-dd",
        minDate: 0
    });
    $j('#exp_' + field_row).datepicker({dateFormat: 'yy-mm-dd', minDate: 0, maxDate: "+1000Y +10D"});
    $j('#time').ptTimeSelect();
});


function add_row(id) {

    var row_count = $j("#row_count_" + id).val();
    var outputTbl1 = document.getElementById('tabel_1');
    var idd = (outputTbl1.rows.length - 3);
    
    var row = idd;
    var field_row = idd;

    $j('#id_hidden_row').val(row);
    $j("#tabel_" + id).append('<tr id="tr_' + field_row + '"><td width="55" height="25" align="center">' +
            '<input type="hidden" id="total_' + field_row + '" name="total_' + field_row + '"/></td>' +
            '<td width="366" align="center" class="border_bottom_left">' +
            '<input name="item_' + field_row + '" type="text" class="body_text" id="item_' + field_row + '" size="50" onfocus="get_item_names(this.id,' + field_row + ');" placeholder="Select Item"/>' +
            '<input name="item_id_' + field_row + '" type="hidden" value="" id="item_id_' + field_row + '" /></td>' +
            '<td width="144" align="center" class="border_bottom_left">' +
            '<input name="exp_' + field_row + '" type="text" class="body_text" id="exp_' + field_row + '" size="15" /></td>' +
            '<td width="111" align="center" class="border_bottom_left">' +
            '<input name="qty_' + field_row + '" type="text" class="body_text" id="qty_' + field_row + '" size="10"  style="text-align:right" onkeyup="calc_total_uc();calc_total_up();"/></td>' +
            '<td width="111" align="center" class="border_bottom_left_right">' +
            '<input name="uc_' + field_row + '" type="text" class="body_text" id="uc_' + field_row + '" size="12" onkeyup="calc_total_uc();" style="text-align:right"/></td>' +
            '<td width="111" align="center" class="border_bottom_left">' +
            '<input name="up_' + field_row + '" type="text" class="body_text" id="up_' + field_row + '" size="10" onkeyup="calc_total_up();" style="text-align:right" /></td>' +
            '<td><input type="hidden" id="total_' + field_row + '" name="total_' + field_row + '" "/>' +
            '<img  src="' + URL + 'public/images/delete.png" width="16" height="16" onclick="del_row(' + field_row + ')" /></td></tr>');

    $j('#exp_' + field_row).datepicker({dateFormat: 'yy-mm-dd', minDate: 0, maxDate: "+1000Y +10D"});
    $j("#row_count_" + id).val(idd);
    var send = 'div_' + id + '_' + idd;

    $j("#t_count").val(id);


}

function product22(id1, id2) {

    $("#item_" + id1 + "_" + id2).autocomplete("../models/autocomplete/autocomplete_model.php", {
        width: 272,
        matchContains: true,
        selectFirst: false
    });
}


function get_batch_no() {

    $j("#batch_no").autocomplete({
        source: "getBatchNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_batch').val(data.item.id_batch);
        }
    });
}

function get_division_name() {

    $j("#division_name").autocomplete({
        source: "getDivisionName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#id_division').val(data.item.id_division);

        }
    });


}

function get_employee_name() {

    $j("#employee_first_name").autocomplete({
        source: "getEmployeeName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_employee').val(data.item.id_employee);
        }
    });

}

function get_Production_code() {

    $j("#production_code").autocomplete({
        source: "getProductionCode",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#id_production').val(data.item.id_production);
        }
    });


}

///////////////////////////////

function del_row(ID) {
    try {
        var table = document.getElementById('tabel_1');
        table.deleteRow(ID);
        var id = (table.rows.length);


        var outputTbl1 = document.getElementById('tabel_1');
        var idd = (outputTbl1.rows.length - 2);
        //alert(idd);
        $j('#id_hidden_row').val(idd - 1);
        calc_total_uc();
        calc_total_up();
    } catch (e) {
        
    }
}

function get_item_names(id, hidden_id) {

    $j("#" + id).autocomplete({
        source: "getItems",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#item_id_' + hidden_id).val(data.item.id_item);
        }
    });
}
function calc_total_uc() {

    var total = 0;
    var row_count = $j('#id_hidden_row').val();
    $j('#tot_uc').val('');
    for (i = 1; i <= row_count; i++) {
        console.log(i);
        var amount = "uc_" + i;
        var qty = "qty_" + i;
        if (document.getElementById(amount) && $j('#' + amount).val() != "") {
            total += parseFloat($j('#' + amount).val()) * parseFloat($j('#' + qty).val());
        }
    }
    $j('#tot_uc').val(total);
}

function calc_total_up() {
    var total = 0;
    var row_count = $j('#id_hidden_row').val();
    $j('#tot_up').val('');
    for (i = 1; i <= row_count; i++) {
        console.log(i);
        var amount = "up_" + i;
        var qty = "qty_" + i;
        if (document.getElementById(amount) && $j('#' + amount).val() != "") {
            total += parseFloat($j('#' + amount).val()) * parseFloat($j('#' + qty).val());
        }
    }
    $j('#tot_up').val(total);
}
function get_employee_names(id, hidden_field) {
   
    $j("#" + id).autocomplete({
        source: "getEmployeeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            
           
            $j('#' + hidden_field).val(data.item.id_employee);
        }
    });

}