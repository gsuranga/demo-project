
/**
 * Description of Tour_iteneray
 *
 * @author Shamil
 */
$j(function () {


    //enable_submit();
    $j("#start_date_mr").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#start_date_").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#end_date_").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    // get_salesOficerName();



    $j('#SalesOficer_name1').val(username);

    $j('#SalesOficer_name1').attr('disabled', true);
    $j('#salescode').attr('disabled', true);





});

//$j(document).ready(function() {
//    get_salesOficerName();
//});

function get_town() {

    $j.ajax({
        url: 'drawCity',
        data: {"id": $j("#cmd_district").val()},
        method: 'POST',
        success: function (data) {
            $j("#append").html(data);

        }});
}

function get_City() {
    var DistrictID = $j('#cmd_district').val();

    $j("#town_name").autocomplete({
        source: "get_City?hidden_District_id=" + DistrictID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#city_id').val(data.item.city_id);

        }
    });
}

function get_City1() {

    $j("#town_1").autocomplete({
        source: "get_City1",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#town_id_1').val(data.item.city_id);


        }
    });
}

function get_CityNEW(id) {

    $j("#town_" + id).autocomplete({
        source: "get_City1",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#town_id_' + id).val(data.item.city_id);


        }
    });



}

function get_catogory() {

    $j("#catogary").autocomplete({
        source: "get_catogory",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#catogory_id').val(data.item.visit_category_id);
            $j("#selected_name").autocomplete({
                source: "get_dealer_detail?catogory_id=" + $j('#catogory_id').val(),
                width: 265,
                selectFirst: true,
                minlength: 1,
                dataType: "jsonp",
                select: function (event, data) {
                    $j('#selected_id').val(data.item.dealer_id);
                }
            });
        }
    });


}
function get_purpose() {

    $j("#purpose").autocomplete({
        source: "get_purpose",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#purpose_id').val(data.item.visit_purpose_id);


        }
    });


}

function get_salesOficerName() {


    var id = $j('#sales_oficer_id').val();

    $j.ajax({
        url: 'get_salesOficer_detail',
        data: {"id": id},
        method: 'POST',
        success: function (data) {

            var x = JSON.parse(data)

            console.log(x[0].acNo);
            console.log(x[0].branch);
            console.log(x[0].branchId);
//        console.log(data);

            $j('#acountNo').val(x[0].acNo);
            $j('#branchName').val(x[0].branch);
            $j('#Branch_idHD').val(x[0].branchId);


        }});




}



function get_salesOficeractNumber() {

    $j("#acountNo").autocomplete({
        source: "get_salesOficeractNumber",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#SalesOficer_name').val(data.item.sales_officer_name);
            $j('#branchName').val(data.item.branch_name);
            $j('#sales_oficer_id').val(data.item.sales_officer_id);
            $j('#Branch_idHD').val(data.item.branch_id);


        }
    });


}


function delete_item(id) {

    var Tour_Plan_ID = $j("#HID_ID" + id).val();



    if (!confirm('Are you sure you want to delete?')) {
        ev.preventDefault();
        return false;
    } else {

        var detail = new Array();
        detail[0] = Tour_Plan_ID;



        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'deleteItem',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function (data) {
                alert('sucsessfully delete');
                location.reload();
            },
            error: function () {
                alert('error');
            }

        });

    }

}

function get_dealerName() {
    var TownID = $j('#town_id_1').val();

    $j("#dealer_1").autocomplete({
        source: "get_dealerName?dealer_id_=" + TownID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#dealer_Acco_1').val(data.item.delar_account_no); // view
            $j('#town_1').val(data.item.city_name); // view
            $j('#dealer_id_1').val(data.item.delar_id); // hidden
            $j('#town_id_1').val(data.item.city_id); // hidden

        }
    });
}
function get_dealerName1(id) {
    var TownID = $j('#town_id_'+id).val();

    $j("#dealer_" + id).autocomplete({
        source: "get_dealerName?dealer_id_=" + TownID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#dealer_id_' + id).val(data.item.delar_id);
            $j('#dealer_Acco_' + id).val(data.item.delar_account_no);
            $j('#town_id_'+ id).val(data.item.city_id); // hidden
            $j('#town_' + id).val(data.item.city_name);
        }
    });
}

