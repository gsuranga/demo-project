/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var row_tr_no = 1;
$j(function () {
    $j("#tabs").tabs();
    $j("#from_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#to_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j('#dealer_name_field').focus();
//    $j('#pur_form').click(function() {
//        alert("Handler for .click() called.");
//    });
//    
    $j('#pur_form').keyup(function (e) {

        if (e.keyCode == 27) {
            add_purchase_order();
        }   // esc
    });

    $j.ajax({
        url: 'setsalesofficer?emp_idd=' + EMPLOYEE_ID,
        method: 'GET',
        success: function (data) {
            var x = JSON.parse(data);
            $j('#so_no').html(x[0]['sales_officer_account_no']);
            $j('#so_name').html(x[0]['sales_officer_name']);
            $j('#se_off_code').val(x[0]['sales_officer_code']);
            var today_date = curdate();
            var one_week_date = one_week_ago_date();
            //$j('#from_date').val(one_week_date);
            //$j('#to_date').val(today_date);
            ///console.log(today_date + '****' + one_week_date);
            get_purchase_order('1');

        }
    });


//if(typeof(EventSource) !== "undefined") {
// alert('k');
//} else {
//    // Sorry! No server-sent events support..
//        alert('No');
//}
//var source = new EventSource("server_sent");
//source.onmessage = function(event) {
//    console.log(event.data );
//    $j('#result').val(event.data);
//    document.getElementById("result").innerHTML += event.data + "<br>";
//};

});
function curdate() {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +
            (('' + month).length < 2 ? '0' : '') + month + '-' +
            (('' + day).length < 2 ? '0' : '') + day;

    return output;
}
function one_week_ago_date() {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate() - 7;

    var output = d.getFullYear() + '-' +
            (('' + month).length < 2 ? '0' : '') + month + '-' +
            (('' + day).length < 2 ? '0' : '') + day;

    return output;

}



function get_dealer_name() {
    $j('#dealer_shop_name_field').val('');

    $j('#dealer_account_number_field').val('');
    $j('#dealer_id_for_search').val('');
    $j('#dealer_discount').val('');

    $j("#dealer_name_field").autocomplete({
        source: "get_dealer_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_account_number_field').val(data.item.delar_account_no);
            $j('#dealerAccountNo').val(data.item.delar_id);
            $j('#dealer_shop_name_field').val(data.item.delar_shop_name);
            $j('#dealer_id_for_search').val(data.item.delar_id);
            $j('#dealer_discount').val(data.item.discount_percentage);
            $j('#d_p').html(data.item.discount_percentage + '%');
            $j('#credit_limit').html(Number(data.item.credit_limit).toFixed(2));
            getSoldPartDetail(data.item.delar_id);
            calculate();
            getDeb(data.item.delar_id);
            getPastMovePartsDetail(data.item.delar_id);
            getNotAchivedPartsDetail(data.item.delar_id);
            get_outstanding_amount(data.item.delar_id);
            check_event_dealer_selected(event);

        }
    });
}
function get_dealer_account_number() {
    $j('#dealer_name_field').val('');
    $j('#dealer_shop_name_field').val('');
    $j('#dealer_id_for_search').val('');
    $j('#dealer_discount').val('');


    $j("#dealer_account_number_field").autocomplete({
        source: "get_dealer_account_number",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_name_field').val(data.item.delar_name);
            $j('#dealer_shop_name_field').val(data.item.delar_shop_name);
            $j('#dealer_id_for_search').val(data.item.delar_id);
            $j('#dealer_discount').val(data.item.discount_percentage);
            $j('#d_p').html(data.item.discount_percentage + '%');
            $j('#credit_limit').html(Number(data.item.credit_limit).toFixed(2));
            getSoldPartDetail(data.item.delar_id);
            calculate();
            getDeb(data.item.delar_id);
            getPastMovePartsDetail(data.item.delar_id);
            getNotAchivedPartsDetail(data.item.delar_id);
            get_outstanding_amount(data.item.delar_id);
            check_event_dealer_selected(event);
        }
    });
}
function get_dealer_shop_name() {
    $j('#dealer_name_field').val('');

    $j('#dealer_account_number_field').val('');
    $j('#dealer_id_for_search').val('');
    $j('#dealer_discount').val('');
    $j("#dealer_shop_name_field").autocomplete({
        source: "get_dealer_shop_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#dealer_name_field').val(data.item.delar_name);
            $j('#dealer_account_number_field').val(data.item.delar_account_no);
            $j('#dealer_id_for_search').val(data.item.delar_id);
            $j('#dealer_discount').val(data.item.discount_percentage + '%');
            $j('#d_p').html(data.item.discount_percentage);
            $j('#credit_limit').html(Number(data.item.credit_limit).toFixed(2));
            getSoldPartDetail(data.item.delar_id);
            calculate();
            getDeb(data.item.delar_id);
            getPastMovePartsDetail(data.item.delar_id);
            getNotAchivedPartsDetail(data.item.delar_id);
            get_outstanding_amount(data.item.delar_id);

        }
    });
}
//---------------SLIDE-------------
$j(document).ready(function (e) {

    $j('#dropdown').on('click', function () {

        $j('.dropdownwrap').slideToggle();

        if ($j('#dropdown').html() === 'Show Sold Parts') {
            $j("#dropdown").css("color", "red");
            $j('#dropdown').html('Hide Sold Parts');
        } else if ($j('#dropdown').html() === 'Hide Sold Parts') {
            $j("#dropdown").css("color", "blue");
            $j('#dropdown').html('Show Sold Parts');
        }
    });
    $j('#dropdown_parts_move').on('click', function () {

        $j('.dropdownwrap_pm').slideToggle();

        if ($j('#dropdown_parts_move').html() === 'Show Fast Moving Parts') {
            $j("#dropdown_parts_move").css("color", "red");
            $j('#dropdown_parts_move').html('Hide Fast Moving Parts');
        } else if ($j('#dropdown_parts_move').html() === 'Hide Fast Moving Parts') {
            $j("#dropdown_parts_move").css("color", "blue");
            $j('#dropdown_parts_move').html('Show Fast Moving Parts');
        }
    });
    $j('#dropdown_not_achieved').on('click', function () {

        $j('.dropdownwrap_not_achieved').slideToggle();

        if ($j('#dropdown_not_achieved').html() === 'Show Not Achieved Parts') {
            $j("#dropdown_not_achieved").css("color", "red");
            $j('#dropdown_not_achieved').html('Hide Not Achieved Parts');
        } else if ($j('#dropdown_not_achieved').html() === 'Hide Not Achieved Parts') {
            $j("#dropdown_not_achieved").css("color", "blue");
            $j('#dropdown_not_achieved').html('Show Not Achieved Parts');
        }
    });

});
//-------------Search Table---------------
function search_table() {

    var value = $j('#search_description_field').val().toUpperCase();
    var rowCount = $j('#tbl_sold tr').length;
    var len = value.length;

    for (var i = 1; i < rowCount; i++) {
        var tbl_des = $j('#tbl_desc_' + i).html().substring(0, len).toUpperCase();
        if (value === tbl_des) {
            $j('#row_no_' + i).show();
            console.log(i);
        } else {
            $j('#row_no_' + i).hide();
        }

    }

}
function search_table_pm() {

    var value = $j('#search_description_field_pm').val().toUpperCase();
    var rowCount = $j('#tbl_past_moving tr').length;
    var len = value.length;

    for (var i = 1; i < rowCount; i++) {
        var tbl_des = $j('#tbl_desc_pm_' + i).html().substring(0, len).toUpperCase();
        if (value === tbl_des) {
            $j('#row_no_pm_' + i).show();
            console.log(i);
        } else {
            $j('#row_no_pm_' + i).hide();
        }

    }

}
function search_table_na() {

    var value = $j('#search_description_field_na').val().toUpperCase();
    var rowCount = $j('#tbl_not_achived tr').length;
    var len = value.length;

    for (var i = 1; i < rowCount; i++) {
        var tbl_des = $j('#tbl_desc_na_' + i).html().substring(0, len).toUpperCase();
        if (value === tbl_des) {
            $j('#row_no_na_' + i).show();
            console.log(i);
        } else {
            $j('#row_no_na_' + i).hide();
        }

    }

}
function search_table_part() {

    var value = $j('#search_part_field').val().toUpperCase();
    var rowCounts = $j('#tbl_sold tr').length;
    var lens = value.length;


    for (var i = 1; i < rowCounts; i++) {

        var tbl_part = $j('#tbl_part_' + i).html().substring(0, lens).toUpperCase();
        if (value === tbl_part) {
            $j('#row_no_' + i).show();
        } else {
            $j('#row_no_' + i).hide();
        }

    }

}
function search_table_part_pm() {

    var value = $j('#search_part_field_pm').val().toUpperCase();
    var rowCounts = $j('#tbl_past_moving tr').length;
    var lens = value.length;


    for (var i = 1; i < rowCounts; i++) {

        var tbl_part = $j('#tbl_part_pm_' + i).html().substring(0, lens).toUpperCase();
        if (value === tbl_part) {
            $j('#row_no_pm_' + i).show();
        } else {
            $j('#row_no_pm_' + i).hide();
        }

    }

}
function search_table_part_na() {

    var value = $j('#search_part_field_na').val().toUpperCase();
    var rowCounts = $j('#tbl_not_achived tr').length;
    var lens = value.length;


    for (var i = 1; i < rowCounts; i++) {

        var tbl_part = $j('#tbl_part_na_' + i).html().substring(0, lens).toUpperCase();
        if (value === tbl_part) {
            $j('#row_no_na_' + i).show();
        } else {
            $j('#row_no_na_' + i).hide();
        }

    }

}



