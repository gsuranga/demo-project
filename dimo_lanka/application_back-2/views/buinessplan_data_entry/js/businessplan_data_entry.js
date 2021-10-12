

$j(function() {
    $j("#tabs").tabs();
    
    $j("#deadline").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#deadline",
        altFormat: "yy-mm-dd"
    });
    
    
    
});


function add_row(idd, y) {

    var id = y + 1;
    $j('#' + idd).hide();

    $j('#tbl_action_steps').append(
            '<tr id="' + id + '_" name="' + id + '_"> '
            + '<td><input type="button" name="addrow_' + id + '_" id="addrow_' + id + '_" value="+" onclick="add_row(this.id,' + id + ');"></td>'
            + '<td><input type="text" name="action_steps_' + id + '_" id="action_steps_' + id + '_"></td>'
            + '<td><input type="button" id="delrow_' + id + '" name="delrow_' + id + '" value="-" onclick="delete_row(' + id + ');"></td></tr>'
            );
    $j('#update_row_count').val(id);
}

function delete_row(id) {
    $j('#' + id + '_').remove();
    var table = document.getElementById('tbl_action_steps');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#addrow_' + (i)).show();

    if (ck === 0) {

        $j('#tbl_action_steps').replace(
                '<tr id="' + 1 + '_" name="' + 1 + '_">'
                + '<td><input type="button" name="addrow_' + 1 + '" id="addrow_' + 1 + '" value="+" onclick="add_row(this.id,' + 1 + ');"></td>'
                + '<td><input type="text" name="action_steps_' + 1 + '" id="action_steps_' + 1 + '"></td>'
                + '<td><input type="hidden" id="update_row_count" name="update_row_count" value="1"/></td>'
                + '</tr>'
                );
    }
    $j('#update_row_count').val(idd);
}

function get_dealer(idd, id) {

    $j("#dealer_name" + idd + "_" + id).autocomplete({
        source: "getDealer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#dealr_id' + idd + '_' + id).val(data.item.delar_id);
            $j('#acc_no' + idd + '_' + id).val(data.item.delar_account_no);
            $j('#aso_code' + idd + '_' + id).val(data.item.sales_officer_code);
        }
    });
}

function addDealer(idd, x, y) {

    var id = y + 1;
    $j('#' + idd).hide();

    $j('#tbl_get_dealer' + x).append(
            '<tr id="' + x + '_' + id + '" name="' + x + '_' + id + '"> '
            + '<td><input type="button" name="add_dealer' + x + '_' + id + '" id="add_dealer' + x + '_' + id + '" value="+" onclick="addDealer(this.id,' + x + ',' + id + ');"></td>'
            + '<td><input type="text" name="dealer_name' + x + '_' + id + '" id="dealer_name' + x + '_' + id + '" onfocus="get_dealer(' + x + ',' + id + ');" autocomplete="off" placeholder="Select Dealer Name"/>'
            + '<input type="hidden" name="dealr_id' + x + '_' + id + '" id="dealr_id' + x + '_' + id + '"></td>'
            + '<td><input type="text" name="acc_no' + x + '_' + id + '" id="acc_no' + x + '_' + id + '" readonly="true"></td>'
            + '<td><input type="text" name="aso_code' + x + '_' + id + '" id="aso_code' + x + '_' + id + '" readonly="true"></td>'
            + '<td><input type="button" id="del_dealer' + x + '_' + id + '" name="del_dealer' + x + '_' + id + '" value="-" onclick="delete_dealer(' + id + ',' + x + ');"></td></tr>'
            );
    $j('#dealer_count' + x).val(id);
}

function delete_dealer(id, x) {
    $j('#' + x + '_' + id).remove();
    var table = document.getElementById('tbl_get_dealer' + x);
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#add_dealer' + (i)).show();

    if (ck === 0) {

        $j('#tbl_get_dealer' + x).replace(
                '<tr id="' + x + '_' + 1 + '" name="' + x + '_' + 1 + '">'
                + '<td><input type="button" name="add_dealer' + x + '_' + 1 + '" id="add_dealer' + x + '_' + 1 + '" value="+" onclick="addDealer(this.id,' + x + ',' + 1 + ');"></td>'
                + '<td><input type="text" name="dealer_name' + x + '_' + 1 + '" id="dealer_name' + x + '_' + 1 + '" onfocus="get_dealer(' + x + ',' + 1 + ');" autocomplete="off" placeholder="Select Dealer Name"/>'
                + '<input type="hidden" name="dealr_id' + x + '_' + 1 + '" id="dealr_id' + x + '_' + 1 + '">'
                + '<td><input type="text" name="acc_no' + x + '_' + 1 + '" id="acc_no' + x + '_' + 1 + '" readonly="true"></td>'
                + '<td><input type="text" name="aso_code' + x + '_' + 1 + '" id="aso_code' + x + '_' + 1 + '" readonly="true"></td>'
                + '<td><input type="hidden" id="dealer_count' + x + '" name="dealer_count' + x + '" value="1"/></td>'
                + '</tr>'
                );
    }
    $j('#dealer_count' + x).val(idd);
}

