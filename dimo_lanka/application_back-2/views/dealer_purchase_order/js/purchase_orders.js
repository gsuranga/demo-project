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

function reportsToExcel(table, name) {
    if (!table.nodeType) {
        table = document.getElementById(table);
        download(table.outerHTML, name, "application/vnd.ms-excel");
    } else {
        alert('not a table');
    }
}

function download(strData, strFileName, strMimeType) {
    var D = document,
            a = D.createElement("a");
    strMimeType = strMimeType || "application/octet-stream";



    if (window.MSBlobBuilder) { //IE10+ routine
        var bb = new MSBlobBuilder();
        bb.append(strData);
        return navigator.msSaveBlob(bb, strFileName);
    } /* end if(window.MSBlobBuilder) */


    if ('download' in a) { //html5 A[download]
        a.href = "data:" + strMimeType + "," + encodeURIComponent(strData);
        a.setAttribute("download", strFileName);
        a.innerHTML = "downloading...";
        D.body.appendChild(a);
        setTimeout(function() {
            a.click();
            D.body.removeChild(a);
        }, 66);
        return true;
    } /* end if('download' in a) */


    //do iframe dataURL download (old ch+FF):
    var f = D.createElement("iframe");
    D.body.appendChild(f);
    f.src = "data:" + strMimeType + "," + encodeURIComponent(strData);

    setTimeout(function() {
        D.body.removeChild(f);
    }, 333);
    return true;
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

//function getSystemURL() {
//    $j.ajax({
//        url: 'getSystemURL',
//        method: 'GET',
//        success: function(data) {
//            console.log(data);
//        }
//    });
//}
function getDealerPurchaseOrders() {

    var dealerID = $j('#hidden_dealer_id').val();
    //console.log(dealerID);
    $j.ajax({
        url: 'getDealerPurchaseOrders?hidden_dealer_id=' + dealerID,
        method: 'GET',
        success: function (data) {


            var x = JSON.parse(data);
            console.log(x);
            var y = x[0];
            //   console.log(y[0]['s_o_purchase_order_id']);
            $j('#tbl_acc_body').empty();
            if (y.length > 0) {
                for (var i = 0; i < y.length; i++) {

                    $j('#tbl_acc_body').append(
                            '<tr>' +
                            '<td hidden="hidden">' +
                            '<input type="hidden" id="acc_p_o_id_' + i + '" value="' + y[i]['purchase_order_id'] + '">' +
                            '</input></td>' +
                            '<td>' + y[i]['purchase_order_number'] + '</td>' +
                            '<td>' + y[i]['branch_name'] + '</td>' +
                            '<td>' + y[i]['delar_account_no'] + '</td>' +
                            '<td>' + y[i]['delar_shop_name'] + '</td>' +
                            '<td>' + y[i]['date'] + '</td>' +
                            '<td>' + y[i]['time'] + '</td>' +
                            '<td>' + y[i]['amount'] + '</td>' +
                            '<td><img id="acc_view_' + y[i]['purchase_order_id'] + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getAcceptedOrderDetails(' + y[i]['purchase_order_id'] + ',' + "'" + y[i]['delar_name'] + "'" + ',' + "'" + y[i]['delar_account_no'] + "'" + ',' + "'" + y[i]['mobileO'] + "'" + ',' + "'" + y[i]['mobileP'] + "'" + ',' + "'" + y[i]['date'] + "'" + ',' + "'" + y[i]['purchase_order_number'] + "'" + ');"></td></tr>'
//                            '<tr><td><input type="hidden'" id="acc_p_o_id_' + i + '"value="' + y[i]['purchase_order_id'] + '"></input>' + y[i]['purchase_order_id'] + '</td><td>' + y[i]['dealer_purchase_order_id'] + '</td><td>' + y[i]['branch_name'] + '</td><td>' + y[i]['delar_shop_name'] + '</td><td>' + y[i]['date'] + '</td><td>' + y[i]['time'] + '</td><td>' + y[i]['amount'] + '</td><td><img id="' + 'acc_view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getAcceptedOrderDetails(' + i + ');"/></td></tr>'
                            //<img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/>
                            );
                }
            } else {

                $j('#tbl_acc_body').append(
                        '<tr><td>No records found</td></tr>'
                        );
            }
//            var z = x[1];
//            //console.log(z.length - 1);
//            $j('#tbl_reject_body').empty();
//            if (z.length > 0) {
//                for (var i = 0; i < z.length; i++) {
//                    $j('#tbl_reject_body').append(
//                            '<tr><td>' + z[i]['purchase_order_id'] + '</td><td>' + z[i]['dealer_purchase_order_id'] + '</td><td>' + z[i]['branch_name'] + '</td><td>' + z[i]['delar_shop_name'] + '</td><td>' + z[i]['date'] + '</td><td>' + z[i]['time'] + '</td><td>' + z[i]['amount'] + '</td><td><img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/></td></tr>'
//                            //<img id="view_' + i + '" width="20" height="20" src="' + URL + 'public/images/view.png" onclick="getOrderDetail(' + i + ');"/>
//                            );
//
//                }
//            } else {
//
//                $j('#tbl_reject_body').append(
//                        '<tr><td><td>No records found</td></tr>'
//
//                        );
//            }


        }
    });
//getRejectOrder();



}
function getAcceptedOrderDetails(poid, Dname, Dacc, Dmob, Dtel, date, refNo) {

    $j('#acc_view_' + poid).colorbox({
        width: "45%",
        hight: "60%",
        inline: true,
        href: '#acc_orders_div'
    });
    $j.colorbox.resize();
    $j.ajax({
        url: 'getPurchaseOrderDetail?poid=' + poid,
        method: 'GET',
        success: function (data) {
            var text = "Please make arrangement to deliver/Supply above mention items.\nAuthorized by*:" + Dname + "\n\nThis is a computer generated document submitted through dealer's login. Therefore does not carry a signature*";
            console.log(data[0]);
            x = data[0].length;
            $j('#dealerName').html(Dname);
            $j('#danem').html(text);
            $j('#dAccNo').html(Dacc);
            $j('#date').html(date);
            $j('#RefNo').html(refNo);
            $j('#mobileNo').html(Dmob);
            $j('#TelNo').html(Dtel);
            $j('#tbl_acc_order_detail_body').empty();
            $j('#Acc_order_detail').empty();
            var t = 1;
            for (var i = 0; i < x; i++) {
                $j('#tbl_acc_order_detail_body').append(
                        '<tr>'
                        + '<td>' + data[0][i]['item_part_no'] + '</td>'
                        + '<td>' + data[0][i]['description'] + '</td>'
                        + '<td>' + data[0][i]['item_qty'] + '</td>'
                        + '<td>' + data[0][i]['unit_price'] + '</td></tr>'
                        );
                $j('#Acc_order_detail').append(
                        '<tr>'
                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + t + '</td>'

                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + data[0][i]['item_part_no'] + '</td>'
                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + data[0][i]['description'] + '</td>'
                        + '<td style=" border: 1px solid black;text-align: center;font-family:Arial;">' + data[0][i]['item_qty'] + '</td>'
                        );
                t++;
            }
        }

    });
}

function rejectPendingOrder(poid) {
    if (!confirm('Are you sure to Reject?')) {
        ev.preventDefault();
        return false;
    } else {
        var orderid = $j('#purchase_o_id_' + poid).val();
        console.log(soID2);
        $j.ajax({
            url: 'rejectPurchaseOrder?po_idd=' + orderid,
            method: 'GET',
            success: function (data) {
//                window.opener.location.reload(true);
//                e.preventDefault();
//                $j('#select_row_' + po).remove();
//                getRejectOrder();

            }
        });

    }

}
// printout---------------------------//

function Clickheretoprint()
{
    window.opener.location.reload(true);
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
    disp_setting += "scrollbars=yes,width=650, height=600, left=100, top=25";
    var content_vlue = document.getElementById("print_content").innerHTML;

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
    var content_vlue = document.getElementById("PrintAllAcceptedOrder").innerHTML;
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

