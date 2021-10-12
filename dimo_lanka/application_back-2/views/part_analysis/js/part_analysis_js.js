/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$j(function() {

});

//get the dealer name from the database
function get_dealer_name() {

    $j("#dlr_name").autocomplete({
        source: "getDealerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        focus: function(event, data) {
            $j('#dlr_id').val(data.item.delar_id);
            $j('#accnt_no').val(data.item.delar_account_no);
        }
    });
}

//functions to disable the value selected
function disable_price(id) {
    var x = document.getElementById('reason_price_' + id).selectedIndex;
//    var y = document.getElementById('reason_supply_' + id).selectedIndex;
//    var z = document.getElementById('reason_packaging_' + id).selectedIndex;
//    var w = document.getElementById('reason_awareness_' + id).selectedIndex;
    for (i = 1; i < 5; i++) {
        if (i === x) {
            document.getElementById('reason_supply_' + id).options[i].disabled = true;
            document.getElementById('reason_supply_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_packaging_' + id).options[i].disabled = true;
            document.getElementById('reason_packaging_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_awareness_' + id).options[i].disabled = true;
            document.getElementById('reason_awareness_' + id).options[i].style.color = '#DAD9D9';
        }
    }
    if (x === 0) {
        var y = document.getElementById('reason_supply_' + id).selectedIndex;
        var z = document.getElementById('reason_packaging_' + id).selectedIndex;
        var w = document.getElementById('reason_awareness_' + id).selectedIndex;

        for (var j = 0; j < 5; j++) {
            if (j === y || j === z || j === w) {

            } else {
                document.getElementById('reason_price_' + id).options[j].disabled = false;
                document.getElementById('reason_price_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_supply_' + id).options[j].disabled = false;
                document.getElementById('reason_supply_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_packaging_' + id).options[j].disabled = false;
                document.getElementById('reason_packaging_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_awareness_' + id).options[j].disabled = false;
                document.getElementById('reason_awareness_' + id).options[j].style.color = '#898989';
            }
        }
    }
}

function disable_supply(id) {
    var x = document.getElementById('reason_supply_' + id).selectedIndex;
//    var y = document.getElementById('reason_supply_' + id).selectedIndex;
//    var z = document.getElementById('reason_packaging_' + id).selectedIndex;
//    var w = document.getElementById('reason_awareness_' + id).selectedIndex;
    for (i = 1; i < 5; i++) {
        if (i === x) {
            document.getElementById('reason_price_' + id).options[i].disabled = true;
            document.getElementById('reason_price_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_packaging_' + id).options[i].disabled = true;
            document.getElementById('reason_packaging_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_awareness_' + id).options[i].disabled = true;
            document.getElementById('reason_awareness_' + id).options[i].style.color = '#DAD9D9';
        }
    }

    if (x === 0) {
        var y = document.getElementById('reason_price_' + id).selectedIndex;
        var z = document.getElementById('reason_packaging_' + id).selectedIndex;
        var w = document.getElementById('reason_awareness_' + id).selectedIndex;

        for (var j = 0; j < 5; j++) {
            if (j === y || j === z || j === w) {

            } else {
                document.getElementById('reason_price_' + id).options[j].disabled = false;
                document.getElementById('reason_price_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_supply_' + id).options[j].disabled = false;
                document.getElementById('reason_supply_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_packaging_' + id).options[j].disabled = false;
                document.getElementById('reason_packaging_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_awareness_' + id).options[j].disabled = false;
                document.getElementById('reason_awareness_' + id).options[j].style.color = '#898989';
            }
        }
    }
}