function dealer_type(){
    
    
    var type = $j('#dealer_type').val();
    $j("#dealer_type").autocomplete({
        source: "dealer_type?type=" + type,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
        
        //   $j('#dealer_Acco_1').val(data.item.delar_account_no);
//             $j('#dealer_id_1').val(data.item.delar_id);
//            $j('#dealer_1').val(data.item.delar_name);
//             $j('#town_id_1').val(data.item.city_id); // hidden
//            $j('#town_1').val(data.item.city_name);

        }
    });
    
    
}


function dealer_Acco() {
    var TownID = $j('#dealer_Acco_1').val();


    $j("#dealer_Acco_1").autocomplete({
        source: "dealer_Acco?acc_no=" + TownID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

        //   $j('#dealer_Acco_1').val(data.item.delar_account_no);
             $j('#dealer_id_1').val(data.item.delar_id);
            $j('#dealer_1').val(data.item.delar_name);
             $j('#town_id_1').val(data.item.city_id); // hidden
            $j('#town_1').val(data.item.city_name);

        }
    });
}
function dealer_Acco1(id) {
    var TownID = $j('#dealer_Acco_'+id).val();


    $j("#dealer_Acco_" + id).autocomplete({
        source: "dealer_Acco?acc_no=" + TownID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

     //       $j('#dealer_Acco_' + id).val(data.item.delar_account_no);
            $j('#dealer_id_'+ id).val(data.item.delar_id);
            $j('#dealer_' + id).val(data.item.delar_name);
             $j('#town_id_').val(data.item.city_id); // hidden
            $j('#town_' + id).val(data.item.city_name);

        }
    });
}

function get_DealerNEW(id) {
    var TownID = $j('#town_id_' + id).val();

    $j("#dealer_" + id).autocomplete({
        source: "get_dealerName?hidden_Town_id=" + TownID,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#dealer_id_' + id).val(data.item.delar_id);


        }
    });



}

function get_BranchCode() {
    $j("#branchCod").autocomplete({
        source: "get_BranchCode",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#branchID').val(data.item.branch_id);


        }
    });



}

function get_salesOficerCode() {


    $j("#salesCode").autocomplete({
        source: "get_salesOficeCode",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


//                $j('#acountNo').val(data.item.sales_officer_account_no);
//                $j('#branchName').val(data.item.branch_name);
//                $j('#Branch_idHD').val(data.item.branch_id);


        }
    });
}


function addRow(idd, y) {

    var id = y + 1;
    $j('#' + idd).hide();
    var outputTbl1 = document.getElementById('tbody1');
    var outputTbl2 = document.getElementById('tbl_purchaseorder');

    $j('#tbl_purchaseorder').append(
            '<tr id=' + id + ' name="tr_' + id + '"> '
            + '<td><input type="button" name="add_row_' + id + '" id="add_row_' + id + '" value="+" onclick="addRow(this.id,' + id + ');"></td>'
            + '<td><select name = "type_' + id + '" id = "type_' + id + '"> <option selected>Type Of Customer</option><option value="Dealers">Dealers</option><option value="Fleet Owners">Fleet Owners</option></select></td>'
            + '<td><input type="text" name="dealer_Acco_' + id + '" id="dealer_Acco_' + id + '" onfocus="dealer_Acco1(' + id + ');" autocomplete="off" placeholder="Dealer Acc. No"/><input type="hidden" name="dealer_Acco_id_' + id + '" id="dealer_Acco_id_' + id + '"/>'
            + '<td><input type="text" name="dealer_' + id + '" id="dealer_' + id + '" onfocus="get_dealerName1(' + id + ');" autocomplete="off" placeholder="Select Dealer"/><input type="hidden" name="dealer_id_' + id + '" id="dealer_id_' + id + '"/></td>'
            + '<td><input type="text" name="town_' + id + '" id="town_' + id + '" onfocus="get_CityNEW(' + id + ');" autocomplete="off" placeholder="Select Town"/><input type="hidden" name="town_id_' + id + '" id="town_id_' + id + '"></td>'
            + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td></tr>'

            );
    $j('#updateRowCount').val(id);






}

