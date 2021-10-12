/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */
$j(function() {
//     var purchaseOrderNo = session.getAttribrute("employe_id");
//     alert(purchaseOrderNo);
    ;
    console.log(EMPLOYEE_ID);

    $j.ajax({
        url: 'setsalesofficer?emp_idd=' + EMPLOYEE_ID,
        method: 'GET',
        success: function(data) {
            var x = JSON.parse(data);
            console.log(x);
            console.log(x[0]['branch_id']);
            console.log(x[0]['sales_officer_account_no']);
            console.log(x[0]['sales_officer_name']);
            $j('#sales_account_no').val(x[0]['sales_officer_account_no']);
            $j('#salesofficerNameForCreate').val(x[0]['sales_officer_name']);
            $j('#salesOfficerID').val(x[0]['sales_officer_id']);
            $j('#sales_officer_name').val(x[0]['sales_officer_name']);
            getData();
        }
    });


    $j("#tabs").tabs();


});

function get_outlet() {


    $j("#outlet_name").autocomplete({
        source: "auto_outlet",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#outletID').val(data.item.delar_id);
            $j('#delar_name').val(data.item.delar_name);
            $j('#delar_account_no').val(data.item.delar_account_no);


        }
    });
}
function get_Sales_officer() {


    $j("#sales_account_no").autocomplete({
        source: "get_sales_officer",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#salesOfficerID').val(data.item.sales_officer_id);
            $j('#sales_officer_name').val(data.item.sales_officer_name);

            $j('#salesofficerNameForCreate').val(data.item.sales_officer_name);


        }
    });
}

function get_Sales_officer_by_name() {


    $j("#sales_officer_name").autocomplete({
        source: "get_sales_officer_by_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#salesOfficerID').val(data.item.sales_officer_id);
            $j('#sales_account_no').val(data.item.sales_officer_account_no);


        }
    });
}
function getData() {

    var soID = $j('#salesOfficerID').val();

    $j.ajax({
        url: 'getPurchaseOrder?so_idd=' + soID,
        method: 'GET',
        success: function(data) {
            //console.log(data);
            var x = JSON.parse(data);
            console.log(data);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#ti').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {
                    var amount = new Number(y[i].amount);
                    var amount2 = amount.toFixed(2);

                    var discount = new Number(y[i].total_discount);
                    var discount2 = discount.toFixed(2);

                    $j('#acceptTable').append(
                            '<tr><td><input type="hidden" id="po_id_' + i + '"value="' + y[i]['purchase_order_id'] + '"></input>' + y[i]['purchase_order_id'] + '</td><td>' + y[i]['delar_shop_name'] + '</td><td>' + y[i]['delar_account_no'] + '</td><td style="text-align:center">' + y[i]['date'] + '</td><td style="text-align:center">' + y[i]['time'] + '</td><td style="text-align:right">' + amount2 + '</td><td><img id="view_' + y[i]['purchase_order_id'] + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + y[i]['purchase_order_id'] + ');"/></td></tr>'
                            );



                }
            } else {

                $j('#acceptTable').append(
                        '<tr><td>No Recoard</td></tr>'
                        );
            }

            var z = x[1];
            //console.log(z.length - 1);
            $j('#t2').empty();
            if (z.length > 0) {
                for (var i = 0; i < z.length; i++) {
                    var amount = new Number(z[i].amount);
                    var amount3 = amount.toFixed(2);

                    var discount = new Number(z[i].total_discount);
                    var discount4 = discount.toFixed(2);
                    $j('#pendingtTable').append(
                            '<tr id="select_row_' + i + '"><td><input type="hidden" id="po_pen_id_' + i + '"value="' + z[i]['purchase_order_id'] + '"></input>' + z[i]['purchase_order_id'] + '</td><td>' + z[i]['delar_shop_name'] + '</td><td>' + z[i]['delar_account_no'] + '</td><td>' + z[i]['date'] + '</td><td>' + z[i]['time'] + '</td><td style="text-align: right">' + amount3 + '</td><td><img id="viewPending_' + z[i]['purchase_order_id'] + '"width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getPendingOrderDetail(' + z[i]['purchase_order_id'] + ');" /></td></td></td></tr>'
                            );
                    ///----removed

                    //----<td><img "width="20" height="20" src="' + URL + 'public/images/edit.png" onclick="editOrder(' + i + ');"/></td><td><img id="delete_' + i + '" width="20" height="20" src="' + URL + 'public/images/remove4.png" onclick="deleteOrderDetail(' + i + ');" /></td><td><img id="viewPending_' + i + '"width="20" height="20" src="' + URL + 'public/images/reject.png" onclick="rejectOrderDetail(' + i + ')" /></td>

                    // console.log('dsycvufsd' + z[0]);
                    //console.log(z[0][1]['s_o_purchase_order_id']);

                }
            } else {

                $j('#pendingtTable').append(
                        '<tr><td>No Recoard</td></tr>'
                        );
            }


        }
    });
    getRejectOrder();



}

