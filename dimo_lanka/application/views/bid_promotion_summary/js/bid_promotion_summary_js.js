/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var other = [];
var detail = [];

//get bid details from the database
function get_bid_name() {

    $j("#bidname").autocomplete({
        source: "getBidName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#bid_name_id').val(data.item.special_promotion_id);
            $j('#strt_date').val(data.item.starting_date);
            $j('#end_dt').val(data.item.end_date);
            $j('#discriptin').val(data.item.description);
//            get_target(data.item.special_promotion_id, data.item.starting_date, data.item.end_date);
        }
    });
}

function get_bid_details() {
    document.getElementById('tbl_delr').style.visibility = "visible";
    document.getElementById('detail_bid').style.visibility = "visible";

    var name = $j('#bidname').val();

    //view the head of the BID detail table
    $j('#detail_bid').html(
            '<table id="tbl_bid_detail" width="100%" class="SytemTable" align="center" cellpadding="10" style="background-color: #206E94">'
            + '<thead><td width="200px">Part Number</td><td width="200px">Description</td>'
            + '<td width="10%">Current SP (With VAT)</td><td width="10%">Special Price</td>'
            + '<td width="10%">Minimum Quantity</td><td width="10%">Required Quantity</td>'
            + '<td width="10%">Price Suggested</td><td width="10%">Total Selling Value</td>'
            + '<td hidden="true"><input type="hidden" id="cnt" name="cnt"></td></thead>'
            + '<tbody id="detail_bid_body"></tbody></table>'
            );

    $j.ajax({
        type: 'POST',
        url: 'getBidDetails',
        data: {
            name: name
        },
        success: function(data) {
            var result = JSON.parse(data);
            $j("#detail_bid_body").empty();
            $j("#detail_bid_body").append('<tr></tr>');
            if (result.length > 0) {


                //view the table body
                for (var x = 0; x < result.length; x++) {
                    $j("#detail_bid_body").append(
                            '<tr><td>' + result[x]['item_part_no'] + '</td>' +
                            '<td>' + result[x]['description'] + '</td>' +
                            '<td align="right">' + result[x]['selling_price'] + '</td>' +
                            '<td align="right">' + result[x]['special_prices'] + '</td>' +
                            '<td align="right">' + result[x]['proposed_qty'] + '</td>' +
                            '<td><input style="text-align: right" type="text" id="req_qty_' + x + '" name="req_qty_' + x + '" onchange="take_the_qty(' + x + ');"></td>' +
                            '<td><input style="text-align: right" type="text" id="price_offer_' + x + '" name="price_offer_' + x + '"></td>' +
                            '<td><input style="text-align: right" type="text" id="selling_val_' + x + '" name="selling_val_' + x + '" onkeyup="create_tot(' + x + ');"></td>' +
                            '</tr>'
                            );
                }

//                other[0] = result.length;
                $j('#cnt').val(result.length);
                get_vat();

                for (var x = 0; x < result.length; x++) {
                    detail[x] = [];
                    detail[x][0] = result[x]['item_id'];
                    detail[x][2] = result[x]['special_prices'];
                }

            } else {
                $j("#detail_bid_body").append('<tr><td>No Data Found...</td></tr>');
            }
        }
    });
}

//create the total quantity
function create_tot(x) {
    var tot = 0;
    for (var y = 0; y <= x; y++) {
        var price = parseFloat($j('#selling_val_' + y).val());
        tot = tot + price;
    }
    other[1] = tot;
//
//    other[4] = other[3] - tot;
//    alert(other);
}

function take_the_qty(x){
    var qty = parseFloat($j('#req_qty_' + x).val());
    detail[x][1] = qty;
}

//function create_sp(x, name) {
//
//    $j.ajax({
//        type: 'POST',
//        url: 'getSellingPrice',
//        data: {
//            name: name
//        },
//        success: function(data) {
//            var result = JSON.parse(data);
//            var tot = 0;
//
//            if (result.length > 0) {
//                for (var y = 0; y <= x; y++) {
//                    var qty = parseFloat($j('#req_qty_' + y).val());
//                    var price = result[y]['selling_price'];
//                    tot += price * qty;
//                    detail[y][1] = qty;
//                }
//            }
//            alert(tot);
//            other[3] = tot;
//        },
//        error: function() {
//
//        }
//    });
//}

//get vat from the database
function get_vat() {
    $j.ajax({
        type: 'POST',
        url: 'getVat',
        success: function(data) {
            var result = JSON.parse(data);
            other[2] = result[0]['amount'];
        },
        error: function() {

        }
    });
}

//get dealer details from the database
function get_dealer_name() {

    $j("#delr_name").autocomplete({
        source: "getDealerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#aso_id').val(data.item.sales_officer_id);
            $j('#delr_acc_no').val(data.item.delar_account_no);
            $j('#delr_id').val(data.item.delar_id);
        }
    });
    document.getElementById('tbl_submit_bid').style.visibility = "visible";
}

//submit the promotion
function print_bid_promotion_order() {
    $j.ajax({
        type: 'POST',
        url: 'submitBidPromotionSummary',
        data: {
            data: $j('#frm_bid_promotion_summary').serializeArray(),
            other: other,
            detail: detail
        },
        success: function() {
            alert('Successfully Added');
            location.reload();

        },
        error: function() {

        }
    });
}