function addRow1(idd, y) {

    var id = y + 1;
    $j('#' + idd).hide();
    var outputTbl1 = document.getElementById('tbody1');
    var outputTbl2 = document.getElementById('tbl_purchaseorder');

    $j('#tbl_ammendments').append(
            '<tr id=' + id + ' name="tr_' + id + '"> '
            + '<td><input type="button" name="add_row_' + id + '" id="add_row_' + id + '" value="+" onclick="addRow(this.id,' + id + ');"></td>'
            + '<td><input type="text" name="item_name_' + id + '" id="item_name_' + id + '" onfocus="get_product(' + id + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + id + '" id="item_id_' + id + '"><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '"></td>'

            + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td></tr>'

            );
    $j('#updateRowCount').val(id);






}


function deleteRow(id) {


    $j('#' + id).remove();
    var table = document.getElementById('tbl_purchaseorder');
    var idd = (table.rows.length);
    var ck = idd - 1;

    var row = table.rows[idd - 1];
    var i = row.id;

    $j('#add_row_' + (i)).show();
    if (ck === 0) {
        $j('#tbl_purchaseorder').append(
                '<tr id=' + 1 + ' name="tr_' + 1 + '">'
                + '<td><input type="button" name="add_row_' + 1 + '" id="add_row_' + 1 + '" value="+" onclick="addRow(this.id,' + 1 + ');" ></td>'
                + '<td><input type="text" name="item_name_' + 1 + '" id="item_name_' + 1 + '" value="" onfocus="get_product(' + 1 + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + 1 + '" id="item_id_' + 1 + '">'
                + ' <input type="hidden" id="rowCount" name="rowCount" value="1"/>'
//                                + '<input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>'
//                                + '<input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place'); ?>"/>'
                + '</td>'
//                                + '<td><input type="text" name="discuntamount_' + 1 + '" id="discuntamount_' + 1 + '" readonly="true" value="0.00"></td>'
                + '<td><input type="button" id="del_row_' + 1 + '" name="del_row_' + 1 + '" value="-" onclick="deleteRow(' + 1 + ');"></td>'

                + ' </tr>'
                );
        $j('#updateRowCount').val(1);

    }
//        if (id > 1) {
//            $j('#del_row_' + (id)).show();
//        }
//        $j('#rowCount').val(idd);

    count();
    loadFreeItem();
}


function count() {
    var table = document.getElementById('tbl_purchaseorder');
    var idd = (table.rows.length);
    ///*******************************************************

    ///*******************************************************
    var total = 0;
    var totDiscount = 0;
    for (var k = 1; k < idd; k++) {
        var row = table.rows[k];
        var i = row.id;
        // console.log('Row ID:'+row.id);
        var price = 0;
        var qty = 0;
        var amount = 0;
        var discount_amount = 0;
        var discount = $j('#discount_' + i).val();
        var discount_type = $j('#type_' + i).val();
//            if (parseFloat(discount.trim()) != "0.00") {
//                if ((discount_type).trim() == "2") {
//                    price = ((100 * parseFloat($j('#item_price_' + i).val().trim())) - (parseFloat($j('#item_price_' + i).val().trim()) * parseFloat(discount.trim()))) / 100;
//                } else if ((discount_type).trim() == "1") {
//                    price = parseFloat($j('#item_price_' + i).val().trim()) - parseFloat(discount.trim());
//                } else if ((discount_type).trim() == "0") {
//                    price = parseFloat($j('#item_price_' + i).val().trim());
//                }
//            } else {
        price = parseFloat($j('#item_price_' + i).val().trim());
//            }
        qty = $j('#item_qty_' + i).val();
        var checkDiscount = $j('#combo_id_' + i + ' option:selected').val();
        if (checkDiscount === "Default") {
            amount = (price * qty);
            discount_amount = discount * qty;
            $j('#amount_' + i).val(amount);
            $j('#discuntamount_' + i).val(discount_amount);
            totDiscount = totDiscount + discount_amount;
            total = (total + amount) - discount_amount;
        } else {
            amount = (price * qty);
            discount_amount = (price * discount) / 100 * qty;
            $j('#amount_' + i).val(amount);
            $j('#discuntamount_' + i).val(discount_amount);
            totDiscount = totDiscount + discount_amount;
            total = (total + amount) - discount_amount;
        }


    }
    $j('#total').val(total);
    $j('#total_amount').val(total);
    $j('#total_discount').val(totDiscount);

}