function disable_packaging(id) {
    var x = document.getElementById('reason_packaging_' + id).selectedIndex;
    for (i = 1; i < 5; i++) {
        if (i === x) {
            document.getElementById('reason_price_' + id).options[i].disabled = true;
            document.getElementById('reason_price_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_supply_' + id).options[i].disabled = true;
            document.getElementById('reason_supply_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_awareness_' + id).options[i].disabled = true;
            document.getElementById('reason_awareness_' + id).options[i].style.color = '#DAD9D9';
        }
    }

    if (x === 0) {
        var y = document.getElementById('reason_price_' + id).selectedIndex;
        var z = document.getElementById('reason_supply_' + id).selectedIndex;
        var w = document.getElementById('reason_awareness_' + id).selectedIndex;

        for (var j = 0; j < 5; j++) {
            if (j === y || j === z || j === w) {

            } else {
                document.getElementById('reason_price_' + id).options[j].disabled = false;
                document.getElementById('reason_price_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_supply_' + id).options[j].disabled = false;
                document.getElementById('reason_supply_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_packaging_' + id).options[j].disabled = false;
                document.getElementById('reason_packaging_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_awareness_' + id).options[j].disabled = false;
                document.getElementById('reason_awareness_' + id).options[j].style.color = '#898989';
            }
        }
    }
}

function disable_awareness(id) {
    var x = document.getElementById('reason_awareness_' + id).selectedIndex;
    for (i = 1; i < 5; i++) {
        if (i === x) {
            document.getElementById('reason_price_' + id).options[i].disabled = true;
            document.getElementById('reason_price_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_supply_' + id).options[i].disabled = true;
            document.getElementById('reason_supply_' + id).options[i].style.color = '#DAD9D9';
            document.getElementById('reason_packaging_' + id).options[i].disabled = true;
            document.getElementById('reason_packaging_' + id).options[i].style.color = '#DAD9D9';
        }
    }

    if (x === 0) {
        var y = document.getElementById('reason_price_' + id).selectedIndex;
        var z = document.getElementById('reason_supply_' + id).selectedIndex;
        var w = document.getElementById('reason_packaging_' + id).selectedIndex;

        for (var j = 0; j < 5; j++) {
            if (j === y || j === z || j === w) {

            } else {
                document.getElementById('reason_price_' + id).options[j].disabled = false;
                document.getElementById('reason_price_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_supply_' + id).options[j].disabled = false;
                document.getElementById('reason_supply_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_packaging_' + id).options[j].disabled = false;
                document.getElementById('reason_packaging_' + id).options[j].style.color = '#898989';
                document.getElementById('reason_awareness_' + id).options[j].disabled = false;
                document.getElementById('reason_awareness_' + id).options[j].style.color = '#898989';
            }
        }
    }
}

//get the item part number from the database
function get_part_number(id) {

    $j("#prt_no_" + id).autocomplete({
        source: "getPartNumber",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        focus: function(event, data) {
            $j('#prt_id_' + id).val(data.item.item_id);
            $j('#dscrptn_' + id).val(data.item.description);
            $j('#sell_price_' + id).val(data.item.selling_price);
        }
    });
}