function get_part_description() {
    $j("#part_part_number").val('');
    $j('#item_id_by_auto_complete').val(0);

    $j("#part_description").autocomplete({
        source: "get_part_description",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            $j('#part_description').val(data.item.description);
            $j('#part_part_number').val(data.item.item_part_no);
            $j('#item_id_by_auto_complete').val(data.item.item_id);
            $j('#selling_price_auto_complete').val(data.item.selling_price);
            $j('#total_stock_qty').html(data.item.total_stock_qty);
            get_average_movements(data.item.item_id);
            $j("#required_qty").focus();

        }
    });
}
function get_part_no() {

    $j("#part_description").val('');
    $j('#item_id_by_auto_complete').val(0);
    $j("#part_part_number").autocomplete({
        source: "get_part_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            $j('#part_part_number').val(data.item.item_part_no);
            $j('#part_description').val(data.item.description);
            $j('#item_id_by_auto_complete').val(data.item.item_id);
            $j('#selling_price_auto_complete').val(data.item.selling_price);
            $j('#total_stock_qty').html(data.item.total_stock_qty);
            get_average_movements(data.item.item_id);
            $j("#required_qty").focus();


        }
    });
}
function  get_average_movements(itemID) {
    console.log()
    $j.ajax({
        url: 'get_averages?item_id=' + itemID + '&dealer_id=' + $j('#dealer_id_for_search').val() + '&rep_id=' + EMPLOYEE_ID,
        method: 'GET',
        success: function (data) {
            var avg = JSON.parse(data);
            $j("#avg_area").html(avg[0][0]['avg_area']);
            $j("#avg_dealer").html(avg[1][0]['avg_dealer']);

            console.log(avg[0][0]['avg_area']);

        }
    });

}

function changerowcolor(rowId) {
    var select_count = $j('#select_count').html();
    if ($j('#check_box_' + rowId).prop("checked") == true) {

        $j('#select_count').html(Number(select_count) + 1);
        $j('#row_no_' + rowId).css("background-color", "#CCFFFF");
    }
    else if ($j('#check_box_' + rowId).prop("checked") == false) {
        $j('#row_no_' + rowId).css("background-color", "#FFFFFF");
        $j('#select_count').html(Number(select_count) - 1);
    }

}
function changerowcolor_pm(rowId) {
    var select_count = $j('#select_count').html();
    if ($j('#check_box_pm_' + rowId).prop("checked") == true) {

        $j('#select_count').html(Number(select_count) + 1);
        $j('#row_no_pm_' + rowId).css("background-color", "#CCFFFF");
    }
    else if ($j('#check_box_pm_' + rowId).prop("checked") == false) {
        $j('#row_no_pm_' + rowId).css("background-color", "#FFFFFF");
        $j('#select_count').html(Number(select_count) - 1);
    }

}
function changerowcolor_na(rowId) {
    var select_count = $j('#select_count').html();
    if ($j('#check_box_na_' + rowId).prop("checked") == true) {

        $j('#select_count').html(Number(select_count) + 1);
        $j('#row_no_na_' + rowId).css("background-color", "#CCFFFF");
    }
    else if ($j('#check_box_na_' + rowId).prop("checked") == false) {
        $j('#row_no_na_' + rowId).css("background-color", "#FFFFFF");
        $j('#select_count').html(Number(select_count) - 1);
    }

}

