//widuranga jayawickrama
// * widurangajayawickrama@gmail.com

$j(function () {
    $j("#tabs").tabs();
});
// Popup window code
function newPopup(url) {
    var left = (screen.width - (screen.width * 50) / 100);
    var top = (screen.width - (screen.width * 50) / 100);
    var popupWindow = window.open(url, "_blank", "toolbar=yes, scrollbars=yes, resizable=no, top=3,left=200, width=1000, height=600");

}
function remove_add_table_row(row_id) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {
        $j('#select_row_' + row_id).remove();

    }
}

function calculateTotal() {
    var totalRows = $j('#txt_hidden2').val();
    var total = 0;
    for (i = 0; i < totalRows; i++) {
        total += ($j('#txt_unit_price_' + i).val()) * ($j('#txt_qty_' + i).val());

    }
    $j('#txt_total_amount').val(total);

}
function closeAndReload() {
    window.opener.location.reload(true);
    window.close();
    e.preventDefault();
}

function getAllDealers() {
    $j("#dealer_name").autocomplete({
        source: "getAllDealerNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_account_no').val(data.item.delar_account_no);
            $j('#hidden_dealer_id').val(data.item.delar_id);


        }
    });

}
function getAllDealerAccountNums() {
    $j("#dealer_account_no").autocomplete({
        source: "getAllDealerAccountNums",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_name').val(data.item.delar_shop_name);
            $j('#hidden_dealer_id').val(data.item.delar_id);

        }
    });

}
function getDealerPurchaseOrders() {

    var dealerID = $j('#hidden_dealer_id').val();
    //console.log(dealerID);
    $j.ajax({
        url: 'getDealerPurchaseOrders?hidden_dealer_id=' + dealerID,
        method: 'GET',
        success: function (data) {
            console.log(data);
            var x = JSON.parse(data);
            var y = x[0];
            $j('#tbl_acc_body').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    console.log(i);
                    $j('#tbl_acc_body').append(
                            '<tr><td hidden="hidden"><input type="hidden" id="acc_p_o_id_' + i + '" value="' + y[i]['purchase_order_id'] + '"></input></td><td>' + y[i]['purchase_order_id'] + '</td><td>' + y[i]['dealer_purchase_order_id'] + '</td><td>' + y[i]['branch_name'] + '</td><td>' + y[i]['delar_shop_name'] + '</td><td>' + y[i]['date'] + '</td><td>' + y[i]['time'] + '</td><td>' + y[i]['amount'] + '</td><td><img id="acc_view_' + i + '" width="20" height="20" src="http://localhost/dimo_lanka/public/images/view.png" onclick="getAcceptedOrderDetails(' + i + ');"></td></tr>'
                            );
                }
            } else {

                $j('#tbl_acc_body').append(
                        '<tr><td>No records found</td></tr>'
                        );
            }

            var z = x[1];
            $j('#tbl_reject_body').empty();
            if (z.length > 0) {
                for (var i = 0; i < z.length; i++) {
                    $j('#tbl_reject_body').append(
                            '<tr><td>' + z[i]['purchase_order_id'] + '</td><td>' + z[i]['dealer_purchase_order_id'] + '</td><td>' + z[i]['branch_name'] + '</td><td>' + z[i]['delar_shop_name'] + '</td><td>' + z[i]['date'] + '</td><td>' + z[i]['time'] + '</td><td>' + z[i]['amount'] + '</td><td><img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/></td></tr>'
                            );

                }
            } else {

                $j('#tbl_reject_body').append(
                        '<tr><td><td>No records found</td></tr>'

                        );
            }


        }
    });



}
function getAcceptedOrderDetails(poid) {


    $j.ajax({
        url: 'getPurchaseOrderDetail?poid=' + 2,
        method: 'GET',
        success: function (data) {
            $j('#tbl_acc_body').empty();
            jQuery.each(data, function (index, value) {
            });
        }
    });


}