//function getc() {
//
//
//
//
//    $j("#t2").colorbox({width:"50%", inline:true});
//
//}

function getOrderDetail(poid)
{

    var soID2 = $j('#po_id_' + poid).val();

    //var update = $("#div_update_employee_type_form");
    $j('#view_' + poid).colorbox({width: "45%", hight: "60%", inline: true, href: '#div_update_deliver_type_form'});

//
//    $j.ajax({
//        url: 'getDeliverPurchaseOrderDetail?so_idd=' + poid,
//        method: 'GET',
//        success: function(data) {
//           console.log(data);
//            $j('#tks').empty();
//
//            jQuery.each(data, function(index, value) {
//                //console.log(this['new_qty']);
////                var dt = "";
////                var amount = "";
//
////                if (this['discount_type'] < 1) {
////
////                    dt = "default";
////                    amount = (this['unit_price'] - this['discount']) * this['new_qty'];
////                } else {
////                    dt = "%";
////                    amount = (this['unit_price'] * this['new_qty']) - ((this['unit_price'] * this['discount'] / 100) * this['new_qty']);
////                }
//                $j('#tt12').append(
//                        '<tr><td>' + this['item_part_no'] + '</td><td>' + this['description'] + '</td><td style="text-align:right">' + this['unit_price'] + '</td><td style="text-align:right">' + this['quantity'] + '</td></tr>'
//                        );
//
//            });
////        
//        }
//    });
    //----------------------//
    $j.ajax({
        url: 'getPurchaseOrderDetail?so_idd=' + poid,
        method: 'GET',
        success: function(data) {
            
            $j('#tks').empty();

            jQuery.each(data, function(index, value) {
            
//                var dt = "";
//                var amount = "";
//
//                if (this['discount_type'] < 1) {
//
//                    dt = "default";
//                    amount = (this['unit_price'] - this['discount']) * this['item_qty'];
//                } else {
//                    dt = "%";
//                    amount = (this['unit_price'] * this['item_qty']) - ((this['unit_price'] * this['discount'] / 100) * this['item_qty']);
//                }
                $j('#tt12').append(
                        '<tr><td>' + this['item_part_no'] + '</td><td>' + this['description'] + '</td><td>' + this['unit_price'] + '</td><td>' + this['item_qty'] + '</td></tr>'
                        );

            });
//        
        }
    });

}
function getPendingOrderDetail(poid)
{


    var soID2 = $j('#po_pen_id_' + poid).val();


    //var update = $("#div_update_employee_type_form");
    $j('#viewPending_' + poid).colorbox({width: "45%", hight: "60%", inline: true, href: '#div_update_employee_type_form'});

    $j.ajax({
        url: 'getPurchaseOrderDetail?so_idd=' + poid,
        method: 'GET',
        success: function(data) {
            
            $j('#tk').empty();

            jQuery.each(data, function(index, value) {
            
//                var dt = "";
//                var amount = "";
//
//                if (this['discount_type'] < 1) {
//
//                    dt = "default";
//                    amount = (this['unit_price'] - this['discount']) * this['item_qty'];
//                } else {
//                    dt = "%";
//                    amount = (this['unit_price'] * this['item_qty']) - ((this['unit_price'] * this['discount'] / 100) * this['item_qty']);
//                }
                $j('#tt1').append(
                        '<tr><td>' + this['item_part_no'] + '</td><td>' + this['description'] + '</td><td>' + this['unit_price'] + '</td><td>' + this['item_qty'] + '</td></tr>'
                        );

            });
//        
        }
    });


}
function getrejectOrderDetail(poid)
{


    var soID2 = $j('#po_re_id_' + poid).val();


    //var update = $("#div_update_employee_type_form");
    $j('#viewre_' + poid).colorbox({width: "45%", hight: "60%", inline: true, href: '#div_update_employee_type_form'});

    $j.ajax({
        url: 'getPurchaseOrderDetail?so_idd=' + soID2,
        method: 'GET',
        success: function(data) {
            // var x = JSON.parse(data);
            //console.log(data.length);
            $j('#tk').empty();
//             $j('#tt1').append(
//                         ' <thead>'
//                        + '<tr>'
//                        + '<td>Part No</td>'
//                        + '<td>Description</td>'
//                        + '<td>Unit Price</td>'
//                        + '<td>Discount Type</td>'
//                        + '<td>Unit Discount</td>'
//                        + '<td>Qty</td>'
//                        + '<td>Net Amount</td>'
//
//                        + '</tr>'
//                        + '</thead>'
//                );
            jQuery.each(data, function(index, value) {
                // console.log(this['qty']);
                var dt = "";
                var amount = "";

                if (this['discount_type'] < 1) {

                    dt = "default";
                    amount = (this['unit_price'] - this['discount']) * this['qty'];
                } else {
                    dt = "%";
                    amount = (this['unit_price'] * this['qty']) - ((this['unit_price'] * this['discount'] / 100) * this['qty']);
                }
                $j('#tt1').append(
                        '<tr><td>' + this['item_part_no'] + '</td><td>' + this['description'] + '</td><td>' + this['unit_price'] + '</td><td>' + dt + '</td><td>' + this['discount'] + '</td><td>' + this['qty'] + '</td><td>' + amount + '</td></tr>'
                        );

            });
//        
        }
    });


}
function deleteOrderDetail(po) {
    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {

        var soID2 = $j('#po_pen_id_' + po).val();

        $j.ajax({
            url: 'removePurcheOrder?po_idd=' + soID2,
            method: 'GET',
            success: function(data) {
                $j('#select_row_' + po).remove();

            }
        });
        //$j('#delete_' + po).colorbox({width: "45%", hight: "60%", inline: true, href: '#delete_res'});

    }

}
function rejectOrderDetail(po) {
    if (!confirm('Are you sure you want to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
        var soID2 = $j('#po_pen_id_' + po).val();
        $j.ajax({
            url: 'rejectPurcheOrder?po_idd=' + soID2,
            method: 'GET',
            success: function(data) {
                $j('#select_row_' + po).remove();
                getRejectOrder();

            }
        });

    }

}
function getRejectOrder() {



    var soID = $j('#salesOfficerID').val();

    $j.ajax({
        url: 'getrejectOrder?so_idd=' + soID,
        method: 'GET',
        success: function(data) {
            //console.log(data);
            var x = JSON.parse(data);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tR').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {

                    $j('#rejecttTable').append(
                            '<tr><td><input type="hidden" id="po_re_id_' + i + '"value="' + y[i]['s_o_purchase_order_id'] + '"></input>' + y[i]['s_o_purchase_order_id'] + '</td><td>' + y[i]['delar_shop_name'] + '</td><td>' + y[i]['delar_account_no'] + '</td><td>' + y[i]['date'] + '</td><td>' + y[i]['time'] + '</td><td>' + y[i]['total_discount'] + '</td><td>' + y[i]['amount'] + '</td><td>' + y[i]['branch_account_no'] + '</td><td><img id="viewre_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getrejectOrderDetail(' + i + ');"/></td></tr>'
                            );



                }
            } else {

                $j('#rejecttTable').append(
                        '<tr><td>No Recoard</td></tr>'
                        );
            }




        }
    });



}
function editOrder(poid) {
    var soID2 = $j('#po_pen_id_' + poid).val();

    var d = 'dsv'
    window.open(URL + "sales_officer_pur_ord/drawIndex_edit_purchase_order?k=1&accc=" + soID2, null, "height=600,width=1200,status=yes,toolbar=no,menubar=no,top=20,left=20");

}
function showhistory() {

   
       window.open(
                'drawIndex_S_O_Pur_Ord_history?k=1', 'popUpWindow', 'height=700,width=1000,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes');
  

}