//function enable_submit() {
//    var currentTime = new Date();
//    var hour = currentTime.getHours();
//    var minute = currentTime.getMinutes();
//
//
//
//
//    if (hour < 10) {
//        hour = '0' + hour;
//    }
//    if (minute < 10) {
//        minute = '0' + minute;
//
//    }
//
////    var hidden_time = hour + ':' + minute;
////alert("hidden_time");
//    my_time = hour + ':' + minute;
//
//
//
////    var hidden_time = $('#hidden_time').val();
////    console.log(hidden_time);
//
//    var setTimes = "07:00";
//
//    if (setTimes <= my_time) {
//
//        //$('#submit').attr('disabled', 'disabled');
//
//        // alert("You should Edit before 3.00 PM");
//
//        $j('#ff').attr('disabled', true);
//        $j('ff').val('asd');
//
//    } else {
//        $('#b1').prop('disabled', false);
////            alert("Reg Active");
//    }
//
//
//}

//--------------------------------------------------------salesman tracking -- Dinesh-------------------------------------
$j(function () {
    var year = new Date().getFullYear();
    $j('#txt_tour_month').monthpicker({
        pattern: 'yyyy-mm', // Degeyfault is 'mm/yyyy' and separator char is not mandatory
        selectedYear: year,
        startYear: 2000,
        finalYear: year,
        monthNames: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    });
});

function getSalesOficerName() {


    $j("#txt_officer_name").autocomplete({
        source: "get_salesOficerName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {


            $j('#txt_officer_id').val(data.item.sales_officer_id);
            $j('#salesCode').val(data.item.sales_officer_account_no);
            $j('#branchCod').val(data.item.branch_name);


        }
    });


}

function getSalesOfficerCode() {


    $j("#salesCode").autocomplete({
        source: "get_sales_officer_account_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#txt_officer_name').val(data.item.sales_officer_name);
            $j('#txt_officer_id').val(data.item.sales_officer_id);
            $j('#branchCod').val(data.item.branch_name);


        }
    });
}
function reportsToExcel(table, name) {

    if (!table.nodeType) {
        table1 = document.getElementById(table);
        download(table1.outerHTML, name, "application/vnd.ms-excel");
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
        setTimeout(function () {
            a.click();
            D.body.removeChild(a);
        }, 66);
        return true;
    } /* end if('download' in a) */


    //do iframe dataURL download (old ch+FF):
    var f = D.createElement("iframe");
    D.body.appendChild(f);
    f.src = "data:" + strMimeType + "," + encodeURIComponent(strData);

    setTimeout(function () {
        D.body.removeChild(f);
    }, 333);
    return true;
}

$j(function () {
    $j(document).tooltip();
});

function validateForm() {
    var officerName = document.forms["search_tour_data"]["txt_officer_name"].value;
    var officeCode = document.forms["search_tour_data"]["salesCode"].value;
    var month = document.forms["search_tour_data"]["txt_tour_month"].value;
    if (officerName == null || officerName == "") {
        alert("Please select a sales offier.");
        return false;
    }
    else if (officeCode == null || officeCode == "") {
        return false;
    } else if (month == null || month == "") {
        alert("Please select a month.");
        return false;
    }
}


$j(function () {
    $j("#hidden_popup").dialog({
        autoOpen: false,
        resizable: false,
        width: 'auto',
        minHeight: '50',
        show: 'fade',
        hide: 'fade',
    });
    $j(".order_data").mouseover(function (e) {
        //$j("#hidden_popup").dialog("option", "maxHeight", 20);
        var x = e.pageX - $j(document).scrollLeft() + 15;
        var y = e.pageY - $j(document).scrollTop() + 15;
        $j("#hidden_popup").dialog("option", "position", [x, y]);
        $j("#hidden_popup").dialog("option", "closeOnEscape", true);
        $j("#hidden_popup").dialog("option", "hide", {effect: "fade"});
        $j(".ui-dialog-titlebar").hide();
        $j("#hidden_popup").dialog("open", "autoOpen", false);
    });
    $j("#hidden_popup").mouseover(function (e) {
        $j("#hidden_popup").dialog("open");

    });

    $j("#hidden_popup").mouseout(function (e) {
        $j("#hidden_popup").dialog("close");
    });

    $j(".order_data").mouseout(function (e) {
        $j("#hidden_popup").dialog("close");
    });

});