function rejectPendingOrder(poid) {
    if (!confirm('Are you sure to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
        var orderid = $j('#purchase_o_id_' + poid).val();
        //console.log(soID2);
        $j.ajax({
            url: 'rejectPurchaseOrder?po_idd=' + orderid,
            method: 'GET',
            success: function (data) {
            }
        });

    }

}

//============================widuranga jayawickrama==============================================
function view_return(return_id) {
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/viewReturenDetails?return_id=' + return_id,
        success: function (data) {
            var x = JSON.parse(data);
            //console.log(x);
            hlml = +'</tr></table>';
            var hlml = '<table style="color: #333; font-weight: bolder;  font-size: 20px;"><tr><td>Return Details</td></tr></table>'
                    + '<table class="SytemTable" >'
                    + '<thead><tr>'
                    + '<td>Part No.</td>'
                    + '<td>Description</td>'
                    + '<td>Return Qty.</td>'
                    + '<td>Reason</td>'
                    + '<td>Delivered</td>'
                    + '<td>Amount (Rs.)</td>'
                    + '<td>Accept Qty.</td>'
                    + '<td>Remarks</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody id="return_detail_cool">';
            for (var i = 0; i < x.length; i++) {
                var z = parseFloat(x[i].delivered);
                hlml += '<tr id="rows_id_' + i + '">'
                        + '<td id="partName_' + i + '"><input type="hidden" name="PartId_' + i + '" id="PartId_' + i + '" value="' + x[i].item_id + '"/>' + x[i].item_part_no + '</td>'
                        + '<td id="Discript_' + i + '">' + x[i].description + '</td>'
                        + '<td id="qty_' + i + '" style="text-align: right;">' + x[i].ret_qty + '</td>'
                        + '<td id="returnRsason_' + i + '">' + x[i].return_reason + '</td>';
                if (z === 1) {
                    hlml += '<td style="text-align: center;" id="delive_' + i + '">&#10004;</td>';
                } else {
                    hlml += '<td style="text-align: center;" id="delive_' + i + '">&#10008;</td>';
                }
                hlml += '<td id="selling_' + i + '" style="text-align: right;">' + x[i].selling_value + '</td>'
                        + '<td><input type="text" value="0" onkeyup="validation(' + i + ');" id="acc_qty_' + i + '" name="acc_qty_' + i + '" autocomplete="off" placeholder="Enter Qty"/></td>'
                        + '<td>'
                        + '<input type="hidden" value="' + x[0].dealer_ret_id + '" name="return_id" id="return_id"/>'
                        + '<input type="hidden" value="1" name="completed_id" id="completed_id"/>'
                        + '<input type="text" id="remark_' + i + '" name="remark_' + i + '" autocomplete="off" placeholder="Enter Remark" />'
                        + '</td>'
                        + '</tr>';
            }
            hlml += '</tbody></table>';
            hlml += '<table><tr>'
                    + '<td><input type="submit" id="btn" onclick="accept_return_details(' + return_id + ')" name="" value="Accept"/></td>'
                    + '<td><input type="submit" id="btn" onclick="rejected(' + return_id + ')" name="" value="Reject"/></td>';
            hlml += '</tr></table>';
            $j.colorbox({
                html: '<div align="center">' + hlml + '</div>',
                opacity: 0.50
            });
            $j.colorbox.resize();

        }
    });
}
function validation(p) {
    var qty = $j('#qty_' + p).html();
    var accQty = $j('#acc_qty_' + p).val();
    if ((parseFloat(qty) < parseFloat(accQty))) {
        $j('#acc_qty_' + p).val("0");
    }
}
function validation_admin(p) {
    var qty = $j('#qty_rep_' + p).html();
    var accQty = $j('#acc_qty_' + p).val();
    if ((parseFloat(qty) < parseFloat(accQty))) {
        $j('#acc_qty_' + p).val("0");
    }
}
//function validatAccept() {
//    var count = ($j('#return_detail_cool').length) + 1;
//    for (var p = 0; p <= count; p++) {
//        alert(count);
//        if (!document.getElementById('#acc_qty_' + p)) {
//            fieldVal = $j('#acc_qty_' + p).val();
//
//            if (fieldVal === "") {
//                break;
//                return false;
//            } else {
//            }
//        }
//
//    }
//
//}

function rejected(id) {
    var locations = [];
    var return_rep = id;
    var count = ($j('#return_detail_cool tr').length);
    for (var p = 0; p <= count; p++) {
        var partNo = $j('#partName_' + p).html();
        var partId = $j('#PartId_' + p).val();
        var discrip = $j('#Discript_' + p).html();
        var qty = $j('#qty_' + p).html();
        var accQty = $j('#acc_qty_' + p).val();
        var remark = $j('#remark_' + p).val();
        var returnRea = $j('#returnRsason_' + p).html();
        var delive = $j('#delive_' + p).html();
        var selling = $j('#selling_' + p).html();
        var return_id = $j('#return_id').val();
        var completed_id = $j('#completed_id').val();
        var array_push = [{partNo: partNo, partId: partId, dis: discrip, qty: qty, accqty: accQty, rema: remark, returea: returnRea, deli: delive, sell: selling, ret_id: return_id, completed_id: completed_id, return_rep: return_rep}];
        locations.push(array_push);
    }
    var stringData = JSON.stringify(locations);
    $j.ajax({
        url: "viewrejectedOrder",
        type: "POST",
        data: {data: stringData},
        success: function () {
            parent.$j.fn.colorbox.close();
            window.location.reload();
        },
        error: function () {

        }
    });

}