function addMarketingActivity(idd, z) {
    var id = z + 1;
    $j('#' + idd).hide();

    $j('#tbl_marketing_activities').append(
            '<tr id="' + id + '" name="' + id + '"> '
            + '<td style="position: absolute"><input type="button" name="add_marketing_' + id + '" id="add_marketing_' + id + '" value="+" onclick="addMarketingActivity(this.id,' + id + ');"></td>'

            + '<td id="contnt_' + id + '"><br><table class="ContentTableTitleRow" width="100%" align="center" cellsapcing="10" cellpadding="1"><tr><td></td></tr></table><br><table width="100%"><thead><td width="25%"/><td width="25%"/><td width="10%"/><td width="15%"/><td width="25%"/></thead><tr><td>Campaign Type :</td><td><select id="cmb_campaign_type' + id + '" name="cmb_campaign_type' + id + '"></select></td></tr>'
            + '<tr><td>Target Market :</td><td><textarea id="target_market' + id + '" name="target_market' + id + '" rows="5" cols="35"/></td><td/><td>Description :</td><td><textarea id="dscriptn' + id + '" name="dscriptn' + id + '" rows="5" cols="35"/></td></tr><tr/></table><br>'
            + '<table id="tbl_get_dealer' + id + '" width="100%" class="SytemTable" align="center" cellpadding="10"><thead><tr><td width="5%"/><td width="30%">Dealer Name</td><td width="30%">Account Number</td><td width="25%">ASO Code</td><td width="5%"/></tr></thead>'
            + '<tbody id="tbl_dealer_body' + id + '"><tr id="' + id + '_1" name="' + id + '_1"><td><input type="button" name="add_dealer' + id + '_1" id="add_dealer' + id + '_1" value="+" onclick="addDealer(this.id, ' + id + ', 1);" ></td><td><input type="text" name="dealer_name' + id + '_1" id="dealer_name' + id + '_1" onfocus="get_dealer(' + id + ',1);" autocomplete="off" placeholder="Select Dealer Name"/>'
            + '<input type="hidden" name="dealr_id' + id + '_1" id="dealr_id' + id + '_1"></td><td><input type="text" name="acc_no' + id + '_1" id="acc_no' + id + '_1" readonly="true"></td><td><input type="text" name="aso_code' + id + '_1" id="aso_code' + id + '_1" readonly="true"></td><td><input type="hidden" id="dealer_count' + id + '" name="dealer_count' + id + '" value="1"/></td>'
            + '</tr></tbody></table><br><table width="100%"><thead><td width="25%"/><td width="25%"/><td width="10%"/><td width="15%"/><td width="25%"/></thead><tr><td>Target Month :</td><td><select id="target_month' + id + '" name="target_month' + id + '">\<option>Select Month</option>\<option value="1">January</option><option value="2">February</option>'
            + '<option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option>'
            + '<option value="12">December</option></select></td><td/><td>Area :</td><td><select id="cmbArea' + id + '" name="cmbArea' + id + '"></select></td></tr><tr/><tr><td>Number of participants :</td><td><input type="text" id="participants' + id + '" name="participants' + id + '"></td></tr><tr><td>Total Cost :</td><td><table><tr><td>Rs.</td><td><input type="text" id="tot_cost' + id + '" name="tot_cost' + id + '"></td>'
            + '</tr></table></td></tr></table></td>'

            + '<td style="position: absolute"><input type="button" id="del_marketing_' + id + '" name="del_marketing_' + id + '" value="-" onclick="delete_marketing(' + id + ');"></td></tr>'
            );
    $j('#marketing_count').val(id);
    
    get_campaign(id);
    get_area(id);

}