//add rows in the main table
function add_row(idd, y) {

    var id = y + 1;
    $j('#' + idd).hide();

    $j('#part_analysis').append(
            '<tr id="' + id + '" name="' + id + '"> '
            + '<td><input type="button" name="addd_row_' + id + '" id="addd_row_' + id + '" value="+" onclick="add_row(this.id, ' + id + ');"></td>'
            + '<td><input type="text" name="prt_no_' + id + '" id="prt_no_' + id + '" onfocus="get_part_number(' + id + ');" autocomplete="off" placeholder="Select Part Number">'
            + '<input type="hidden" name="prt_id_' + id + '" id="prt_id_' + id + '"></td>'
            + '<td><input type="text" name="dscrptn_' + id + '" id="dscrptn_' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="sell_price_' + id + '" id="sell_price_' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="dimo_to_dealer_' + id + '" id="dimo_to_dealer_' + id + '"></td>'
            + '<td><input type="text" name="dealer_to_customer_' + id + '" id="dealer_to_customer_' + id + '"></td>'
            + '<td><select id="reason_price_' + id + '" name="reason_price_' + id + '" onchange="disable_price(' + id + ');">'
            + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
            + '<td><select id="reason_supply_' + id + '" name="reason_supply_' + id + '" onchange="disable_supply(' + id + ');">'
            + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
            + '<td><select id="reason_packaging_' + id + '" name="reason_packaging_' + id + '" onchange="disable_packaging(' + id + ');">'
            + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
            + '<td><select id="reason_awareness_' + id + '" name="reason_awareness_' + id + '" onchange="disable_awareness(' + id + ');">'
            + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
            + '<td><input type="text" id="max_price_' + id + '" name="max_price_' + id + '"></td>'
            + '<td><input type="text" id="qty_at_max_' + id + '" name="qty_at_max_' + id + '"></td>'
            + '<td><input type="text" id="remark_' + id + '" name="remark_' + id + '"></td>'
            + '<td><input type="button"  id="del_rows_' + id + '" name="del_rows_' + id + '" value="-" onclick="delete_row(' + id + ');"></td></tr>'
            );

    var table = document.getElementById('part_analysis');
    var i = (table.rows.length);
    var ck = i - 2;

    $j('#rw_coun').val(ck);
}

//delete rows from the main table
function delete_row(id) {
    $j('#' + id).remove();
    var table = document.getElementById('part_analysis');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#addd_row_' + (i)).show();

    if (ck === 0) {

        $j('#part_analysis').replace(
                '<tr id="' + 1 + '" name="' + 1 + '"> '
                + '<td><input type="button" name="addd_row_' + 1 + '" id="addd_row_' + 1 + '" value="+" onclick="add_row(this.id, ' + 1 + ');"></td>'
                + '<td><input type="text" name="prt_no_' + 1 + '" id="prt_no_' + 1 + '" onfocus="get_part_number(' + 1 + ');" autocomplete="off" placeholder="Select Part Number">'
                + '<input type="hidden" name="prt_id_' + 1 + '" id="prt_id_' + 1 + '"></td>'
                + '<td><input type="text" name="dscrptn_' + 1 + '" id="dscrptn_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="sell_price_' + 1 + '" id="sell_price_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="dimo_to_dealer_' + 1 + '" id="dimo_to_dealer_' + 1 + '"></td>'
                + '<td><input type="text" name="dealer_to_customer_' + 1 + '" id="dealer_to_customer_' + 1 + '"></td>'
                + '<td><select id="reason_price_' + 1 + '" name="reason_price_' + 1 + '" onchange="disable_price(' + 1 + ');">'
                + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
                + '<td><select id="reason_supply_' + 1 + '" name="reason_supply_' + 1 + '" onchange="disable_supply(' + 1 + ');">'
                + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
                + '<td><select id="reason_packaging_' + 1 + '" name="reason_packaging_' + 1 + '" onchange="disable_packaging(' + 1 + ');">'
                + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
                + '<td><select id="reason_awareness_' + 1 + '" name="reason_awareness_' + 1 + '" onchange="disable_awareness(' + 1 + ');">'
                + '<option value="0"></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></td>'
                + '<td><input type="text" id="max_price_' + 1 + '" name="max_price_' + 1 + '"></td>'
                + '<td><input type="text" id="qty_at_max_' + 1 + '" name="qty_at_max_' + 1 + '"></td>'
                + '<td><input type="text" id="remark_' + 1 + '" name="remark_' + 1 + '"></td>'
                + '<td><input type="hidden" id="rw_coun" name="rw_coun"></td>'
                );

    }
    $j('#rw_coun').val(ck);
}

//submit all the details to the database
function submit_part_analysis() {

    $j.ajax({
        type: 'POST',
        url: 'submitPartAnalysis',
        data: {
            data: $j('#frm_part_analysis').serializeArray()
        },
        success: function() {
            alert('Successfully Added');
            location.reload();

        },
        error: function() {

        }
    });
}