function accept_return_details(return_rep_id) {
    var locations = [];
    var return_rep = return_rep_id;
    var count = ($j('#return_detail_cool tr').length);
    for (var p = 0; p < count; p++) {
        var partNo = $j('#partName_' + p).html();
        var partId = $j('#PartId_' + p).val();
        var discrip = $j('#Discript_' + p).html();
        var qty = $j('#qty_' + p).html();
        var accQty = $j('#acc_qty_' + p).val();
        var remark = $j('#remark_' + p).val();
        var returnRea = $j('#returnRsason_' + p).html();
        var delive = $j('#delive_' + p).html();
        var selling = $j('#selling_' + p).html();
        var return_id = $j('#return_id').val();
        var completed_id = $j('#completed_id').val();
        var array_push = [{partNo: partNo, partId: partId, dis: discrip, qty: qty, accqty: accQty, rema: remark, returea: returnRea, deli: delive, sell: selling, ret_id: return_id, completed_id: completed_id, return_rep: return_rep}];
        locations.push(array_push);
    }
//    test();
    var stringData = JSON.stringify(locations);
    $j.ajax({
        url: "ReturenDeta",
        type: "POST",
        data: {data: stringData},
        success: function () {
            parent.$j.fn.colorbox.close();
            window.location.reload();
        },
        error: function () {

        }
    });
}


function get_all_dealer_name() {
    $j("#dealerName").autocomplete({
        source: "get_all_dealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_id').val(data.item.delar_id);
            $j('#accountNo').val(data.item.delar_account_no);
        }
    });
}
function get_reject_dealer_name() {
    $j("#RejectdealerName").autocomplete({
        source: "get_all_dealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#Rejectdealer_id').val(data.item.delar_id);
            $j('#RejectaccountNo').val(data.item.delar_account_no);
        }
    });
}
function reject_dealer_name() {
    $j("#RejectdealerName").autocomplete({
        source: "getdealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#Rejectdealer_id').val(data.item.delar_id);
            $j('#RejectaccountNo').val(data.item.delar_account_no);
        }
    });
}
function adminAccepteddetails() {
    $j("#ACdealerName").autocomplete({
        source: "getdealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#ACdealer_id').val(data.item.delar_id);
            $j('#ACaccountNo').val(data.item.delar_account_no);
        }
    });
}
function get_all_dealer_reject_AccountNo() {
    $j("#RejectaccountNo").autocomplete({
        source: "get_all_dealerAccountNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#Rejectdealer_id').val(data.item.delar_id);
            $j('#RejectdealerName').val(data.item.delar_name);
        }
    });
}
function dealer_reject_AccountNo() {
    $j("#RejectaccountNo").autocomplete({
        source: "getdealerAccountNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#Rejectdealer_id').val(data.item.delar_id);
            $j('#RejectdealerName').val(data.item.delar_name);
        }
    });
}

function get_all_dealer_AccountNo() {
    $j("#accountNo").autocomplete({
        source: "get_all_dealerAccountNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_id').val(data.item.delar_id);
            $j('#dealerName').val(data.item.delar_name);
        }
    });
}
function getdealer_AccountNo() {
    $j("#ACaccountNo").autocomplete({
        source: "getdealerAccountNo",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#ACdealer_id').val(data.item.delar_id);
            $j('#ACdealerName').val(data.item.delar_name);
        }
    });
}

$j(function () {
    $j("#staretDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"
    });
    $j("#endtDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"
    });
});

$j(function () {
    $j("#staretRjectDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"
    });
    $j("#endtRjectDate").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"
    });
});

function veiwAcceptedOrder() {
    var id = $j("#dealer_id").val();
    var start_date = $j("#staretDate").val();
    var end_date = $j("#endtDate").val();
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/viewAcceptedOrders',
        data: {
            'dealer_id': id,
            'startDate': start_date,
            'endDate': end_date
        },
        success: function (data) {
            var x = JSON.parse(data);
            $j('#veiwAcceptedDetails').empty();
            $j.each(x, function (index, value) {
                var id = value.dealer_ret_id;
                $j('#veiwAcceptedDetails').append('<tr>' +
                        '<td>' + value.delar_name + '</td>' +
                        '<td>' + value.delar_account_no + '</td>' +
                        '<td>' + value.wip_no + '</td>' +
                        '<td>' + value.invoice_no + '</td>' +
                        '<td>' + value.added_date + '</td>' +
                        '<td>' + value.added_time + '</td>' +
                        '<td>' + value.accepted_date + '</td>' +
                        '<td><input type="hidden" id="returnId" name="returnId" value="' + value.return_rep_id + '"/>' + value.accepted_time + '</td>' +
                        '<td><input type="button" onclick="veiw_acceptedDetails(' + value.return_rep_id + ');" name="view_accepted_details" id="view_accepted_details" value="View"/></td>' +
                        '</tr>');
            });
        }
    });
}

