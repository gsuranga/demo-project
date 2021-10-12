//get the calender
$j(function() {

    $j("#date_from").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#deadline",
        altFormat: "yy-mm-dd"
    });

    $j("#date_to").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#deadline",
        altFormat: "yy-mm-dd"
    });

});

//get the item part number from the database
function get_part_number(id) {

    $j("#part_number_" + id).autocomplete({
        source: "getPartNumber",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        focus: function(event, data) {
            $j('#part_id_' + id).val(data.item.item_id);
            $j('#discriptn_' + id).val(data.item.description);
            $j('#model_' + id).val(data.item.vehicle_model_local);
            $j('#amd_' + id).val(data.item.avg_monthly_demand);
            $j('#stock_' + id).val(data.item.total_stock_qty);
            $j('#avg_cost_' + id).val(data.item.avg_cost);
            $j('#selling_price_' + id).val(data.item.selling_price);

            get_tot();
        }
    });
}

//function to calculate the total of avg_cost, selling price and display in the footer
function get_tot() {

    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var row = idd - 2;

    var avg_cost_tot = 0;
    for (var i = 1; i <= row; i++) {
        var rw = table.rows[i];
        var m = rw.id;
        var val = parseFloat($j('#avg_cost_' + m).val());
        avg_cost_tot += val;
    }
    document.getElementById("avg_cost_tot").innerHTML = avg_cost_tot.toFixed(2);

    var selling_price_tot = 0;
    for (var k = 1; k <= row; k++) {
        var rw = table.rows[k];
        var p = rw.id;
        var val = parseFloat($j('#selling_price_' + p).val());
        selling_price_tot += val;
    }
    document.getElementById("selling_price_tot").innerHTML = selling_price_tot.toFixed(2);
}

//calculate the discounted_sp and its total when onkeyup in discount text box
function dscount_sp(id) {
    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var row = idd - 2;

    var sp = $j('#selling_price_' + id).val();
    var dis = $j('#discunt_' + id).val();
    var dis_sp = sp - (sp * dis / 100);
    $j('#discounted_sp_' + id).val(dis_sp.toFixed(2));

    var discounted_sp_tot = 0;
    for (var k = 1; k <= row; k++) {
        var rw = table.rows[k];
        var i = rw.id;
        var val = parseFloat($j('#discounted_sp_' + i).val());
        discounted_sp_tot += val;
    }
    document.getElementById("discounted_sp_tot").innerHTML = discounted_sp_tot.toFixed(2);

    currentGrossMargine();
    currentTurnOver();
}

//calculate the current gross margine
function currentGrossMargine() {
    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var row = idd - 2;

    var current_gm = 0;
    for (var k = 1; k <= row; k++) {
        var rw = table.rows[k];
        var i = rw.id;
        var sp = parseFloat($j('#discounted_sp_' + i).val());
        var avg = parseFloat($j('#avg_cost_' + i).val());
        var amd = parseFloat($j('#amd_' + i).val());
        current_gm += (sp - avg) * amd;
    }
    $j("#current_gross_margin").val(current_gm.toFixed(2));
}

//calculate the current turn over
function currentTurnOver() {
    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var row = idd - 2;

    var current_to = 0;
    for (var k = 1; k <= row; k++) {
        var rw = table.rows[k];
        var i = rw.id;
        var sp = parseFloat($j('#discounted_sp_' + i).val());
        var amd = parseFloat($j('#amd_' + i).val());
        current_to += sp * amd;
    }
    $j("#current_turn_over").val(current_to.toFixed(2));
}