$j(function () {
    $j("#hidden_collection_popup").dialog({
        autoOpen: false,
        resizable: false,
        width: 'auto',
        minHeight: '50',
        show: 'fade',
        hide: 'fade',
    });
    $j(".collection_data").mouseover(function (e) {
        //$j("#hidden_popup").dialog("option", "maxHeight", 20);
        var x = e.pageX - $j(document).scrollLeft() + 15;
        var y = e.pageY - $j(document).scrollTop() + 15;
        $j("#hidden_collection_popup").dialog("option", "position", [x, y]);
        $j("#hidden_collection_popup").dialog("option", "closeOnEscape", true);
        $j("#hidden_collection_popup").dialog("option", "hide", {effect: "fade"});
        $j(".ui-dialog-titlebar").hide();
        $j("#hidden_collection_popup").dialog("open", "autoOpen", false);
    });
    $j("#hidden_collection_popup").mouseover(function (e) {
        $j("#hidden_collection_popup").dialog("open");

    });

    $j("#hidden_collection_popup").mouseout(function (e) {
        $j("#hidden_collection_popup").dialog("close");
    });

    $j(".collection_data").mouseout(function (e) {
        $j("#hidden_collection_popup").dialog("close");
    });

});

function writeMessage(officerID, date) {
    var officerID = officerID;
    var tourDate = date;
    $j.ajax({
        url: 'getPurchaseOrders?officer_id=' + officerID + '&tour_date=' + tourDate,
        method: 'GET',
        success: function (data) {


            var x = JSON.parse(data);

            var length = x.length;
            console.log();
            $j('#tbl_order_data').empty();
            if (length > 0) {

                for (var i = 0; i < length; i++) {

                    $j('#tbl_order_data').append(
                            "<tr><td><a style=\"text-decoration: none;\" href = \"drawIndexTourPurchaseOrders?token_purchase_order_iD=" + x[i]['purchase_order_id'] + "\" onclick=\"window.open(this.href,'Order content','left=150,top=20,width=600,height=500,resizable=0');return false;\">" + x[i]['purchase_order_number'] + " </a></td></tr>"
                            );
                }
            } else {

                $j('#tbl_order_data').append(
                        "<tr><td>No purchase orders</td></tr>"
                        );
            }



        }
    }
    );
}

function popupCollection(officerID, date) {
    var officerID = officerID;
    var tourDate = date;
    $j.ajax({
        url: 'getCollectionData?officer_id=' + officerID + '&tour_date=' + tourDate,
        method: 'GET',
        success: function (data) {


            var x = JSON.parse(data);
            var cash_length = x['cash_payments'].length;
            //console.log(x['diposit_payments'][0]);
            $j('#tbl_cash_payment_data').empty();
            if (cash_length > 0) {
                $j('#tbl_cash_payment_data').append(
                        "<tr><td style=\"font-weight: 700\">Cash Payments:</td></tr>"
                        );
                for (var i = 0; i < cash_length; i++) {
                    $j('#tbl_cash_payment_data').append(
                            "<tr><td>" + x['cash_payments'][i]['cash_payment'] + "</td></tr>"
                            );
                }
            } else {

                $j('#tbl_cash_payment_data').append(
                        "<tr><td style=\"font-weight: 700\">Cash Payments:</td></tr>" +
                        "<tr><td>-</td></tr>"
                        );
            }

            var cheque_length = x['cheque_payments'].length;
            $j('#tbl_cheque_payment_data').empty();
            if (cheque_length > 0) {
                $j('#tbl_cheque_payment_data').append(
                        "<tr><td style=\"font-weight: 700\">Cheque Payments:</td></tr>"
                        );
                for (var i = 0; i < cheque_length; i++) {
                    $j('#tbl_cheque_payment_data').append(
                            "<tr><td>" + x['cheque_payments'][i]['cheque_payment'] + "</td></tr>"
                            );
                }
            } else {

                $j('#tbl_cheque_payment_data').append(
                        "<tr><td style=\"font-weight: 700\">Cheque Payments:</td></tr>" +
                        "<tr><td>-</td></tr>"
                        );
            }


            var deposit_length = x['diposit_payments'].length;
            $j('#tbl_bd_payment_data').empty();
            if (deposit_length > 0) {
                $j('#tbl_bd_payment_data').append(
                        "<tr><td style=\"font-weight: 700\">Bank Deposits:</td></tr>"
                        );
                for (var i = 0; i < cheque_length; i++) {
                    $j('#tbl_bd_payment_data').append(
                            "<tr><td>" + x['diposit_payments'][i]['deposit_payment'] + "</td></tr>"
                            );
                }
            } else {

                $j('#tbl_bd_payment_data').append(
                        "<tr><td style=\"font-weight: 700\">Bank Deposits:</td></tr>" +
                        "<tr><td>-</td></tr>"
                        );
            }


        }
    }
    );
}