function veiw_acceptedDetails(id) {
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/viewacceptedDetails?id=' + id,
        success: function (data) {
            var x = JSON.parse(data);

            var hlml = '<table style="color: #333; font-weight: bolder;  font-size: 20px;"><tr><td>Accepted Details</td></tr></table>'
                    + '<table class="SytemTable" ><thead><tr>'
                    + '<td>Part No.</td>'
                    + '<td>Description</td>'
                    + '<td>Return Qty.</td>'
                    + '<td>Reason</td>'
                    + '<td>Delivered</td>'
                    + '<td>Amount (Rs.)</td>'
                    + '<td>Accepted Qty.</td>'
                    + '<td>Remarks</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody id="return_detail_cool">';
            for (var i = 0; i < x.length; i++) {
                var k = parseFloat(x[i].delivered);
                hlml += '<tr>'
                        + '<td>' + x[i].item_part_no + '</td>'
                        + '<td>' + x[i].description + '</td>'
                        + '<td style="text-align: right;">' + x[i].ret_qty + '</td>'
                        + '<td>' + x[i].return_reason + '</td>';
                if (k == 1) {
                    hlml += '<td style="text-align: center;">&#10004;</td>';
                } else {
                    hlml += '<td style="text-align: center;">&#10008;</td>';
                }
                hlml += '<td style="text-align: right;">' + x[i].selling_value + '</td>'
                        + '<td style="text-align: right;">' + x[i].accepted_qty + '</td>'
                        + '<td>' + x[i].remarks + '</td>'
                        + '</tr>';

            }
            hlml += '</tbody></table>';
            $j.colorbox({
                html: '<div align="center" style="border-style: solid;border-bottom-left-radius: 3px;border-color: lightskyblue;border-width: 1px">' + hlml + '</div>',
                opacity: 0.50
            });
            $j.colorbox.resize();
        }
    });
}

function veiwRejectedOrder() {
    var id = $j("#Rejectdealer_id").val();
    var start_date = $j("#staretRjectDate").val();
    var end_date = $j("#endtRjectDate").val();
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/viewReturnDetails',
        data: {
            'dealer_id': id,
            'startDate': start_date,
            'endDate': end_date
        },
        success: function (data) {
            var x = JSON.parse(data);
            $j('#veiwRejectedDetails').empty();
            $j.each(x, function (index, value) {
                var id = value.return_rep_id;
                $j('#veiwRejectedDetails').append('<tr>' +
                        '<td>' + value.delar_name + '</td>' +
                        '<td>' + value.delar_account_no + '</td>' +
                        '<td>' + value.sales_officer_name + '</td>' +
                        '<td>' + value.wip_no + '</td>' +
                        '<td>' + value.invoice_no + '</td>' +
                        '<td>' + value.added_date + '</td>' +
                        '<td>' + value.added_time + '</td>' +
                        '<td>' + value.accepted_date + '</td>' +
                        '<td>' + value.accepted_time + '</td>' +
                        '<td><input type="button" onclick="veiwrejectedFullDetails(' + id + ');" name="view_accepted_details" id="view_accepted_details" value="View"/></td>' +
                        '</tr>');
            });
        }
    });
}