//calculate the following values when onkeyup in special discount text box
function spcl_dscount_sp(id) {
    var sp = $j('#selling_price_' + id).val();
    var spcl_dis = $j('#specl_discount_' + id).val();
    var spcl_price = sp - (sp * spcl_dis / 100);
    $j('#specl_price_' + id).val(spcl_price.toFixed(2));

    var amd = $j('#amd_' + id).val();
    var dis_sp = $j('#discounted_sp_' + id).val();
    var avg = $j('#avg_cost_' + id).val();
    var brk = (((dis_sp - avg) * amd) / (spcl_price - avg));
    $j('#brk_qty_' + id).val(brk.toFixed(2));

    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var row = idd - 2;

    var specl_discount_tot = 0;
    for (var r = 1; r <= row; r++) {
        var rw = table.rows[r];
        var m = rw.id;
        var val = parseFloat($j('#specl_discount_' + m).val());
        specl_discount_tot += val;
    }
    var specl_discount_avg = specl_discount_tot / (row);
    document.getElementById("specl_discount_avg").innerHTML = specl_discount_avg.toFixed(2);

    var specl_price_tot = 0;
    for (var i = 1; i <= row; i++) {
        var rw = table.rows[i];
        var k = rw.id;
        var val = parseFloat($j('#specl_price_' + k).val());
        specl_price_tot += val;
    }
    document.getElementById("specl_price_tot").innerHTML = specl_price_tot.toFixed(2);

    var brk_qty_tot = 0;
    for (var p = 1; p <= row; p++) {
        var rw = table.rows[p];
        var h = rw.id;
        var val = parseFloat($j('#brk_qty_' + h).val());
        brk_qty_tot += val;
    }
    document.getElementById("brk_qty_tot").innerHTML = brk_qty_tot.toFixed(2);

    proposedGrossMargine();
    proposedTurnOver();
    
}

//freeze the minimum qty per unit after onchange
function freeze(id) {
    document.getElementById("unit_" + id).readOnly = true;
}

//view the target table after click on proposed qty text box
function enter_target(id) {
    document.getElementById('entr_target').style.visibility = "visible";
    $j('#count').val(id);
}

//hide the target table after click on ok
function target_hide() {

    var tot = parseFloat($j('#tt_proposed_qty').val());
    
    $j('#propose_qty').val(tot);

    document.getElementById('entr_target').style.visibility = "hidden";

//    create_proposed_qty_tot();
    proposedGrossMargine();
    proposedTurnOver();
}
//
////calculate the total proposed qty and display on the footer
//function create_proposed_qty_tot() {
//    var table = document.getElementById('tbl_kit');
//    var idd = (table.rows.length);
//    var ck = idd - 2;
//    var proposed_qty_tot = 0;
//    for (var r = 1; r <= ck; r++) {
//        var rw = table.rows[r];
//        var m = rw.id;
//        var val = parseFloat($j('#proposed_qty_' + m).val());
//        proposed_qty_tot = proposed_qty_tot + val;
//    }
//    document.getElementById("proposed_qty_tot").innerHTML = proposed_qty_tot.toFixed(2);
//
//    
//}

//calculate the proposed gross margine
function proposedGrossMargine() {
    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var row = idd - 2;

    var proposed_gm = 0;
    for (var k = 1; k <= row; k++) {
        var rw = table.rows[k];
        var i = rw.id;
        var spcl = parseFloat($j('#specl_price_' + i).val());
        var avg = parseFloat($j('#avg_cost_' + i).val());
        var pq = parseFloat($j('#propose_qty').val());
        proposed_gm += ((spcl - avg) * pq);
    }
    $j("#proposed_gross_margin").val(proposed_gm.toFixed(2));

    grossMargineIncrease();
}

//calculate the % increase in gross margine
function grossMargineIncrease() {
    var current = parseFloat($j('#current_gross_margin').val());
    var proposed = parseFloat($j('#proposed_gross_margin').val());

    var increase = ((proposed - current) / current) * 100;

    $j("#gross_margin_increase").val(increase.toFixed(2));
}

//calculate the proposed turn over
function proposedTurnOver() {
    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var row = idd - 2;

    var proposed_to = 0;
    for (var k = 1; k <= row; k++) {
        var rw = table.rows[k];
        var i = rw.id;
        var spcl = parseFloat($j('#specl_price_' + i).val());
        var pq = parseFloat($j('#propose_qty').val());
        proposed_to += (spcl * pq);
    }
    $j("#proposed_turn_over").val(proposed_to.toFixed(2));

    turnOverIncrease();
}

//calculate the % increase in turn over
function turnOverIncrease() {
    var current = parseFloat($j('#current_turn_over').val());
    var proposed = parseFloat($j('#proposed_turn_over').val());

    var increase = ((proposed - current) / current) * 100;

    $j("#turn_over_increase").val(increase.toFixed(2));
}