function getSoldPartDetail(dealerId) {
    $j('#waiting_img').show();
    $j.ajax({
        url: 'get_sold_part_detal?dealer_id=' + dealerId,
        method: 'GET',
        success: function (data) {
            var x = JSON.parse(data);
            console.log('*******');
            console.log(x);
            x.sort(function (a, b) {
                return parseFloat(a.price) - parseFloat(b.price)
            });

            $j('#sold_table_body').empty();
            var rowcount = 1;

            jQuery.each(x, function (index, value) {
                var totalsales_stocklost = Number(this['Total_Sales_for_last_30days']) + Number(this['Stocklostsales']);
                var averageDailyDemand = Number(totalsales_stocklost / 30).toFixed(2);
                var sugess = Number(averageDailyDemand * 10) - Number(this['Available_Stocks_at_the_Dealer']);
                var suggested_qty = Number(sugess).toFixed(2);
                var one_year_target = Number(this['one_year_requirment']);
                var avg_one_year = Number(one_year_target / 12).toFixed(2);
                var day30poreqirment = Number(this['30dayporequirment']);
                var day30allsell = Number(this['30dayallsales']);
                var unsupplied = Number(day30poreqirment - day30allsell).toFixed(2);

                $j('#sold_table_body').append(
                        '<tr id="row_no_' + rowcount + '">'
                        + '<td style="width:5px"><input  type="checkbox" id="check_box_' + rowcount + '" onclick="changerowcolor(' + rowcount + ')"></>'
                        + '</td> '
                        + '<input id="item_id_so_' + rowcount + '"type="hidden" value="' + this['ITEMID'] + '"></><input type="hidden" id="retail_price_' + rowcount + '"value="' + this['selling_price'] + '"></>'
                        + '<td style="text-align:Left" id="tbl_part_' + rowcount + '">' + this['Part_Number']
                        + '</td>'
                        + '<td style="text-align:Left" id="tbl_desc_' + rowcount + '">' + this['Description']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px" >' + this['Available_Stocks_at_the_Dealer']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px" >' + this['avg_monthly_sale']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px" >' + this['Total_Sales_for_last_30days']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px" >' + this['Stocklostsales']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px" >' + this['Valuelostsales']
                        + '</td>'
//                        + '<td style="width: 5%" >' + this['AverageDailyDemand']
//                        + '</td>'
                        + '<td style="text-align:center;width: 10px" >' + averageDailyDemand
                        + '</td>'
                        + '<td style="text-align:center;width: 10px" >' + 10//this['Daysbetweenorders']
                        + '</td>'
                        + '<td id="suggest_qty_' + rowcount + '"style="text-align:center;width: 10px">' + suggested_qty
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + this['oneweektotalsales']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + this['Available_Stocks_at_VSD']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + unsupplied
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + this['movement_in_area_per_month']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + this['Days_since_Last_Invoice_Date']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + this['Days_since_Last_PO_Date']
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + avg_one_year
                        + '</td>'
                        + '<td style="text-align:center;width: 10px">' + Number(day30allsell).toFixed(2)
                        + '</td>'
                        + '</tr>'





                        );
                rowcount++;

            });
            // $j('#tbl_sold').tablesorter();

            $j('#waiting_img').hide();
            pass_table('tbl_sold', 'suggest');
        }



    });
}
function getPastMovePartsDetail(dealer_id) {
    $j.ajax({
        url: 'get_past_moving_part?dealer_id=' + dealer_id,
        method: 'GET',
        success: function (data) {
            var x = JSON.parse(data);
            console.log(x);
            $j('#past_moving_table_body').empty();
            var rowcount = 1;

            jQuery.each(x, function (index, value) {

                $j('#past_moving_table_body').append(
                        '<tr id="row_no_pm_' + rowcount + '">'
                        + '<td style="width:3%"><input type="checkbox" id="check_box_pm_' + rowcount + '" onclick="changerowcolor_pm(' + rowcount + ')"></>'
                        + '</td> '
                        + '<input id="item_id_pm_' + rowcount + '"type="hidden" value="' + this['item_id'] + '"></><input type="hidden" id="retail_price_pm_' + rowcount + '"value="' + this['selling_price'] + '"></>'
                        + '<td  id="tbl_part_pm_' + rowcount + '">' + this['item_part_no']
                        + '</td>'
                        + '<td style="" id="tbl_desc_pm_' + rowcount + '">' + this['description']
                        + '</td>'
                        + '<td  style="width: 15px;text-align:right" id="tbl_qty_pm_' + rowcount + '" style="text-align:right">' + this['quantity']
                        + '</td>'

                        + '</tr>'

                        );
                rowcount++;

            });


        }



    });

}
function  getNotAchivedPartsDetail(dealer_id) {
    $j.ajax({
        url: 'get_not_achived?so_id=' + EMPLOYEE_ID,
        method: 'GET',
        success: function (data) {
            var x = JSON.parse(data);

            $j('#not_achived_table_body').empty();
            var rowcount = 1;

            jQuery.each(x, function (index, value) {
                console.log(this['item_id']);

                $j('#not_achived_table_body').append(
                        '<tr id="row_no_na_' + rowcount + '">'
                        + '<td style="width:3%" ><input type="checkbox" id="check_box_na_' + rowcount + '" onclick="changerowcolor_na(' + rowcount + ')" ></>'
                        + '</td> '
                        + '<input id="item_id_na_' + rowcount + '"type="hidden" value="' + this['item_id'] + '"></><input type="hidden" id="retail_price_na_' + rowcount + '"value="' + this['selling_price'] + '"></>'
                        + '<td  id="tbl_part_na_' + rowcount + '">' + this['item_part_no']
                        + '</td>'
                        + '<td  id="tbl_desc_na_' + rowcount + '">' + this['description']
                        + '</td>'
                        + '<td style="width: 10px;text-align:center" id="tbl_min_qty_na_' + rowcount + '" >' + this['total_minimum_qty']
                        + '</td>'
                        + '<td style="width: 10px;text-align:center" id="tbl_ad_qty_na_' + rowcount + '" >' + this['total_additional_qty']
                        + '</td>'
                        + '<td style="width: 10px;text-align:center" id="tbl_tot_tar_na_' + rowcount + '" >' + this['total_target']
                        + '</td>'
                        + '<td style="width: 10px;text-align:center" id="tbl_actual_tar_na_' + rowcount + '" >' + this['actual_qty']
                        + '</td>'

                        + '</tr>'

                        );
                rowcount++;

            });


        }



    });
}
function addToOrder(qtys) {
    var num = /[^0-9]/g;
    var str = $j('#' + qtys).val();
    var dealer_id = $j('#dealer_id_for_search').val();

    if (dealer_id !== "") {
        if (num.test(str) || str === "") {
            $j("<div style='height:20px;color:red'>Please Enter Valied Qty...<div>").dialog({
                modal: true,
                title: 'Error',
                buttons: {
                    Ok: function () {
                        $j(this).dialog("close");

                    }
                }
            });

        } else {
            //--------------------------------------------Sold Parts-------------------------------------------
            var rowCounts = $j('#tbl_sold tr').length;
            for (var i = 1; i < rowCounts; i++) {
                var selling_price = Number($j('#retail_price_' + i).val());
                var vat_p = Number($j('#value_amount').val());
                var vat_amount = selling_price * vat_p / 100;
                var show_selling_price_with_vat = Number($j('#retail_price_' + i).val()) + vat_amount;


                if ($j('#check_box_' + i).prop("checked") == true) {
                    var result = check_duplicate_parts($j('#item_id_so_' + i).val(), str, $j('#tbl_part_' + i).html());

                    var arr = result.split('_');
                    if (arr[0] == 'false') {
                        $j('#pur_order_table').append(
                                '<tr id="row_no_add_' + row_tr_no + '">'
                                + '<td id="part_no_po_' + row_tr_no + '">' + $j('#tbl_part_' + i).html()
                                + '</td>'
                                + '<td>' + $j('#tbl_desc_' + i).html()
                                + '<input type="hidden" id="item_id_' + row_tr_no + '" name="item_id_' + row_tr_no + '" value="' + $j('#item_id_so_' + i).val() + '"></>'
                                + '<input type="hidden" id="unit_price_' + row_tr_no + '" name="unit_price_' + row_tr_no + '" value="' + $j('#retail_price_' + i).val() + '"></></td>'
                                + '<td style="text-align:right" id="selling_pri_' + row_tr_no + '" name="selling_pri_' + row_tr_no + '">' + Number(show_selling_price_with_vat).toFixed(2)
                                + '</td>'
                                + '<td style="text-align:right">'
                                + '</td>'
                                + '<td style="text-align:right"><input type="text"style="text-align:right" id="qty_field_' + row_tr_no + '" name="qty_field_' + row_tr_no + '" onkeyup="calculate();" value="' + str + '"></>'
                                + '</td>'
                                + '<td style="text-align:right"><input type="button" id="remove_button_' + i + '" value="-" style="background-color:#c1bbba" onclick="remove_button(' + row_tr_no + ')"></>'
                                + '</td>'
                                + '</tr>'

                                );

                        row_tr_no++;
                    }
                    $j('#check_box_' + i).prop('checked', false);
                    changerowcolor(i);

                }
                else if ($j('#check_box_' + i).prop("checked") === false) {

                }


            }
            //-------------------------Fast Moving--------------------------------
            var rowCounts_pm = $j('#tbl_past_moving tr').length;
            for (var i = 1; i < rowCounts_pm; i++) {
                var selling_price = Number($j('#retail_price_pm_' + i).val());
                var vat_p = Number($j('#value_amount').val());
                var vat_amount = selling_price * vat_p / 100;
                var show_selling_price_with_vat = Number($j('#retail_price_pm_' + i).val()) + vat_amount;


                if ($j('#check_box_pm_' + i).prop("checked") == true) {
                    var result = check_duplicate_parts($j('#item_id_pm_' + i).val(), str, $j('#tbl_part_pm_' + i).html());
                    console.log(result);
                    var arr = result.split('_');
                    if (arr[0] == 'false') {

                        $j('#pur_order_table').append(
                                '<tr id="row_no_add_' + row_tr_no + '">'
                                + '<td id="part_no_po_' + row_tr_no + '">' + $j('#tbl_part_pm_' + i).html()
                                + '</td>'
                                + '<td>' + $j('#tbl_desc_pm_' + i).html()
                                + '<input type="hidden" id="item_id_' + row_tr_no + '" name="item_id_' + row_tr_no + '" value="' + $j('#item_id_pm_' + i).val() + '"></>'
                                + '<input type="hidden" id="unit_price_' + row_tr_no + '" name="unit_price_' + row_tr_no + '" value="' + $j('#retail_price_pm_' + i).val() + '"></></td>'
                                + '<td style="text-align:right" id="selling_pri_' + row_tr_no + '" name="selling_pri_' + row_tr_no + '">' + Number(show_selling_price_with_vat).toFixed(2)
                                + '</td>'
                                + '<td style="text-align:right">'
                                + '</td>'
                                + '<td style="text-align:right"><input type="text"style="text-align:right" id="qty_field_' + row_tr_no + '" name="qty_field_' + row_tr_no + '" onkeyup="calculate();" value="' + str + '"></>'
                                + '</td>'
                                + '<td style="text-align:right"><input type="button" id="remove_button_' + i + '" value="-" style="background-color:#c1bbba" onclick="remove_button(' + row_tr_no + ')"></>'
                                + '</td>'
                                + '</tr>'

                                );
                        console.log(i);

                        row_tr_no++;
                    }
                    $j('#check_box_pm_' + i).prop('checked', false);
                    changerowcolor_pm(i);

                }
                else if ($j('#check_box_pm_' + i).prop("checked") === false) {

                }


            }
            //------------------------Not Achiviement--------------
            var rowCounts_na = $j('#tbl_not_achived tr').length;
            for (var i = 1; i < rowCounts_na; i++) {
                var selling_price = Number($j('#retail_price_na_' + i).val());
                var vat_p = Number($j('#value_amount').val());
                var vat_amount = selling_price * vat_p / 100;
                var show_selling_price_with_vat = Number($j('#retail_price_na_' + i).val()) + vat_amount;


                if ($j('#check_box_na_' + i).prop("checked") == true) {
                    var result = check_duplicate_parts($j('#item_id_na_' + i).val(), str, $j('#tbl_part_na_' + i).html());
                    console.log(result);
                    var arr = result.split('_');
                    if (arr[0] == 'false') {
                        console.log(arr[0]);
                        $j('#pur_order_table').append(
                                '<tr id="row_no_add_' + row_tr_no + '">'
                                + '<td id="part_no_po_' + row_tr_no + '">' + $j('#tbl_part_na_' + i).html()
                                + '</td>'
                                + '<td>' + $j('#tbl_desc_na_' + i).html()
                                + '<input type="hidden" id="item_id_' + row_tr_no + '" name="item_id_' + row_tr_no + '" value="' + $j('#item_id_na_' + i).val() + '"></>'
                                + '<input type="hidden" id="unit_price_' + row_tr_no + '" name="unit_price_' + row_tr_no + '" value="' + $j('#retail_price_na_' + i).val() + '"></></td>'
                                + '<td style="text-align:right" id="selling_pri_' + row_tr_no + '" name="selling_pri_' + row_tr_no + '">' + Number(show_selling_price_with_vat).toFixed(2)
                                + '</td>'
                                + '<td style="text-align:right">'
                                + '</td>'
                                + '<td style="text-align:right"><input type="text"style="text-align:right" id="qty_field_' + row_tr_no + '" onkeyup="calculate();" name="qty_field_' + row_tr_no + '" value="' + str + '"></>'
                                + '</td>'
                                + '<td style="text-align:right"><input type="button" id="remove_button_' + i + '" value="-" style="background-color:#c1bbba" onclick="remove_button(' + row_tr_no + ')"></>'
                                + '</td>'
                                + '</tr>'

                                );

                        row_tr_no++;
                    }
                    $j('#check_box_na_' + i).prop('checked', false);
                    changerowcolor_na(i);

                }
                else if ($j('#check_box_pm_' + i).prop("checked") === false) {

                }


            }
            //-----------------------------New Parts------------------------------
            var item_id = $j('#item_id_by_auto_complete').val();
            if (item_id == 0) {

            } else {
                var selling_price = Number($j('#selling_price_auto_complete').val());
                var vat_p = Number($j('#value_amount').val());
                var vat_amount = selling_price * vat_p / 100;
                var show_selling_price_with_vat = Number($j('#selling_price_auto_complete').val()) + vat_amount;
                var result = check_duplicate_parts(item_id, str, $j('#part_part_number').val());
                var arr = result.split('_');
                if (arr[0] == 'false') {
                    console.log(arr[0]);
                    $j('#pur_order_table').append(
                            '<tr id="row_no_add_' + row_tr_no + '">'
                            + '<td id="part_no_po_' + row_tr_no + '">' + $j('#part_part_number').val()
                            + '</td>'
                            + '<td>' + $j('#part_description').val()
                            + '<input type="hidden" id="item_id_' + row_tr_no + '" name="item_id_' + row_tr_no + '" value="' + item_id + '"></>'
                            + '<input type="hidden" id="unit_price_' + row_tr_no + '" name="unit_price_' + row_tr_no + '" value="' + $j('#selling_price_auto_complete').val() + '"></></td>'
                            + '<td style="text-align:right" >' + Number(show_selling_price_with_vat).toFixed(2)
                            + '</td>'
                            + '<td style="text-align:right">' + $j('#avg_dealer').html()
                            + '</td>'
                            + '<td style="text-align:right"><input type="text" id="qty_field_' + row_tr_no + '" name="qty_field_' + row_tr_no + '" style="text-align:right" onkeyup="calculate();" value="' + str + '"></>'
                            + '</td>'
                            + '<td style="text-align:right"><input type="button"  value="-" style="background-color:#c1bbba" onclick="remove_button(' + row_tr_no + ')"></>'
                            + '</td>'
                            + '</tr>'

                            );
                    row_tr_no++;
                }
            }
            calculate();
            $j('#' + qtys).val('');
            $j('#part_description').val('');
            $j('#part_part_number').val('');
            $j('#item_id_by_auto_complete').val('');
            $j('#total_stock_qty').html('');
            $j("#avg_area").html('');
            $j("#avg_dealer").html('');
            checkRowCount();
            $j('#select_count').html('0');

        }
    } else {
        $j("<div style='height:20px;color:red'>Please Select Dealer..<div>").dialog({
            modal: true,
            title: 'Error',
            buttons: {
                Ok: function () {
                    $j(this).dialog("close");
                    $j('#dealer_name_field').focus();

                }

            }
        });
    }

}
function check_duplicate_parts(partid, qty, partno) {

    var truefalse = false;
    var elm_id = 0;
    $j('#pur_order_table tr').each(function () {

        var row = jQuery(this).closest('tr').attr('id');

        var strs = row.split("_");
        var new_id = strs[3];
        console.log($j('#part_no_po_' + new_id).html());
//        console.log($j('#item_id_' + new_id))
//        console.log('---------------');

//        console.log('partid' + partid);
//        console.log('newpartid' + $j('#item_id_' + new_id).val());
        var new_part_id = $j('#part_no_po_' + new_id).html();
        if (partno == new_part_id) {
            truefalse = true;
            elm_id = new_id;
            var newqty = Number($j('#qty_field_' + new_id).val()) + Number(qty);

            $j('<div> <table width="100%" align="center">'
                    + '<td colspan="2" style="text-align:center;color:Green;font-size:15px"> Already ' + $j('#qty_field_' + new_id).val() + ' qty exist in ' + partno
                    + '</td>'
                    + '</tr>'
                    + '<tr>'
                    + '<td colspan="2"" style="text-align:center;color:Green;font-size:15px"> Do you want to INCREASE qty?'
                    + '</td>'
                    + '<tr style="height:10px"></tr>'
                    + '<tr>'
                    + '<td colspan="2" align="center"><input type="text" value="' + newqty + '" style="width:100px;text-align:center;font-size:15px;color:black"></>'
                    + '</td>'
                    + '</tr>'
                    + '</table>'
                    + '</>').dialog({
                modal: true,
                title: 'Update Qty',
                zIndex: 10000,
                autoOpen: true,
                width: '250',
                resizable: false,
                buttons: {
                    Yes: function () {
                        $j($j('#qty_field_' + new_id).val(newqty));
                        $j(this).dialog("close");

                    },
                    No: function () {
                        $j(this).dialog("close");
                    }
                },
                close: function (event, ui) {
                    $j(this).remove();
                }
            });
        }
    });
    return truefalse + '_' + elm_id;

}