//--------------------------------------------------------salesman tracking -- Dinesh-------------------------------------
function changeValues() {
    var selectedName = document.getElementById("selected_name");
    var selectedID = document.getElementById("selected_name");
    var selectedVID = document.getElementById("selected_customer_id");
    selectedID.value = "";
    selectedName.value = "";
    selectedVID.value = "";
}

function getSelectionsForCategories() {
    category = $j('#cmb_visit_categoris').val();
    if (category == 1) {
        $j("#selected_name").autocomplete({
            source: "getAllDealerNames",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function (event, data) {
                $j('#selected_id').val(data.item.delar_id);
            }
        });
    } else if (category == 2) {
        $j("#selected_name").autocomplete({
            source: "getAllGarages",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function (event, data) {
                $j('#selected_id').val(data.item.garage_id);
            }
        });
    } else if (category == 3) {
        $j("#selected_name").autocomplete({
            source: "getAllFleetOwnerVehicles",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function (event, data) {
                $j('#selected_id').val(data.item.vehicle_id);
                $j('#selected_customer_id').val(data.item.customer_id);
            }
        });
    } else if (category == 4) {
        $j("#selected_name").autocomplete({
            source: "getAllNewShops",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function (event, data) {
                $j('#selected_id').val(data.item.shop_id);
            }
        });
    } else if (category == 5) {
        $j("#selected_name").autocomplete({
            source: "getAllVehicleOwnerVehicles",
            width: 265,
            selectFirst: true,
            minlength: 1,
            dataType: "jsonp",
            select: function (event, data) {
                $j('#selected_id').val(data.item.vehicle_id);
                $j('#selected_customer_id').val(data.item.customer_id);

            }
        });
    } else {
        $j("#selected_name").autocomplete({
            source: "",
        });
    }
}
function showVisitHistory() {
    category = $j('#cmb_visit_categoris').val();
    selectedID = $j('#selected_id').val();
    // selectedID = $j('#selected_id').val();

    $j.ajax({
        url: 'getVisitHistory?selected_id=' + selectedID + '&category=' + category,
        method: 'GET',
        success: function (data) {
            $j('#tbl_visit_history_body').empty();
            parse = JSON.parse(data);
            jsonLength = parse[0].length;
            if (jsonLength > 0) {
                $j('#tbl_visit_history_body').append(
                        "<tr></tr>"
                        );
                for (var i = 0; i < jsonLength; i++) {
                    $j('#tbl_visit_history_body').append(
                            "<tr><td>" + parse[0][i]['visit_date'] + "</td><td>" + parse[0][i]['sales_officer_name'] + "</td><td>" + parse[0][i]['purpose_id_name'] + "</td><td>" + parse[0][i]['description'] + "</td></tr>"
                            );
                }
            } else {

                $j('#tbl_visit_history_body').append(
                        '<tr hidden="hidden"><td> </td></tr>' +
                        '<tr><td>No previous visits found.</td></tr>'
                        );
            }

        }
    });
}

function validateTourItenaryForm() {
    var category = document.forms["tour_itenary_form"]["cmb_visit_categoris"].value;
    var selectedName = document.forms["tour_itenary_form"]["selected_name"].value;
    var purpose = document.forms["tour_itenary_form"]["cmb_visit_purposes"].value;
    var selectedID = document.forms["tour_itenary_form"]["selected_id"].value;
    //alert(category + " cat" + selectedName + " pur" + purpose + " sid" + selectedID);

    if (category == null || category == "" || category == 0) {
        alert("Please select a category.");
        return false;
    }
    else if (selectedName == null || selectedName == "") {
        alert("Please select a choice");
        return false;
    } else if (purpose == null || purpose == "" || purpose == 0) {
        alert("Please select a purpose.");
        return false;
    } else if (selectedID == null || selectedID == "" || selectedID == 0) {
        alert("Please select a choice.");
        return false;
    }
}