//get ASO name and branch from database
function get_aso(id) {
    $j("#aso_name" + id).autocomplete({
        source: "getAsoName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#aso_id' + id).val(data.item.sales_officer_id);
            $j('#branch' + id).val(data.item.branch_name);
        }
    });

}

//add rows in target table
function addRow(idd, y) {
    var id = y + 1;
    $j('#' + idd).hide();

    $j('#tbl_target').append(
            '<tr id="_' + id + '" name="_' + id + '"> '
            + '<td><input type="button" name="adrw_' + id + '" id="adrw_' + id + '" value="+" onclick="addRow(this.id, ' + id + ');"></td>'
            + '<td><input type="text" name="aso_name' + id + '" id="aso_name' + id + '" onfocus="get_aso(' + id + ');" autocomplete="off" placeholder="Select ASO Name"/>'
            + '<input type="hidden" name="aso_id' + id + '" id="aso_id' + id + '"></td>'
            + '<td><input type="text" name="branch' + id + '" id="branch' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="quantity_' + id + '" id="quantity_' + id + '" style="text-align: right" onkeyup="create_tot_qty();"></td>'
            + '<td><input type="button" id="deletrow_' + id + '" name="deletrow_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td></tr>'
            );

    var table = document.getElementById('tbl_target');
    var i = (table.rows.length);
    var ck = i - 1;
    $j('#row_cont').val(ck);
}

//delete rows in target table
function deleteRow(id) {
    $j('#_' + id).remove();
    var table = document.getElementById('tbl_target');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#adrw' + (i)).show();

    if (ck === 0) {

        $j('#tbl_target').replace(
                '<tr id="_' + 1 + '" name="_' + 1 + '"> '
                + '<td><input type="button" name="adrw_' + 1 + '" id="adrw_' + 1 + '" value="+" onclick="addRow(this.id, ' + 1 + ');"></td>'
                + '<td><input type="text" name="aso_name' + 1 + '" id="aso_name' + 1 + '" onfocus="get_aso(' + 1 + ');" autocomplete="off" placeholder="Select ASO Name"/>'
                + '<input type="hidden" name="aso_id' + 1 + '" id="aso_id' + 1 + '"></td>'
                + '<td><input type="text" name="branch' + 1 + '" id="branch' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="quantity_' + 1 + '" id="quantity_' + 1 + '" style="text-align: right" onkeyup="create_tot_qty();"></td>'
                + '<td><input type="hidden" id="row_cont" name="row_cont" value="' + 1 + '"></td></tr>'
                );

    }
    $j('#row_cont').val(ck);
    create_tot_qty();
}

//calculate the total qty per month in the target table
function create_tot_qty() {
    var table = document.getElementById('tbl_target');
    var idd = (table.rows.length);
    var ck = idd - 1;
    var proposed_qty = 0;
    for (var r = 1; r <= ck; r++) {
        var rw = table.rows[r];
        var m = rw.id;
        var val = parseFloat($j('#quantity' + m).val());
        proposed_qty = proposed_qty + val;
    }
    $j("#tt_proposed_qty").val(proposed_qty);
}

//add rows in the main detail table
function add_row(idd, y) {

    var id = y + 1;
    $j('#' + idd).hide();
    
    var table = document.getElementById('tbl_kit');
    var i = (table.rows.length);
    var ck = i - 1;
    
    document.getElementById("target_qty").rowSpan = i;

    $j('#tbl_kit').append(
            '<tr id="' + id + '" name="' + id + '"> '
            + '<td><input type="button" name="add_rw_' + id + '" id="add_rw_' + id + '" value="+" onclick="add_row(this.id, ' + id + ');"></td><td><input type="hidden" name="part_id_' + id + '" id="part_id_' + id + '"><input type="text" name="part_number_' + id + '" id="part_number_' + id + '" onfocus="get_part_number(' + id + ');" autocomplete="off"  style="font-size: 11px" placeholder="Select Part Number"/></td>'
            + '<td><input type="text" name="discriptn_' + id + '" id="discriptn_' + id + '" readonly="true"  style="font-size: 9px"></td><td><input type="text" name="model_' + id + '" id="model_' + id + '" readonly="true"></td><td><input type="text" name="amd_' + id + '" id="amd_' + id + '" readonly="true"></td><td><input type="text" name="stock_' + id + '" id="stock_' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="avg_cost_' + id + '" id="avg_cost_' + id + '" readonly="true"></td><td><input type="text" name="selling_price_' + id + '" id="selling_price_' + id + '" readonly="true"></td><td><input type="text" name="discunt_' + id + '" id="discunt_' + id + '" onkeyup="dscount_sp(' + id + ');"></td>'
            + '<td><input type="text" id="discounted_sp_' + id + '" name="discounted_sp_' + id + '" readonly="true"></td><td><input type="text" id="specl_discount_' + id + '" name="specl_discount_' + id + '" onkeyup="spcl_dscount_sp(' + id + ');"></td><td><input type="text" id="specl_price_' + id + '" name="specl_price_' + id + '" readonly="true"></td>'
            + '<td><input type="text" id="unit_' + id + '" name="unit_' + id + '" onchange="freeze(' + id + ');"></td><td><input type="text" id="brk_qty_' + id + '" name="brk_qty_' + id + '" readonly="true"></td>'
            + '<td><input type="button"  id="delrow_' + id + '" name="delrow_' + id + '" value="-" onclick="delete_row(' + id + ');"></td></tr>'
            );

    $j('#rw_count').val(ck);

}