function veiwrejectedFullDetails(id) {
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/viewreRectedOrderDetails?return_id=' + id,
        success: function (data) {
            var x = JSON.parse(data);
            //console.log(x);
            var hlml = '<table style="color: #333; font-weight: bolder;  font-size: 20px;"><tr><td>Return Details</td></tr></table>'
                    + '<table class="SytemTable" >'
                    + '<thead><tr>'
                    + '<td>Part No.</td>'
                    + '<td>Description</td>'
                    + '<td>Return Qty.</td>'
                    + '<td>Reason</td>'
                    + '<td>Delivered</td>'
                    + '<td>Amount (Rs.)</td>'
                    + '<td>Remarks</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody id="return_detail_cool">';
            for (var i = 0; i < x.length; i++) {
                var z = parseFloat(x[i].delivered);
                hlml += '<tr id="rows_id_' + i + '">'
                        + '<td id="partName_' + i + '"><input type="hidden" name="PartId_' + i + '" id="PartId_' + i + '" value="' + x[i].item_id + '"/>' + x[i].item_part_no + '</td>'
                        + '<td id="Discript_' + i + '">' + x[i].description + '</td>'
                        + '<td id="qty_' + i + '" style="text-align: right;">' + x[i].ret_qty + '</td>'
                        + '<td id="returnRsason_' + i + '">' + x[i].return_reason + '</td>';
                if (z === 1) {
                    hlml += '<td style="text-align: center;" id="delive_' + i + '">&#10004;</td>';
                } else {
                    hlml += '<td style="text-align: center;" id="delive_' + i + '">&#10008;</td>';
                }
                hlml += '<td id="selling_' + i + '" style="text-align: right;">' + x[i].selling_value + '</td>'
                        + '<td id="returnRsason_ref' + i + '">' + x[i].remarks + '</td>'
                        + '</tr>';
            }
            hlml += '</tbody></table>';
            $j.colorbox({
                html: '<div align="center" style="border-style: solid;border-bottom-left-radius: 3px;border-color: lightskyblue;border-width: 1px">' + hlml + '</div>',
                opacity: 0.50
            });
            $j.colorbox.resize();

        }
    });
}
//============================admin========================================================================
function adminPenddingFullDetails(return_id, Dname, Dacc, Dtel, Dmob) {
//    alert(Dacc);
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/AdminViewfullPebddingDetails?return_id=' + return_id,
        success: function (data) {
            var x = JSON.parse(data);
            console.log(x);
            hlml = +'</tr></table>';
            var hlml = '<table style="color: #333; font-weight: bolder;  font-size: 20px;"><tr><td>Return Details</td></tr></table>'
                    + '<table class="SytemTable" >'
                    + '<thead><tr>'
                    + '<td>Part No.</td>'
                    + '<td>Description</td>'
                    + '<td>Return Qty.</td>'
                    + '<td>Reason</td>'
                    + '<td>Delivered</td>'
                    + '<td>Amount (Rs.)</td>'
                    + '<td>Accepted Qty - Rep</td>'
                    + '<td>Remarks - Rep</td>'
                    + '<td>Accept Qty - Admin</td>'
                    + '<td>Remarks - Admin</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody id="return_detail_cool">';
            for (var i = 0; i < x.length; i++) {
                var z = parseFloat(x[i].delivered);
                hlml += '<tr id="rows_id_' + i + '">'
                        + '<td id="partName_' + i + '">' + x[i].item_part_no + '</td>'
                        + '<input type="hidden" name="PartId_' + i + '" id="PartId_' + i + '" value="' + x[i].item_id + '"/>'
                        + '<input type="hidden" name="DealerId_' + i + '" id="DealerId_' + i + '" value="' + x[i].dealer_id + '"/>'
                        + '<td id="Discript_' + i + '">' + x[i].description + '</td>'
                        + '<td id="qty_' + i + '" style="text-align: right;">' + x[i].dealer_ret_qty + '</td>'
                        + '<td id="returnRsason_' + i + '">' + x[i].dealer_ret_reason + '</td>';
                if (z === 1) {
                    hlml += '<td style="text-align: center;" id="delive_' + i + '">&#10004;</td>';
                } else {
                    hlml += '<td  style="text-align: center;" id="delive_' + i + '">&#10008;</td>';
                }
                hlml += '<td id="selling_' + i + '" style="text-align: right;">' + x[i].selling_value + '</td>'
                        + '<td id="qty_rep_' + i + '" style="text-align: right;">' + x[i].rep_accepted_qty + '</td>'
                        + '<td id="returnRsason_rep' + i + '">' + x[i].rep_remarks + '</td>'
                        + '<td><input type="text" value="0" onkeyup="validation_admin(' + i + ');" id="acc_qty_' + i + '" name="acc_qty_' + i + '" autocomplete="off" placeholder="Enter Accepted Qty"/></td>'
                        + '<td>'
                        + '<input type="hidden" value="' + x[0].dealer_ret_id + '" name="return_id" id="return_id"/>'
                        + '<input type="hidden" value="1" name="completed_id" id="completed_id"/>'
                        + '<input type="hidden" value="' + x.length + '" name="rowCount" id="rowCount"/>'
                        + '<input type="text" id="remark_' + i + '" name="remark_' + i + '" autocomplete="off" placeholder="Enter Remark" />'
                        + '</td>'
                        + '</tr>';
            }
            hlml += '</tbody></table>';
            hlml += '<table><tr>'
                    + '<td><input type="submit" id="btn" onclick="Admin_accept_return_details(' + return_id + ',' + "'" + Dname + "'" + ',' + "'" + Dacc + "'" + ',' + "'" + Dtel + "'" + ',' + "'" + Dmob + "'" + ')" name="" value="Accept"/></td>'
                    + '<td><input type="submit" id="btn" onclick="Admin_Rejected_return_details(' + return_id + ')" name="" value="Reject"/></td>';
            hlml += '</tr></table>';
            $j.colorbox({
                html: '<div align="center" style="width: 1200px;border-style: solid;border-bottom-left-radius: 3px;border-color: lightskyblue;border-width: 1px">' + hlml + '</div>',
                opacity: 0.50
            });
            $j.colorbox.resize();
        }
    });