function salesOfficerWiseHistory() {
    officerID = $j('#txt_hidden_officer_id').val();
    startDate = $j('#start_date_').val();
    endDate = $j('#end_date_').val();
    // selectedID = $j('#selected_id').val();

    $j.ajax({
        url: 'drawSalesOfiicerWiseHistory?officer_id=' + officerID + '&start_date=' + startDate + '&end_date=' + endDate,
        method: 'GET',
        success: function (data) {
            $j('#officer_history_body').empty();
            parse = JSON.parse(data);
            //console.log(parse['dealer_wise'][0]['category_name']);
            dealerWiseLength = parse['dealer_wise'].length;
            garageWiseLength = parse['garage_wise'].length;
            foWiseLength = parse['fo_wise'].length;
            nsWiseLength = parse['ns_wise'].length;
            voWiseLength = parse['vo_wise'].length;
            if (dealerWiseLength > 0) {
                $j('#officer_history_body').append(
                        "<tr></tr>"
                        );
                for (var i = 0; i < dealerWiseLength; i++) {
                    $j('#officer_history_body').append(
                            "<tr><td>" + parse['dealer_wise'][i]['visit_date'] + "</td><td>" + parse['dealer_wise'][i]['visit_time'] + "</td><td>" + parse['dealer_wise'][i]['route'] + "</td><td>" + parse['dealer_wise'][i]['category_name'] + "</td><td>" + parse['dealer_wise'][i]['purpose_id_name'] + "</td><td>" + parse['dealer_wise'][i]['description'] + "</td></tr>"
                            );
                }
            }
            if (garageWiseLength > 0) {
                for (var i = 0; i < garageWiseLength; i++) {
                    $j('#officer_history_body').append(
                            "<tr><td>" + parse['garage_wise'][i]['visit_date'] + "</td><td>" + parse['garage_wise'][i]['visit_time'] + "</td><td>" + parse['garage_wise'][i]['route'] + "</td><td>" + parse['garage_wise'][i]['category_name'] + "</td><td>" + parse['garage_wise'][i]['purpose_id_name'] + "</td><td>"  + parse['garage_wise'][i]['description'] + "</td></tr>"
                            );
                }
            }
            if (foWiseLength > 0) {
                for (var i = 0; i < foWiseLength; i++) {
                    $j('#officer_history_body').append(
                            "<tr><td>" + parse['fo_wise'][i]['visit_date'] + "</td><td>" + parse['fo_wise'][i]['visit_time'] + "</td><td>" + parse['fo_wise'][i]['route'] + "</td><td>" + parse['fo_wise'][i]['category_name'] + "</td><td>" + parse['fo_wise'][i]['purpose_id_name'] + "</td><td>" + parse['fo_wise'][i]['description'] + "</td></tr>"
                            );
                }
            }
            if (nsWiseLength > 0) {
                for (var i = 0; i < nsWiseLength; i++) {
                    $j('#officer_history_body').append(
                            "<tr><td>" + parse['ns_wise'][i]['visit_date'] + "</td><td>" + parse['ns_wise'][i]['visit_time'] + "</td><td>" + parse['ns_wise'][i]['route'] + "</td><td>" + parse['ns_wise'][i]['category_name'] + "</td><td>" + parse['ns_wise'][i]['purpose_id_name'] + "</td><td>" + parse['ns_wise'][i]['description'] + "</td></tr>"
                            );
                }
            }
            if (voWiseLength > 0) {
                for (var i = 0; i < voWiseLength; i++) {
                    $j('#officer_history_body').append(
                            "<tr><td>" + parse['vo_wise'][i]['visit_date'] + "</td><td>" + parse['vo_wise'][i]['visit_time'] + "</td><td>" + parse['vo_wise'][i]['route'] + "</td><td>" + parse['vo_wise'][i]['category_name'] + "</td><td>" + parse['vo_wise'][i]['purpose_id_name'] + "</td><td>"  + parse['vo_wise'][i]['description'] + "</td></tr>"
                            );
                }
            }
            if (dealerWiseLength == 0 && garageWiseLength == 0 && foWiseLength == 0 && nsWiseLength == 0 && voWiseLength == 0) {
                $j('#officer_history_body').append(
                        "<tr></tr>" +
                        "<tr><td>No previous visits found</td></tr>"
                        );
            }
        }
    });
}

    