//delete rows from the main detail table
function delete_row(id) {
    $j('#' + id).remove();
    var table = document.getElementById('tbl_kit');
    var idd = (table.rows.length);
    var ck = idd - 2;

    var row = table.rows[idd - 2];
    var i = row.id;
    $j('#add_rw_' + (i)).show();

    if (ck === 0) {

        $j('#tbl_kit').replace(
                '<tr id="' + 1 + '" name="' + 1 + '"> '
                + '<td><input type="button" name="add_rw_' + 1 + '" id="add_rw_' + 1 + '" value="+" onclick="add_row(this.id, ' + 1 + ');"></td><td><input type="hidden" name="part_id_' + 1 + '" id="part_id_' + 1 + '"><input type="text" name="part_number_' + 1 + '" id="part_number_' + 1 + '" onfocus="get_part_number(' + 1 + ');" autocomplete="off"  style="font-size: 11px" placeholder="Select Part Number"/></td>'
                + '<td><input type="text" name="discriptn_' + 1 + '" id="discriptn_' + 1 + '" readonly="true"  style="font-size: 9px"></td><td><input type="text" name="model_' + 1 + '" id="model_' + 1 + '" readonly="true"></td><td><input type="text" name="amd_' + 1 + '" id="amd_' + 1 + '" readonly="true"></td><td><input type="text" name="stock_' + 1 + '" id="stock_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="avg_cost_' + 1 + '" id="avg_cost_' + 1 + '" readonly="true"></td><td><input type="text" name="selling_price_' + 1 + '" id="selling_price_' + 1 + '" readonly="true"></td><td><input type="text" name="discunt_' + 1 + '" id="discunt_' + 1 + '" onkeyup="dscount_sp(' + 1 + ');"></td>'
                + '<td><input type="text" id="discounted_sp_' + 1 + '" name="discounted_sp_' + 1 + '" readonly="true"></td><td><input type="text" id="specl_discount_' + 1 + '" name="specl_discount_' + 1 + '" onkeyup="spcl_dscount_sp(' + 1 + ');"></td><td><input type="text" id="specl_price_' + 1 + '" name="specl_price_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" id="unit_' + 1 + '" name="unit_' + 1 + '" onchange="freeze();"></td><td><input type="text" id="brk_qty_' + 1 + '" name="brk_qty_' + 1 + '" readonly="true"></td><td><input type="text" id="propose_qty" name="propose_qty" onclick="enter_target(' + 1 + ');"></td>'
                + '<td><input type="hidden" id="rw_count" name="rw_count" value="1"></td></tr>'
                );
    }
    $j('#rw_count').val(ck);

    spcl_dscount_sp(id);
    dscount_sp(id);
    get_tot(id);

}

//submit all the details to the database
function submit_kit_promotion() {

    $j.ajax({
        type: 'POST',
        url: 'createKitPromotion',
        data: {
            data: $j('#frm_kit_promotion').serializeArray()
        },
        success: function() {
            alert('Successfully Added');
            location.reload();

        },
        error: function() {

        }
    });
}