function remove_button(x) {
    $j('#row_no_add_' + x).remove();
    calculate();
    checkRowCount();


}
function calculate() {
    var total = 0;
    for (var k = 1; k < row_tr_no; k++) {
        if ($j('#qty_field_' + k).val() === undefined) {

        } else {
            var req_qty = $j('#qty_field_' + k).val();
            var selling_price = $j('#unit_price_' + k).val();
            total += Number(req_qty) * Number(selling_price);


        }


    }
    var discount_percentage = $j('#dealer_discount').val();
    var discount_amount = total * discount_percentage / 100;
    $j('#total_discount_amount').val(discount_amount);
    var vat_amount = $j('#value_amount').val();
    var tot_vat_amount = total * vat_amount / 100;
    //alert(vat_amount);
    // $j('#tot_amount_with_discount').val(Number(total - discount_amount).toFixed(2));

    if (row_tr_no < 2) {
        vat_amount = 0;
    }
    $j('#tot_amount_with_vat').val(Number(total - discount_amount + tot_vat_amount).toFixed(2));

    //alert(total-discount_amount);

}
function checkRowCount() {
    var newrowCount = $j('#pur_order_table tr').length;
    if (newrowCount > 0) {
        // $j("#done_button_pur").attr("visibility", "visible");
        $j('#done_button_pur').css('visibility', 'visible');
        $j('#save_button').css('visibility', 'visible');
    } else {
        $j('#done_button_pur').css('visibility', 'hidden');
        $j('#save_button').css('visibility', 'hidden');
    }
}
function add_purchase_order(submit_type) {
    var newrowCount = $j('#pur_order_table tr').length;
    if (newrowCount > 0) {


        var tot = $j('#tot_amount_with_vat').val();
        var credit_limit = $j('#credit_limit').val();
        var deb_amount = $j('#deb_amount').val();
        var out_standing = $j('#out_standing').val();

        if (Number(tot) > Number(deb_amount)) {
            alert_type('Total amount is more than overdue amount..', submit_type);
        } else if (Number(tot) > Number(out_standing)) {
            alert_type('Total amount is more than outstanding..', submit_type);
        } else if (Number(tot) > Number(credit_limit)) {
            alert_type('Total amount is more than credit limit..', submit_type);
        } else {
            done_order_function(submit_type);
        }
    } else {
        $j("<div class='alert-box warning'><span>This is empty Order... </span ></div>").dialog({
            modal: true,
            title: 'warning',
            buttons: {
                Ok: function () {
                    $j(this).dialog("close");

                }
            }
        });
    }

}
function alert_type(type, submit_type) {
    $j("<div class='alert-box warning'><span>" + type + " </span ></div>").dialog({
        modal: true,
        title: 'warning',
        buttons: {
            Ok: function () {
                $j(this).dialog("close");
                done_order_function(submit_type);
            }
        }
    });

}
function done_order_function(submit_type) {
    var typ = '';
    if (submit_type == 1) {
        typ = 'Send';
    } else {
        typ = 'Save';
    }
    $j("<div> Are you sure you want to " + typ + " this order ?</>").dialog({
        modal: true,
        title: 'Done New Purchase Order',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {
                //$j(obj).removeAttr('onclick');                                
                $j(this).dialog("close");
                var new_row_count = row_tr_no - 1;
                var amount = $j('#tot_amount_with_vat').val();
                var whitout_vat = $j('#tot_amount_with_discount').val();
                $j.post("add_purchse_order?sales_officer_id=" + EMPLOYEE_ID + "&rowcount=" + new_row_count + "&amount=" + amount + "&submit_type=" + submit_type, $j("#pur_form").serialize(), function () {//callback function
                    // $(this).parents('.Parent').remove();
                    //$j(this).remove();
                    $j("<div style='height:20px'>Completed<div>").dialog({
                        modal: true,
                        buttons: {
                            Ok: function () {
                                $j(this).dialog("close");
                                location.reload();
                            }
                        }
                    });
                });

                // $(this).dialog("open");
            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}
function getDeb(dea) {
    $j.ajax({
        url: 'getdeb?dealer_id=' + dea,
        method: 'GET',
        success: function (data) {
            var tot_deb = JSON.parse(data);
            $j('#deb_amount').html(Number(tot_deb).toFixed(2));

        }

    });
}
function get_outstanding_amount(dealer_id) {
    $j.ajax({
        url: 'get_outstanding_amount?dealer_id=' + dealer_id,
        method: 'GET',
        success: function (data) {
            var outsta = JSON.parse(data);
            $j('#out_standing').html(Number(outsta[0]['total_due_amount']).toFixed(2));

        }

    });
}
//-------------------------Manage Purchase Order--------------------------------

function get_dealer_shop() {
    $j('#dealer_account_no_manage').val('');
    $j('#dealer_id_manage').val('');
    $j("#shop_name").autocomplete({
        source: "get_dealer_shop_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {

            $j('#dealer_account_no_manage').val(data.item.delar_account_no);
            $j('#dealer_id_manage').val(data.item.delar_id);


        }
    });
}
function get_shop_account_no() {
    $j('#shop_name').val('');
    $j('#dealer_id_manage').val('');
    $j("#dealer_account_no_manage").autocomplete({
        source: "get_dealer_account_number",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            $j('#shop_name').val(data.item.delar_shop_name);
            $j('#dealer_id_manage').val(data.item.delar_id);


        }
    });
}
function get_purchase_order(search_type) {

    $j('#ajax_lod').show();
    var dealer_id = $j('#dealer_id_manage').val();
    var first_date = $j('#from_date').val();
    var second_date = $j('#to_date').val();
    $j.ajax({
        url: 'get_purchaseorder_sales_officer_wise?search_type=' + search_type + '&dealer_id=' + dealer_id + '&first_date=' + first_date + '&second_date=' + second_date,
        method: 'GET',
        success: function (data) {
            var purchase_order = JSON.parse(data);
            var array_count = purchase_order.length;
//            console.log(purchase_order);
            $j.ajax({
                url: 'get_kit',
                method: 'GET',
                success: function (data){
               
                    var kit = JSON.parse(data);
                    var kit_count = kit.length;


                    $j('#assign_purchase_order_body').empty();
                    $j('#dealer_pending_purchase_order_body').empty();
                    $j('#dimo_pending_purchase_order_body').empty();
                    $j('#dimo_accept_purchase_order_body').empty();
                    $j('#rejected_purchase_order_body').empty();
                    $j('#saved_purchase_order_body').empty();


                    for (var l = 0; l < kit_count; l++) {
                        var a = kit[l]['qty_per_month']
                        var b = kit[l]['qty']
                        var c = a - b;
                        $j('#assign_purchase_order_body').append(
                                '<tr>'
                                + '<td>'
                                + kit[l]['promotion_name'] +' - ('+ kit[l]['promotion_type']+')  '
                                + '</td>'
                                + '<td>'
                                + kit[l]['description']
                                + '</td>'
                                + '<td>'
                                + kit[l]['end_date']
                                + '</td>'
                                + '<td>'
                                + c
                                + '</td>'
                                + '<td style="text-align: center">'
                                + '<a style="text-decoration: none;" href="drawIndexOrderKitPromotion?k=0&promotion_id=' + kit[l]['special_promotion_id'] + '&spType='+kit[l]['promotion_type']+'">'
                                + '<img style="width:20px;height:20px;cursor: pointer"  src=' + URL + 'public/images/view.png></>'

                                + '</td>'

                                + '</tr>'

                                );

                    }
                    for (var i = 0; i < array_count; i++) {
                        var assign;
                        var color;
                        var who_create;
                        if (purchase_order[i]['complete'] == 0) {

                            if (purchase_order[i]['is_sales_officer'] == 0) {
                                who_create = "Dealer";
                                if (purchase_order[i]['assigned'] == 1) {
                                    assign = '&#10004';
                                    color = 'green';
                                } else {
                                    assign = '&#10007';
                                    color = 'red';
                                }
//                                $j('#assign_purchase_order_body').append(
//                                        '<tr>'
//                                        + '<td>'
//                                        + purchase_order[i]['purchase_order_number']
//                                        + '</td>'
//                                        + '<td>'
//                                        + purchase_order[i]['delar_account_no']
//                                        + '</td>'
//                                        + '<td>'
//                                        + purchase_order[i]['delar_shop_name']
//                                        + '</td>'
//                                        + '<td>'
//                                        + purchase_order[i]['date']
//                                        + '</td>'
//                                        + '<td>'
//                                        + purchase_order[i]['time']
//                                        + '</td>'
//                                        + '<td style="text-align:right">'
//                                        + Number(purchase_order[i]['total_discount']).toFixed(2)
//                                        + '</td>'
//                                        + '<td style="text-align:right" id="amount_id_' + purchase_order[i]['purchase_order_id'] + '">'
//                                        + Number(purchase_order[i]['amount']).toFixed(2)
//                                        + '</td><input type="hidden" id="dis_per_' + purchase_order[i]['purchase_order_id'] + '" value="' + purchase_order[i]['discount_percentage'] + '"></><input type="hidden" id="cur_val_' + purchase_order[i]['purchase_order_id'] + '" value="' + purchase_order[i]['current_vat'] + '"></>'
//                                        + '<td style="text-align:center;color:' + color + '" id="apo_' + purchase_order[i]['purchase_order_id'] + '">'
//                                        + assign
//                                        + '</td>'
//                                        + '<td style="text-align:center;color:' + color + '">'
//                                        + '<img style="width:20px;height:20px;cursor: pointer" id="assign_butt_' + purchase_order[i]['purchase_order_id'] + '" onclick="view_purchase_order(' + purchase_order[i]['purchase_order_id'] + ',1,' + purchase_order[i]['assigned'] + ',' + purchase_order[i]['amount'] + ',' + purchase_order[i]['discount_percentage'] + ',' + purchase_order[i]['current_vat'] + ');"  src=' + URL + 'images/view_s.png></>'
//                                        + '</td>'
//
//                                        + '</tr>'
//
//                                        );

                            } else {
                                if (purchase_order[i]['assigned'] == 1) {
                                    assign = '&#10004';
                                    color = 'green';
                                } else {
                                    assign = '&#10007';
                                    color = 'red';
                                }
                                who_create = "Me";
                            }
                            //-----------------------Dimo Pending Table---------------------
                            $j('#dimo_pending_purchase_order_body').append(
                                    '<tr>'
                                    + '<td>'
                                    + purchase_order[i]['purchase_order_number']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_account_no']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_shop_name']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['date']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['time']
                                    + '</td>'
                                    + '<td style="text-align:right">'
                                    + Number(purchase_order[i]['total_discount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:right">'
                                    + Number(purchase_order[i]['amount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:center;font-weight:bold">'
                                    + who_create
                                    + '</td>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + assign
                                    + '</td>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + '<img style="width:20px;height:20px;cursor: pointer" onclick="view_purchase_order(' + purchase_order[i]['purchase_order_id'] + ',3,' + purchase_order[i]['assigned'] + ',' + purchase_order[i]['amount'] + ',' + purchase_order[i]['discount_percentage'] + ',' + purchase_order[i]['current_vat'] + ');" src=' + URL + 'images/view_s.png></>'
                                    + '</td>'

                                    + '</tr>'

                                    );

                        } else if (purchase_order[i]['complete'] == 3) {
                            var reasn = 0;
                            if(purchase_order[i]['reason'] == '-'){
                                reasn = 0;
                            }else{
                                reasn = purchase_order[i]['reason'];
                            }
                            
                            
                            $j('#dealer_pending_purchase_order_body').append(
                                    '<tr id="dealer_pending_po_' + purchase_order[i]['purchase_order_id'] + '">'
//                            + '<td>'
//                            + purchase_order[i]['purchase_order_id']
//                            + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_account_no']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_shop_name']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['date']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['time']
                                    + '</td>'
                                    + '<td style="text-align:right" id="total_dis_' + purchase_order[i]['purchase_order_id'] + '">'
                                    + Number(purchase_order[i]['total_discount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:right" id="amount_id_' + purchase_order[i]['purchase_order_id'] + '">'
                                    + Number(purchase_order[i]['amount']).toFixed(2)
                                    + '</td><input type="hidden" id="dis_per_' + purchase_order[i]['purchase_order_id'] + '" value="' + purchase_order[i]['discount_percentage'] + '"></><input type="hidden" id="cur_val_' + purchase_order[i]['purchase_order_id'] + '" value="' + purchase_order[i]['current_vat'] + '"></><input type="hidden" id="assign_text_' + purchase_order[i]['assigned'] + '" value="' + purchase_order[i]['assigned'] + '"></>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + '<img style="width:20px;height:20px;cursor: pointer" id="dealer_pending_view_btn_' + purchase_order[i]['purchase_order_id'] + '" onclick="view_purchase_order(' + purchase_order[i]['purchase_order_id'] + ',2,' + purchase_order[i]['assigned'] + ',' + purchase_order[i]['amount'] + ',' + purchase_order[i]['discount_percentage'] + ',' + purchase_order[i]['current_vat'] + ',' + reasn + ');" src=' + URL + 'images/view_s.png></>'
                                    + '</td>'
                                    + '</tr>'

                                    );

                            //--------------------Saved Order-----------------//
                        } else if (purchase_order[i]['complete'] == 5) {
                            $j('#saved_purchase_order_body').append(
                                    '<tr id="saved_po_' + purchase_order[i]['purchase_order_id'] + '">'
//                            + '<td>'
//                            + purchase_order[i]['purchase_order_id']
//                            + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_account_no']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_shop_name']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['date']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['time']
                                    + '</td>'
                                    + '<td style="text-align:right" id="total_dis_' + purchase_order[i]['purchase_order_id'] + '">'
                                    + Number(purchase_order[i]['total_discount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:right" id="amount_id_' + purchase_order[i]['purchase_order_id'] + '">'
                                    + Number(purchase_order[i]['amount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + '<img style="width:20px;height:20px;cursor: pointer" onclick="view_purchase_order(' + purchase_order[i]['purchase_order_id'] + ',5,' + purchase_order[i]['assigned'] + ',' + purchase_order[i]['amount'] + ',' + purchase_order[i]['discount_percentage'] + ',' + purchase_order[i]['current_vat'] + ');" src=' + URL + 'images/view_s.png></>'
                                    + '</td>'
                                    + '</tr>'

                                    );

                        }
                        else if (purchase_order[i]['complete'] == 1) {
                            if (purchase_order[i]['assigned'] == 1) {
                                assign = '&#10004';
                                color = 'green';
                                alert(purchase_order[i]['assigned']);
                            } else {
                                assign = '&#10007';
                                color = 'red';
                            }
                            if (purchase_order[i]['is_sales_officer'] == 0) {
                                who_create = "Dealer";

                            } else {
                                who_create = "Me";
                            }
                            //-----------------------Dimo Accepted Table---------------------
                            $j('#dimo_accept_purchase_order_body').append(
                                    '<tr>'
                                    + '<td>'
                                    + purchase_order[i]['purchase_order_number']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_account_no']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_shop_name']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['date']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['time']
                                    + '</td>'
                                    + '<td style="text-align:right">'
                                    + Number(purchase_order[i]['total_discount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:right">'
                                    + Number(purchase_order[i]['amount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:center;font-weight:bold">'
                                    + who_create
                                    + '</td>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + assign
                                    + '</td>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + '<img style="width:20px;height:20px;cursor: pointer" onclick="view_purchase_order(' + purchase_order[i]['purchase_order_id'] + ',4,' + purchase_order[i]['assigned'] + ',' + purchase_order[i]['amount'] + ',' + purchase_order[i]['discount_percentage'] + ',' + purchase_order[i]['current_vat'] + ');" src=' + URL + 'images/view_s.png ></>'
                                    + '</td>'

                                    + '</tr>'

                                    );

                        } else if (purchase_order[i]['complete'] == 4) {
                            if (purchase_order[i]['assigned'] == 1) {
                                assign = '&#10004';
                                color = 'green';
                                alert(purchase_order[i]['assigned']);
                            } else {
                                assign = '&#10007';
                                color = 'red';
                            }
                            if (purchase_order[i]['is_sales_officer'] == 0) {
                                who_create = "Dealer";

                            } else {
                                who_create = "Me";
                            }
                            //-----------------------Dimo Rejected Table---------------------
                            $j('#rejected_purchase_order_body').append(
                                    '<tr>'
//                            + '<td>'
//                            + purchase_order[i]['purchase_order_number']
//                            + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_account_no']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['delar_shop_name']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['date']
                                    + '</td>'
                                    + '<td>'
                                    + purchase_order[i]['time']
                                    + '</td>'
                                    + '<td style="text-align:right">'
                                    + Number(purchase_order[i]['total_discount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:right">'
                                    + Number(purchase_order[i]['amount']).toFixed(2)
                                    + '</td>'
                                    + '<td style="text-align:right"><textarea readonly>'
                                    + purchase_order[i]['reason']
                                    + '</textarea></td>'
                                    + '<td style="text-align:center;font-weight:bold">'
                                    + who_create
                                    + '</td>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + assign
                                    + '</td>'
                                    + '<td style="text-align:center;color:' + color + '">'
                                    + '<img style="width:20px;height:20px;cursor: pointer" onclick="view_purchase_order(' + purchase_order[i]['purchase_order_id'] + ',4,' + purchase_order[i]['assigned'] + ',' + purchase_order[i]['amount'] + ',' + purchase_order[i]['discount_percentage'] + ',' + purchase_order[i]['current_vat'] + ');" src=' + URL + 'images/view_s.png ></>'
                                    + '</td>'

                                    + '</tr>'

                                    );
                        }
                    }

                    $j('#ajax_lod').hide();

                    //  $j('#assign_purchase_order_table').dataTable();


                }


            });


        }


    });



}
function view_purchase_order(order_no, tab_order, assigned_type, amount, discount_per, cur_vat, kit) {
    $j.ajax({
        url: 'get_purchase_order_detail?order_id=' + order_no + '&tab_order=' + tab_order + '&assigned_type=' + assigned_type + '&amount=' + amount + '&discount_per=' + discount_per + '&cur_vat=' + cur_vat + '&kit=' + kit,
        method: 'GET',
        success: function (data) {
            $j.colorbox({
                html: '<center>' + data + '</>',
                height: "500px",
                width: "80%",
                opacity: 0.52
            });
        }
    });

}
//-------------------------Manage Order Update----------
function get_part_description_update() {

    $j("#part_part_number_update").val('');
    $j('#item_id_by_auto_complete_update').val(0);

    $j("#part_description_update").autocomplete({
        source: "get_part_description",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            $j('#part_description_update').val(data.item.description);
            $j('#part_part_number_update').val(data.item.item_part_no);
            $j('#item_id_by_auto_complete_update').val(data.item.item_id);
            $j('#selling_price_auto_update').val(data.item.selling_price);
            $j('#qty_field').focus();

        }
    });
}
function get_part_no_to_new_update() {

    $j("#part_description_update").val('');
    $j('#item_id_by_auto_complete_update').val(0);
    $j("#part_part_number_update").autocomplete({
        source: "get_part_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            $j('#part_part_number_update').val(data.item.item_part_no);
            $j('#part_description_update').val(data.item.description);
            $j('#item_id_by_auto_complete_update').val(data.item.item_id);
            $j('#selling_price_auto_update').val(data.item.selling_price);

            $j('#qty_field').focus();



        }
    });
}
function CommaFormatted(amount)
{
    var delimiter = ","; // replace comma if desired
    amount = new String(amount);
    var a = amount.split('.', 2)
    var d = a[1];
    var i = parseInt(a[0]);
    if (isNaN(i)) {
        return '';
    }
    var minus = '';
    if (i < 0) {
        minus = '-';
    }
    i = Math.abs(i);
    var n = new String(i);
    var a = [];
    while (n.length > 3)
    {
        var nn = n.substr(n.length - 3);
        a.unshift(nn);
        n = n.substr(0, n.length - 3);
    }
    if (n.length > 0) {
        a.unshift(n);
    }
    n = a.join(delimiter);
    if (d.length < 1) {
        amount = n;
    }
    else {
        amount = n + '.' + d;
    }
    amount = minus + amount;
    return amount;
}

function add_new_parts() {
    if ($j('#item_id_by_auto_complete_update').val() == "") {
        $j("<div style='height:20px;color:red'>Please Select Part..<div>").dialog({
            modal: true,
            title: 'Error',
            buttons: {
                Ok: function () {
                    $j(this).dialog("close");

                }
            }
        });
    } else {
        var num = /[^0-9]/g;
        var str = $j('#qty_field').val();
        if (num.test(str) || str === "") {
            $j("<div style='height:20px;color:red'>Please Enter Valied Qty...<div>").dialog({
                modal: true,
                title: 'Error',
                buttons: {
                    Ok: function () {
                        $j(this).dialog("close");

                    }
                }
            });

        } else {

            $j("#part_part_number_update").focus();
            $j("<div> Are you sure you want to add this part ?</>").dialog({
                modal: true,
                title: 'Add new part',
                zIndex: 10000,
                autoOpen: true,
                width: '250',
                resizable: false,
                buttons: {
                    Yes: function () {
                        //$j(obj).removeAttr('onclick');                                
                        $j(this).dialog("close");

                        var count = $j('#row_count').val();
                        var new_count = Number(count) + 1;
                        $j('#row_count').val(new_count);

                        var selling_price = Number($j('#selling_price_auto_update').val());
                        var vat_p = Number($j('#vat_de').val());
                        var vat_amount = selling_price * vat_p / 100;
                        var show_selling_price_with_vat = Number($j('#selling_price_auto_update').val()) + vat_amount;
                        var g = CommaFormatted(show_selling_price_with_vat.toFixed(2));


                        $j('#order_body').append(
                                '<tr id="update_row_' + new_count + '">'
                                + '<td>'
                                + '<input type="hidden" id="item_id_' + new_count + '" value="' + $j('#item_id_by_auto_complete_update').val() + '"></><input type="text" readonly="true" value="' + $j('#part_part_number_update').val() + '" id="update_part_no_' + new_count + '"></><input type="hidden" id="order_detail_id_' + new_count + '"></>'
                                + '</td>'
                                + '<td>'
                                + '<input type="text" readonly="true" value="' + $j('#part_description_update').val() + '" id="update_description_' + new_count + '"></>'
                                + '</td>'
                                + '<td>'
                                + '<input type="text" readonly="true" value="' + $j('#qty_field').val() + '" style="text-align:right" id="update_qty_' + new_count + '"></><input type="hidden" id="update_retail_price_' + new_count + '" value="' + $j('#selling_price_auto_update').val() + '"></>'
                                + '</td>'
                                + '<td style="text-align:right" id="show_vat_with_price_' + new_count + '">'
                                + g
                                + '</td>'
                                + '<td align="center">'
                                + '<input type="button" id="update_button_' + new_count + '"  style="background-color: gray;color: white;width: 90px"  value="Edit" onclick="edit_part(' + new_count + ')"></>'
                                + '</td>'
                                + '<td align="center">'
                                + '<input type="button" style="background-color: #ff0f14;color: white;width: 90px"  value="Remove" onclick="remove_parts(' + new_count + ');"></>'
                                + '</td>'
                                + '</tr>'

                                );
                        add_new_part_to_po(new_count);
                        var total_am = calculating_manage_order_total();

                        var po = $j('#sopoid').val();
                        $j('#amount_id_' + po).html(total_am[0]);
                        $j('#total_dis_' + po).html(total_am[1]);

                        $j('#part_part_number_update').val('');
                        $j('#part_description_update').val('');
                        $j('#qty_field').val('');
                        $j('#item_id_by_auto_complete_update').val('');
                        $j('#selling_price_auto_update').val('');
                        var pp = $j('#sopoid').val();
                        var amount = $j('#amount_id_' + pp).html();
                        var dis_per = $j('#dis_per_' + pp).val();
                        var cur_vat = $j('#cur_val_' + pp).val();
//                        if(cur_vat == '-'){
//                            cur_vat = '0';
//                        }
                        var assign_t = $j('#assign_text_' + pp).val();
                        $j("#dealer_pending_view_btn_" + pp).attr("onclick", "view_purchase_order(" + pp + "," + 2 + "," + assign_t + "," + amount + "," + dis_per + "," + 1 + ")");

                    },
                    No: function () {
                        $j(this).dialog("close");

                    }

                },
                close: function (event, ui) {
                    $j(this).remove();

                }
            });
        }
    }

}
function add_new_part_to_po(new_count) {
    $j.ajax({
        url: 'insert_new_part_to_po?order_id=' + $j('#sopoid').val() + '&item_id=' + $j('#item_id_by_auto_complete_update').val() + '&qty=' + $j('#qty_field').val() + '&selling_price=' + $j('#selling_price_auto_update').val(),
        method: 'GET',
        success: function (data) {
            var order_detail_id = JSON.parse(data);
            console.log(order_detail_id);
            $j('#order_detail_id_' + new_count).val(order_detail_id);
        }
    });
}
function remove_parts(id) {
    $j("<div> Are you sure you want to remove this part ?</>").dialog({
        modal: true,
        title: 'Remove part',
        zIndex: 10000,
        autoOpen: true,
        width: '250',
        resizable: false,
        buttons: {
            Yes: function () {
                //$j(obj).removeAttr('onclick');                                
                $j(this).dialog("close");

                var detail_id = $j('#order_detail_id_' + id).val();
                $j.ajax({
                    url: 'remove_parts?order_detail_id=' + detail_id,
                    method: 'GET',
                    success: function (data) {
                        $j('#update_row_' + id).remove();
                        var total_am = calculating_manage_order_total();
                        var po = $j('#sopoid').val();
                        $j('#amount_id_' + po).html(total_am[0]);
                        $j('#total_dis_' + po).html(total_am[1]);
                    }
                });



            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });


}
function assign_purchase_order() {
    var chek_type;
    var pp = $j('#sopoid').val();
    var amount = $j('#amount_id_' + pp).html();
    var dis_per = $j('#dis_per_' + pp).val();
    var cur_vat = $j('#cur_val_' + pp).val();


    if ($j('#check_box_select').is(':checked')) {
        chek_type = 1;
        // var assignw = '&#10004';
        var assignw = '&#10004';

        $j('#apo_' + pp).css('color', 'green');
        $j('#apo_' + pp).html(assignw);
        $j("#assign_butt_" + pp).attr("onclick", "view_purchase_order(" + pp + "," + 1 + "," + chek_type + "," + amount + "," + dis_per + "," + cur_vat + ")");

    } else {
        chek_type = 0;
        //var assignn = '&#10007';
        var assignn = '&#10007';

        $j('#apo_' + pp).css('color', 'red');
        $j('#apo_' + pp).html(assignn);
        //$j("#assign_butt_" + pp).attr("onclick", "view_purchase_order(" + pp + "," + 1 + "," + chek_type + ")");
        $j("#assign_butt_" + pp).attr("onclick", "view_purchase_order(" + pp + "," + 1 + "," + chek_type + "," + amount + "," + dis_per + "," + cur_vat + ")");
    }


    $j.ajax({
        url: 'set_assign_po?chek_type=' + chek_type + '&po=' + $j('#sopoid').val(),
        method: 'GET',
        success: function (data) {

        }
    });

}
function check_event(e, qts) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {

        addToOrder(qts);
        $j("#part_part_number").focus();
    }


}
function check_event_dealer_selected(e) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {

        $j("#part_part_number").focus();
    }


}
function check_event_update(e) {
    e.which = e.which || e.keyCode;
    if (e.which == 13) {
        add_new_parts();
        //$j("#part_part_number_update").focus();
    }


}
function edit_part(id) {
    $j('#update_part_no_' + id).removeAttr("readonly");
    ;
    $j('#update_part_no_' + id).css("border-color", " red");
    ;

    $j('#update_description_' + id).removeAttr("readonly");
    ;
    $j('#update_description_' + id).css("border-color", " red");
    ;

    $j('#update_qty_' + id).removeAttr("readonly");
    ;
    $j('#update_qty_' + id).css("border-color", " red");
    ;
    $j('#update_button_' + id).attr('value', 'Save');

    $j('#update_part_no_' + id).attr("onkeypress", "get_part_no_update(" + id + ")");
    $j('#update_description_' + id).attr("onkeypress", "get_description_update(" + id + ")");
    //$j('#update_qty_' + id).attr("onkeyup", "calculating_manage_order_total()");

    $j('#update_button_' + id).attr("onclick", "save_edited_part(" + id + ")");
    $j('#update_button_' + id).css("background-color", "white");
    $j('#update_button_' + id).css("color", "green");
}

function get_part_no_update(ids) {
    $j('#update_part_no_' + ids).autocomplete({
        source: "get_part_no",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            var selling_price = Number(data.item.selling_price);
            var vat_p = Number($j('#vat_de').val());
            var vat_amount = selling_price * vat_p / 100;
            var show_selling_price_with_vat = Number(data.item.selling_price) + vat_amount;
            $j('#update_part_no_' + ids).val(data.item.item_part_no);
            $j('#update_description_' + ids).val(data.item.description);
            $j('#item_id_' + ids).val(data.item.item_id);
            $j('#update_retail_price_' + ids).val(data.item.selling_price);
            $j('#show_vat_with_price_' + ids).html(show_selling_price_with_vat);




        }
    });
}
function get_description_update(ids) {
    $j('#update_description_' + ids).autocomplete({
        source: "get_part_description",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function (event, data) {
            event.preventDefault();
            $j('#update_description_' + ids).val(data.item.description);
            $j('#update_part_no_' + ids).val(data.item.item_part_no);
            $j('#item_id_' + ids).val(data.item.item_id);
            $j('#update_retail_price_' + ids).html(data.item.selling_price);

        }
    });
}
function save_edited_part(id) {
    var item_id = $j('#item_id_' + id).val();
    var detail_id = $j('#order_detail_id_' + id).val();
    var update_qty = $j('#update_qty_' + id).val();
    $j.ajax({
        url: 'update_po_detail?oder_detail_id=' + detail_id + '&item_id=' + item_id + '&update_qty=' + update_qty,
        method: 'GET',
        success: function (data) {

            $j('#update_part_no_' + id).attr("readonly", 'true');
            ;
            $j('#update_part_no_' + id).css("border-color", " #d1d1d1");
            ;

            $j('#update_description_' + id).attr("readonly", 'true');
            ;
            $j('#update_description_' + id).css("border-color", " #d1d1d1");
            ;

            $j('#update_qty_' + id).attr("readonly", 'true');
            ;
            $j('#update_qty_' + id).css("border-color", " #d1d1d1");
            ;
            $j('#update_button_' + id).attr('value', 'Edit');

            $j('#update_part_no_' + id).removeAttr("onkeypress");
            $j('#update_description_' + id).removeAttr("onkeypress");

            $j('#update_button_' + id).attr("onclick", "edit_part(" + id + ")");
            $j('#update_button_' + id).css("background-color", "gray");
            $j('#update_button_' + id).css("color", "white");


        }
    });
    var total_am = calculating_manage_order_total();

    var po = $j('#sopoid').val();
    $j('#amount_id_' + po).html(total_am[0]);
    $j('#total_dis_' + po).html(total_am[1]);

    //  alert(total_am);
}

function edit_kit(id) {
    $j('#kits').removeAttr("readonly");
    $j('#kits').css("border-color", " red");

    $j('#update_button_' + id).attr('value', 'Save');

    var kit_old = $j('#kits').val();

    $j('#kits').attr("onkeyup", "get_kit_update(" + kit_old + ")");

    $j('#update_button_' + id).attr("onclick", "save_edited_kit(" + id + ")");
    $j('#update_button_' + id).css("background-color", "white");
    $j('#update_button_' + id).css("color", "green");
}

function get_kit_update(old) {
    var rows = $j('#row_count').val();
    var kit_new = $j('#kits').val();
    for (var i = 1; i <= rows; i++) {
        var qty = parseFloat($j('#update_qty_' + i).val());
        $j('#update_qty_' + i).val(qty * kit_new / old);
    }
    $j('#kits').attr("onkeyup", "get_kit_update(" + kit_new + ")");
}

function save_edited_kit(id) {
    var rows = $j('#row_count').val();
    var qty = [];
    qty[0] = [2];
    qty[0][0] = rows;
    for (var i = 1; i <= rows; i++) {
        qty[i] = [2];
        qty[i][0] = $j('#item_id_' + i).val();
        qty[i][1] = $j('#update_qty_' + i).val();

    }
    var po_id = $j('#sopoid').val();
    var kits = $j('#kits').val();

    $j.ajax({
        type: 'POST',
        url: 'update_po_kit_detail?po_id=' + po_id + '&kits=' + kits,
        data: {
            qty: qty
        },
//        method: 'GET',
        success: function (data) {

            $j('#kits').attr("readonly", 'true');
            $j('#kits').css("border-color", " #d1d1d1");

            $j('#update_button_' + id).attr('value', 'Edit');

            $j('#kits').removeAttr("onkeyup");

            $j('#update_button_' + id).attr("onclick", "edit_kit(" + id + ")");
            $j('#update_button_' + id).css("background-color", "gray");
            $j('#update_button_' + id).css("color", "white");


        }
    });
    var total_am = calculating_manage_order_total();

    var po = $j('#sopoid').val();
    $j('#amount_id_' + po).html(total_am[0]);
    $j('#total_dis_' + po).html(total_am[1]);
}

function  pg_addic(table, row_count) {
    var lengthd = $j('#' + table + ' tr').length;
    var row_wise = lengthd / row_count;
    alert(row_wise);
}
function reject_order() {
    var oid = $j('#sopoid').val()
    $j("<div ><table><tr><td style='color:red'>Are you sure you want to Reject this order?</td><td></td></tr></table><table><tr><td>Reason : </td><td><textarea id='reject_reason' style='width:200px'></textarea></td></tr></table> </>").dialog({
        modal: true,
        title: 'Reject Purchase Order',
        zIndex: 10000,
        autoOpen: true,
        width: '350',
        resizable: false,
        buttons: {
            Yes: function () {
                $j.ajax({
                    url: 'reject_order?order_id=' + $j('#sopoid').val() + '&reason=' + $j('#reject_reason').val(),
                    method: 'GET',
                    success: function (data) {
                        $j('#dealer_pending_po_' + oid).remove();

                    }
                });
                $j(this).dialog("close");
                $j.colorbox.close();
            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });
}
function calculating_manage_order_total() {
    var row_count = $j('#order_body tr').length;
    var tot = 0;
    var without_vat = 0;
    var tot_dis = 0;
    $j('#order_body tr').each(function () {
        var row = jQuery(this).closest('tr').attr('id');
        var strs = row.split("_");
        var new_id = strs[2];
        var new_qty = $j('#update_qty_' + new_id).val();
        var new_price = $j('#update_retail_price_' + new_id).val();
        var first_tot = Number(new_qty) * Number(new_price);
        var dis_per = $j('#discount_per').val();
        var discount = first_tot * dis_per / 100;
        var vat_per = $j('#vat_de').val();
        var vat = first_tot * vat_per / 100;
        tot_dis += discount;
        without_vat += first_tot - discount;
        tot += first_tot - discount + vat;


    });

    $j('#total_amount').html(CommaFormatted(Number(tot).toFixed(2)));
    $j.ajax({
        url: 'update_po?order_id=' + $j('#sopoid').val() + '&amount=' + tot + '&without_vat=' + without_vat + '&tot_dis=' + tot_dis,
        method: 'GET',
        success: function (data) {

        }
    });
    return new Array(Number(tot).toFixed(2), Number(tot_dis).toFixed(2));
    ;
    //alert(row_count);
}
function submit_like_order(order_id) {
    $j("<div ><table><tr><td style='color:Green'>Are you sure you want to Submit this order?</td></tr></table> </>").dialog({
        modal: true,
        title: 'Submit Purchase Order',
        zIndex: 10000,
        autoOpen: true,
        width: '350',
        resizable: false,
        buttons: {
            Yes: function () {
                $j.ajax({
                    url: 'submit_like_order?order_id=' + order_id,
                    method: 'GET',
                    success: function (data) {

                    }
                });
                $j(this).dialog("close");
                $j.colorbox.close();
                location.reload();
            },
            No: function () {
                $j(this).dialog("close");
            }
        },
        close: function (event, ui) {
            $j(this).remove();
        }
    });

}
//$j(document).ready(function(){
//    $j('#assign_purchase_order_table').dataTable();
//});
//$j(document).ready(function() {
//    $j('#tbl_sold').dataTable({
//        "pagingType": "simple"
//    });
//});
//-----------------------------//SORTING TABLE//------------------------
function sortTable(f, n, table_name) {
    var rows = $j('#' + table_name + ' tbody  tr').get();

    rows.sort(function (a, b) {

        var x = $j(a).children('td').eq(n).text();
        var y = $j(b).children('td').eq(n).text();
        var A = Number(x);
        var B = Number(y);

        if (A < B) {
            return -1 * f;
        }
        if (A > B) {
            return 1 * f;
        }
        return 0;
    });

    $j.each(rows, function (index, row) {
        $j('#' + table_name).children('tbody').append(row);
    });
}

var f_nm = 1;

function pass_table(table_name, my_header_id) {
    f_nm *= -1;
    var n = $j('#' + my_header_id).prevAll().length;

    sortTable(f_nm, n, table_name);
}