function get_campaign(id) {
    $j('#cmb_campaign_type' + id).empty();
    $j.ajax({
        url: 'appendCampaignType',
        type: 'POST',
        success: function(data) {
            var x = JSON.parse(data);
            var y = ['<option></option>'];
            for (var i = 0; i < x.length; i++) {
                y.push('<option value="' + x[i].id_campaing_type + '">' + x[i].type_description + '</option>');
            }
            $j('#cmb_campaign_type' +id).html(y);

        },
        error: function() {

        }
    });
}

function get_area(id) {
    $j('#cmbArea' + id).empty();
    $j.ajax({
        url: 'appendArea',
        type: 'POST',
        success: function(data) {
            var x = JSON.parse(data);
            var y = ['<option></option>'];
            for (var i = 0; i < x.length; i++) {
                y.push('<option value="' + x[i].area_id + '">' + x[i].area_name + '</option>');
            }
            $j('#cmbArea' +id).html(y);

        },
        error: function() {

        }
    });
}

function delete_marketing(id) {
    $j('#' + id).remove();
    var table = document.getElementById('tbl_marketing_activities');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;
    $j('#add_marketing_' + (i)).show();

    if (ck === 0) {

        $j('#tbl_marketing_activities').replace(
                '<tr id="' + 1 + '" name="' + 1 + '"> '
                + '<td style="position: absolute"><input type="button" name="add_marketing_' + 1 + '" id="add_marketing_' + 1 + '" value="+" onclick="addMarketingActivity(this.id,' + 1 + ');"></td>'

                + '<td id="contnt_' + 1 + '"><br><br><table width="100%"><thead><td width="25%"/><td width="25%"/><td width="10%"/><td width="15%"/><td width="25%"/></thead<tr><td>Campaign Type :</td><td><?php $_instance->getCampaignType(); ?></td></tr>'
                + '<tr><td>Target Market :</td><td><textarea id="target_market' + 1 + '" name="target_market' + 1 + '" rows="5" cols="35"/></td><td/><td>Description :</td><td><textarea id="dscriptn' + 1 + '" name="dscriptn' + 1 + '" rows="5" cols="35"/></td></tr><tr/></table><br>'
                + '<table id="tbl_get_dealer' + 1 + '" width="100%" class="SytemTable" align="center" cellpadding="10"><thead><tr><td width="5%"/><td width="30%">Dealer Name</td><td width="30%">Account Number</td><td width="25%">ASO Code</td><td width="5%"/></tr></thead>'
                + '<tbody id="tbl_dealer_body' + 1 + '"><tr id="' + 1 + '_1" name="' + 1 + '_1"><td><input type="button" name="add_dealer' + 1 + '_1" id="add_dealer' + 1 + '_1" value="+" onclick="addDealer(this.id, ' + 1 + ', 1);" ></td><td><input type="text" name="dealer_name' + 1 + '_1" id="dealer_name' + 1 + '_1" onfocus="get_dealer(' + 1 + ',1);" autocomplete="off" placeholder="Select Dealer Name"/>'
                + '<input type="hidden" name="dealr_id' + 1 + '_1" id="dealr_id' + 1 + '_1"></td><td><input type="text" name="acc_no' + 1 + '_1" id="acc_no' + 1 + '_1" readonly="true"></td><td><input type="text" name="aso_code' + 1 + '_1" id="aso_code' + 1 + '_1" readonly="true"></td><td><input type="hidden" id="dealer_count' + 1 + '" name="dealer_count' + 1 + '" value="1"/></td>'
                + '</tr></tbody></table><br><table width="100%"><thead><td width="25%"/><td width="25%"/><td width="10%"/><td width="15%"/><td width="25%"/></thead><tr><td>Target Month :</td><td><select id="target_month' + id + '" name="target_month' + id + '"><option>Select Month</option><option value="1">January</option><option value="2">February</option>'
                + '<option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option>'
                + '<option value="12">December</option></select></td><td/><td>Area :</td><td><?php $_instance->getArea(); ?></td></tr><tr/><tr><td>Number of participants :</td><td><input type="text" id="participants' + 1 + '" name="participants' + 1 + '"></td></tr><tr><td>Total Cost :</td><td><table><tr><td>Rs.</td><td><input type="text" id="tot_cost' + 1 + '" name="tot_cost' + 1 + '"></td>'
                + '</tr></table></td></tr></table></td>'

                );
    }
    $j('#marketing_count').val(idd);
}