//    printAllAdminPendinOrder();
}
function Admin_accept_return_details(return_rep_id, Dname, Dacc, Dtel, Dmob) {
//alert(Dacc);
    var locations = [];
    var return_rep = return_rep_id;
    var count = $j('#rowCount').val();
    var t = 1;
    $j('#dealerName').html(Dname);
    $j('#dAccNo').html(Dacc);
    $j('#TelNo').html(Dtel);
    $j('#mobileNo').html(Dmob);
    $j('#AdminAcc_order_detail').empty();
    for (var x = 0; x < count; x++) {
        var partId = $j('#partName_' + x).html();
        var discrip = $j('#Discript_' + x).html();
        var accQty = $j('#acc_qty_' + x).val();
        $j('#AdminAcc_order_detail').append('<tr>' +
                '<td  style=" border: 1px solid black;text-align: center;font-family:Arial;">' + t + '</td>' +
                '<td  style=" border: 1px solid black;text-align: center;font-family:Arial;">' + partId + '</td>' +
                '<td  style=" border: 1px solid black;text-align: center;font-family:Arial;">' + discrip + '</td>' +
                '<td  style=" border: 1px solid black;text-align: center;font-family:Arial;">' + accQty + '</td>' +
                '</tr>');
        t++;
    }

    for (var p = 0; p < count; p++) {
        var DealerId = $j('#DealerId_' + p).val();
        var partNo = $j('#partName_' + p).html();
        var partId = $j('#PartId_' + p).val();
        var discrip = $j('#Discript_' + p).html();
        var qty = $j('#qty_' + p).html();
        var accQty = $j('#acc_qty_' + p).val();
        var remark = $j('#remark_' + p).val();
        var returnRea = $j('#returnRsason_' + p).html();
        var delive = $j('#delive_' + p).html();
        var selling = $j('#selling_' + p).html();
        var return_id = $j('#return_id').val();
        var completed_id = $j('#completed_id').val();
        var array_push = [{DealerId: DealerId, partNo: partNo, partId: partId, dis: discrip, qty: qty, accqty: accQty, rema: remark, returea: returnRea, deli: delive, sell: selling, ret_id: return_id, completed_id: completed_id, return_rep: return_rep}];
        locations.push(array_push);
        //console.log(locations);
    }
//    test();
    var stringData = JSON.stringify(locations);
    $j.ajax({
        url: "AdminAcceptedDetails",
        type: "POST",
        data: {data: stringData},
        success: function (data) {
            var x = JSON.parse(data);
            $j('#pendingRefNo').html(x);
            parent.$j.fn.colorbox.close();
        },
        error: function () {

        }
    });
    printAllReturmOrder();
    window.location.reload();
}
$(document).ready(function () {
    veiwadminacceptedDeteils();
});

function veiwadminacceptedDeteils() {
    var id = $j("#ACdealer_id").val();
    var start_date = $j("#staretRjectDate").val();
    var end_date = $j("#endtRjectDate").val();
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/getAdminAcceptedDetails',
        data: {
            'dealer_id': id,
            'startDate': start_date,
            'endDate': end_date
        },
        success: function (data) {
            var x = JSON.parse(data);
            console.log(x);
            $j('#AdminAcceptedDetails').empty();
            $j.each(x, function (index, value) {
                var id = value.dealer_ret_id;
                $j('#AdminAcceptedDetails').append('<tr>' +
                        '<td>' + value.return_note_no + '</td>' +
                        '<td>' + value.delar_name + '</td>' +
                        '<td>' + value.delar_account_no + '</td>' +
                        '<td>' + value.sales_officer_name + '</td>' +
                        '<td>' + value.wip_no + '</td>' +
                        '<td>' + value.invoice_no + '</td>' +
                        '<td>' + value.added_date + '</td>' +
                        '<td>' + value.added_time + '</td>' +
                        '<td>' + value.accepted_date + '</td>' +
                        '<td>' + value.accepted_time + '</td>' +
                        '<td><input type="button" onclick="veiw_AdminacceptedDetails(' + value.return_admin_id + ',' + "'" + value.delar_name + "'" + ',' + "'" + value.delar_account_no + "'" + ',' + "'" + value.mobileO + "'" + ',' + "'" + value.mobileP + "'" + ',' + "'" + value.return_note_no + "'" + ');" name="view_accepted_details" id="view_accepted_details" value="View"/></td>' +
                        '</tr>');
            });
        }
    });
}

