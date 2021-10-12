$j(function() {

});

var other = [];

function get_promotion_name() {

    $j("#sp_name").autocomplete({
        source: "getPromotionName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#sp_name_id').val(data.item.special_promotion_id);
            $j('#descrption').val(data.item.description);
            get_target(data.item.special_promotion_id, data.item.starting_date, data.item.end_date);
        }
    });
}


function get_target(id, start, end) {
    $j.ajax({
        type: 'POST',
        url: 'getTarget',
        data: {
            id: id
        },
        success: function(data) {
            var result = JSON.parse(data);
            var tot = 0;
            for (var x = 0; x < result.length; x++) {
                tot += parseFloat(result[x]['qty_per_month']);
            }
            $j('#targt').val(tot);
            other[0] = result[0]['sales_officer_id'];
            
            get_actual(start, end, tot);
        },
        error: function() {

        }
    });
}

function get_actual(start, end, target) {
    $j.ajax({
        type: 'POST',
        url: 'getActual',
        data: {
            start: start,
            end: end
        },
        success: function(data) {
            var result = JSON.parse(data);
            var tot = 0;
            for (var x = 0; x < result.length; x++) {
                tot += parseFloat(result[x]['qty']);
            }
            $j('#actul').val(tot.toFixed(0));
            var balance = target - tot;
            $j('#balnce').val(balance.toFixed(0));
        },
        error: function() {
        }
    });
}

function get_promotion_details() {
   
    document.getElementById('tbl_dealr').style.visibility = "visible";
    document.getElementById('sp_detail').style.visibility = "visible";
    var name = $j('#sp_name').val();
    $j('#sp_detail').html(
            '<table id="tbl_sp_detail" width="100%" class="SytemTable" align="center" cellpadding="10" style="background-color: #206E94">'
            + '<thead><td width="200px">Part Number</td><td width="200px">Description</td>'
            + '<td width="10%">Model</td><td width="10%">Normal Selling Price with VAT</td>'
            + '<td width="10%">Special Discount (%)</td><td width="10%">Special Price with VAT</td>'
            + '<td width="10%">Quantity per kit</td><td width="10%">Number of Kits</td></thead>'
            + '<tbody id="detail_sp_body"></tbody></table>'
            );
    $j.ajax({
        type: 'POST',
        url: 'getPromotionDetails',
        data: {
            name: name
        },
        success: function(data) {
            var result = JSON.parse(data);
            $j("#detail_sp_body").empty();
            $j("#detail_sp_body").append('<tr></tr>');
            if (result.length > 0) {
                var sp_vat = (result[0]['selling_price'] * 1.11).toFixed(0);
                var spcl_vat = (result[0]['special_prices'] * 1.11).toFixed(0);
                $j("#detail_sp_body").append(
                        '<tr><td>' + result[0]['item_part_no'] + '</td>' +
                        '<td>' + result[0]['description'] + '</td>' +
                        '<td>' + result[0]['vehicle_model_local'] + '</td>' +
                        '<td align="right">' + sp_vat + '</td>' +
                        '<td align="right">' + result[0]['special_discount'] + '</td>' +
                        '<td align="right">' + spcl_vat + '</td>' +
                        '<td><input type="text" readonly="true" style="text-align: right" id="quantity_0" value="' + result[0]['per_unit'] + '"></td>' +
                        '<td>' + '<input type="text" value="1" style="text-align: right" id="no_of_promotions" name="no_of_promotions" onkeyup="change_qty();"></td>' +
                        '</tr>'
                        );
                var amount_with_vat = spcl_vat * (result[0]['per_unit']);
                other[1] = amount_with_vat;
                other[2] = result[0]['special_discount'];
                get_vat();
                var amount_without_vat = sp_vat * (result[0]['per_unit']);
                other[4] = amount_without_vat - amount_with_vat;
                other[5] = result[0]['item_id'];
                other[6] = result[0]['per_unit'];
                other[7] = result[0]['special_prices'];
                
            } else {
                $j("#detail_sp_body").append('<tr><td>No Data Found...</td></tr>');
            }
        },
        error: function() {
        }
    });
}

function change_qty() {
    var name = $j('#sp_name').val();
    var kits = $j('#no_of_promotions').val();
    
    $j.ajax({
        type: 'POST',
        url: 'getQty',
        data: {
            name: name
        },
        success: function(data) {
            var result = JSON.parse(data);

            for (var x = 0; x < result.length; x++) {
                var val = parseFloat(result[x]['per_unit']);
                var change = val * kits;
                $j('#quantity_' + x).val(change);
            }
            var spcl_vat = parseFloat(result[0]['special_prices']) * 1.11;
            other[1] = spcl_vat * (result[0]['per_unit']);
            other[6] = change;
        },
        error: function() {
        }
    });
}

//get vat from the database
function get_vat(){
    $j.ajax({
        type: 'POST',
        url: 'getVat',
        
        success: function(data) {
            var result = JSON.parse(data);
            other[3] = result[0]['amount'];
        },
        error: function() {

        }
    });
}

//get dealer details from the database
function get_dealer_name() {

    $j("#dealr_name").autocomplete({
        source: "getDealerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#dealr_acc_no').val(data.item.delar_account_no);
            $j('#dealr_id').val(data.item.delar_id);
        }
    });
    document.getElementById('submit_sp').style.visibility = "visible";
}

//function print_sp_promotion() {
//    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
//    disp_setting = "scrollbars=yes,width=650, height=600, left=100, top=25";
//    var content_vlue = document.getElementById("print_sp").innerHTML;
//
//    var docprint = window.open("", "", disp_setting);
//    docprint.document.open();
//    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
//    docprint.document.write('</head><body onLoad="self.print()"><center>');
//    docprint.document.write(content_vlue);
//    docprint.document.write('</center></body>');
//    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
//    docprint.document.close();
//    docprint.document.print();
//    docprint.focus();
//}

function submit_sp_promotion_order(){
    $j.ajax({
        type: 'POST',
        url: 'submitSpPromotionSummary',
        data: {
            data: $j('#frm_sp_summary').serializeArray(),
            other: other
        },
        success: function() {
            alert();
            
//            alert('Successfully Added');
//            location.reload();
        },
        error: function() {

        }
    });
}