function veiw_AdminacceptedDetails(id, Dnames, Daccs, Dtel, Dmobi, refNo) {
//    alert(Dname);
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/VeiwFullAdminAcceptedDetails?id=' + id,
        success: function (data) {
            var x = JSON.parse(data);
//            console.log(x);
            $j('#dealerNames').html(Dnames);
            $j('#dAccNos').html(Daccs);
            $j('#TelNos').html(Dtel);
            $j('#mobileNos').html(Dmobi);
            $j('#returnNoteNo').html(refNo);
            $j('#AdminOrder_detail').empty();
            var t = 1;
            for (var a = 0; a < x.length; a++) {
                $j('#AdminOrder_detail').append('<tr>' +
                        '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + t + '</td>' +
                        '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + x[a].item_part_no + '</td>' +
                        '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + x[a].description + '</td>' +
                        '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + x[a].admin_accepted_qty + '</td>' +
                        '</tr>');
                t++;
            }
            //console.log(x);
            var hlml = '<table style="color: #333; font-weight: bolder;  font-size: 20px;"><tr><td>Return Note No.' + refNo + '</td></tr></table>'
                    + '<table class="SytemTable" >'
                    + '<thead><tr>'
                    + '<td>Part No.</td>'
                    + '<td>Description</td>'
                    + '<td>Return Qty.</td>'
                    + '<td>Reason</td>'
                    + '<td>Delivered</td>'
                    + '<td>Amount (Rs.)</td>'
                    + '<td>Accepted Qty - Rep</td>'
                    + '<td>Remarks - Rep</td>'
                    + '<td>Accepted Qty - Admin</td>'
                    + '<td>Remarks - Admin</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody id="return_detail_cool">';
            for (var i = 0; i < x.length; i++) {

                var k = parseFloat(x[i].delivered);
                hlml += '<tr>'
                        + '<td>' + x[i].item_part_no + '</td>'
                        + '<td>' + x[i].description + '</td>'
                        + '<td style="text-align: right;">' + x[i].dealer_ret_qty + '</td>'
                        + '<td>' + x[i].dealer_ret_reason + '</td>';
                if (k == 1) {
                    hlml += '<td style="text-align: center;">&#10004;</td>';
                } else {
                    hlml += '<td style="text-align: center;">&#10008;</td>';
                }
                hlml += '<td style="text-align: right;">' + x[i].selling_value + '</td>'
                        + '<td  style="text-align: right;">' + x[i].rep_accepted_qty + '</td>'
                        + '<td>' + x[i].rep_remarks + '</td>'
                        + '<td style="text-align: right;">' + x[i].admin_accepted_qty + '</td>'
                        + '<td style="text-align: right;">' + x[i].admin_remarks + '</td>'
                        + '</tr>';
            }
            hlml += '<tr><td colspan="10"><center><input type="button" id="print" name="print" onclick="printAllAcceptedOrder();" value="Print"/></center></td></tr>';
            hlml += '</tbody></table>';
            $j.colorbox({
                html: '<div align="center" style="border-style: solid;border-bottom-left-radius: 3px;border-color: lightskyblue;border-width: 1px">' + hlml + '</div>',
                opacity: 0.50
            });
            $j.colorbox.resize();
        }
    });
}

function veiwAdminRejectedOrder() {
    var id = $j("#Rejectdealer_id").val();
//    alert(id);
    var start_date = $j("#staretRjectDate").val();
    var end_date = $j("#endtRjectDate").val();
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/getAdminRejectedDetails',
        data: {
            'dealer_id': id,
            'startDate': start_date,
            'endDate': end_date
        },
        success: function (data) {
            var x = JSON.parse(data);
            //console.log(x);
            $j('#veiwAdminRejectedDetails').empty();
            $j.each(x, function (index, value) {
                var id = value.dealer_ret_id;
                $j('#veiwAdminRejectedDetails').append('<tr>' +
                        '<td>' + value.delar_name + '</td>' +
                        '<td>' + value.delar_account_no + '</td>' +
                        '<td>' + value.sales_officer_name + '</td>' +
                        '<td>' + value.wip_no + '</td>' +
                        '<td>' + value.invoice_no + '</td>' +
                        '<td>' + value.added_date + '</td>' +
                        '<td>' + value.added_time + '</td>' +
                        '<td>' + value.accepted_date + '</td>' +
                        '<td>' + value.accepted_time + '</td>' +
                        '<td><input type="button" onclick="veiw_Full_AdminRejectedDetails(' + value.return_admin_id + ')" name="view_accepted_details" id="view_accepted_details" value="View"/></td>' +
                        '</tr>');
            });
        }
    });
}

function veiw_Full_AdminRejectedDetails(id) {
    $j.ajax({
        type: 'GET',
        url: URL + 'dealer_return/viewAdminRejectedDetails?id=' + id,
        success: function (data) {
            var x = JSON.parse(data);
            // console.log(x);
            var hlml = '<table style="color: #333; font-weight: bolder;  font-size: 20px;"><tr><td>Rejected Details</td></tr></table>'
                    + '<table class="SytemTable" ><thead><tr>'
                    + '<td>Part No.</td>'
                    + '<td>Description</td>'
                    + '<td>Dealer Return Qty.</td>'
                    + '<td>Reason</td>'
                    + '<td>Delivered</td>'
                    + '<td>Amount (Rs.)</td>'
                    + '<td>Accepted Qty - Rep</td>'
                    + '<td>Remarks - Rep</td>'
                    + '<td>Remarks - Admin</td>'
                    + '</tr>'
                    + '</thead>'
                    + '<tbody id="return_detail_cool">';
            for (var i = 0; i < x.length; i++) {
                var k = parseFloat(x[i].delivered);
                hlml += '<tr>'
                        + '<td>' + x[i].item_part_no + '</td>'
                        + '<td>' + x[i].description + '</td>'
                        + '<td style="text-align: right;">' + x[i].dealer_ret_qty + '</td>'
                        + '<td>' + x[i].dealer_ret_reason + '</td>';
                if (k == 1) {
                    hlml += '<td style="text-align: center;">&#10004;</td>';
                } else {
                    hlml += '<td style="text-align: center;">&#10008;</td>';
                }
                hlml += '<td style="text-align: right;">' + x[i].selling_value + '</td>'
                        + '<td style="text-align: right;">' + x[i].rep_accepted_qty + '</td>'
                        + '<td style="text-align: right;">' + x[i].rep_remarks + '</td>'

                        //   + '<td style="text-align: right;">' + x[i].admin_accepted_qty + '</td>'
                        + '<td style="text-align: right;">' + x[i].admin_remarks + '</td>'
//                        + '<td>' + x[i].remarks + '</td>'
                        + '</tr>';

            }
            hlml += '</tbody></table>';
            $j.colorbox({
                html: '<div align="center" style="border-style: solid;border-bottom-left-radius: 3px;border-color: lightskyblue;border-width: 1px">' + hlml + '</div>',
                opacity: 0.50
            });
            $j.colorbox.resize();
        }
    });
}

function Admin_Rejected_return_details(return_rep_id) {

//    alert('aa');
    var locations = [];
    var return_rep = return_rep_id;
    var count = $j('#rowCount').val();


    for (var p = 0; p < count; p++) {
        var partNo = $j('#partName_' + p).html();
        var partId = $j('#PartId_' + p).val();
        var discrip = $j('#Discript_' + p).html();
        var qty = $j('#qty_' + p).html();
        var accQty = $j('#acc_qty_' + p).val();
        var remark = $j('#remark_' + p).val();
        var returnRea = $j('#returnRsason_' + p).html();
        var delive = $j('#delive_' + p).html();
        var selling = $j('#selling_' + p).html();
        var return_id = $j('#return_id').val();
        var completed_id = $j('#completed_id').val();
        var array_push = [{partNo: partNo, partId: partId, dis: discrip, qty: qty, accqty: accQty, rema: remark, returea: returnRea, deli: delive, sell: selling, ret_id: return_id, completed_id: completed_id, return_rep: return_rep}];
        locations.push(array_push);
        //console.log(locations);
    }
//    test();
    var stringData = JSON.stringify(locations);
    $j.ajax({
        url: "adminRejectedreturn",
        type: "POST",
        data: {data: stringData},
        success: function () {
            parent.$j.fn.colorbox.close();
            window.location.reload();
        },
        error: function () {

        }
    });
}


function printAllReturmOrder()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("PrintAllreturnOrder").innerHTML;
    var docprint = window.open("", "", disp_setting);
    docprint.document.open();
    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
    docprint.document.write('</head><body onLoad="self.print()"><center>');
    docprint.document.write(content_vlue);
    docprint.document.write('</center></body>');
    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
    docprint.document.close();
    docprint.document.print();
    docprint.focus();
}

function printAllAdminPendinOrder()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("PrintAllAcceeptedOrder").innerHTML;
    var docprint = window.open("", "", disp_setting);
    docprint.document.open();
    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
    docprint.document.write('</head><body onLoad="self.print()"><center>');
    docprint.document.write(content_vlue);
    docprint.document.write('</center></body>');
    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
    docprint.document.close();
    docprint.document.print();
    docprint.focus();
}

function printAllAcceptedOrder()
{
    parent.$j.fn.colorbox.close();
//    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("PrintAllAcceeptedOrder").innerHTML;
    var docprint = window.open("", "", disp_setting);
    docprint.document.open();
    docprint.document.write('<html><head><title>11/FM/2731/07/21</title>');
    docprint.document.write('</head><body onLoad="self.print()"><center>');
    docprint.document.write(content_vlue);
    docprint.document.write('</center></body>');
    docprint.document.write('<footer><div style="position: absolute; bottom: 0; right: 280px;"><p1 style="font-weight: lighter">Powered by Ceylon Linux (pvt) Ltd.</p1></div></footer></html>');
    docprint.document.close();
    docprint.document.print();
    docprint.focus();
}