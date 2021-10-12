$j(function() {

    var user_type = $j("#log_user_type").val();

    if (user_type == "Distributor" || user_type == "Sales Rep") {

        var log_id_employee = $j("#log_disbtr").val();
        var log_employee_name = $j("#log_employee_name").val();
        $j('#txt_emp_name_token').val(log_id_employee);
        $j('#txt_emp_name').val(log_employee_name);
        $j('#txt_emp_name').attr("disabled", true);
        $j('#distributor_name').attr("disabled", true);
        $j('#distributor_name').val(log_employee_name);
        $j('#emp_name_uc').val(log_employee_name);
        $j('#id_employee').val(log_employee_name);

    }

    $j("#start_date_po").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date_po").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });


    $j("#dateOne").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#dateOne").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#txttren_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#txttrend_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#dateTwo").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#txt_st_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });
    $j("#txt_en_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#start_date_mr").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date_mr").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#start_date_sr").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date_sr").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#fe_start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#fe_end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#sDate").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#eDate").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });
    $j("#start_order_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#end_order_date").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#selt_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#start_date_ucs").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date_uce").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    var user_type = UserType;

    if (user_type == "Distributor") {

        var log_id_employee = $j("#log_id_employee").val();
        var log_employee_name = $j("#login_name").val();
        $j('#employee_no').val(log_id_employee);
        $j('#employee_name').val(log_employee_name);
        $j('#employee_name').attr('disabled', true);
        $j('#manage_employee_name').attr('disabled', true);
        $j('#txtemname').val(EmpName);
        $j('#txtemnamehid').val(PlaceID);
        $j('#txtemname').attr('disabled', true);

        $j('#emp_name').val(EmpName);
        $j('#emp_id').val(PlaceID);
        $j('#emp_name').attr('disabled', true);
    }


});

function get_employee() {
    $j("#txtemname").autocomplete({
        source: "getEmployee",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txtemnamehid').val(data.item.id_employee);

        }
    });
}

function get_employeeplcae() {
    $j("#txt_termhh_name").autocomplete({
        source: "getEmployeeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_isfsdfdter_name').val(data.item.id_employee_has_place);

        }
    });
}

function get_ter() {
    $j("#txt_ter_name").autocomplete({
        source: "getterNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_idter_name').val(data.item.id_territory);

        }
    });
}



/*
 * 20.06.2014 Update Autocomplete
 */

function get_employee_names_for_sales_order() {

    $j("#txt_emp_name").autocomplete({
        source: "getDstributorforsalesReport",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_emp_name_token').val(data.item.id_employee_has_place);
            $j('#id_physical_place').val(data.item.id_physical_place);

        }
    });
}


function get_gps_employe_namestrcking() {
    var area_id = $j("select[name='cmb_area'] option:selected").val();
    var hcmb_dispyc = $j('#hcmb_dispyc').val();
    $j("#emp_name").autocomplete({
        source: "getUserNamegpstracking?pysid=" + hcmb_dispyc+'&area_id='+area_id,
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_gps_emp_name_token').val(data.item.id_employee_has_place);


        }
    });
}

function get_gps_employe_names() {
   
    $j("#emp_name").autocomplete({
        source: "getUserNamesqzy",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#txt_gps_emp_name_token').val(data.item.id_employee_has_place);


        }
    });
}

function get_item_names() {

    $j("#iName").autocomplete({
        source: "search_by_item_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#iIdHidden').val(data.item.id_item);


        }
    });
}

function get_employee_name_wise() {
    $j("#eName").autocomplete({
        source: "search_by_employee_name_wise",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#eId').val(data.item.id_employee);


        }
    });
}

function get_route_name_wise() {
    $j("#tName").autocomplete({
        source: "search_by_territory_name_wise",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#tId').val(data.item.id_territory);


        }
    });
}


//---------------------------------------------------------------------------------------------------------

/*
 function get_employee_names_for_stock_availability() {
 
 $j("#employee_name").autocomplete({
 source: "search_by_employee_name",
 width: 265,
 selectFirst: true,
 minlength: 1,
 dataType: "jsonp",
 select: function(event, data) {
 
 $j('#employee_id').val(data.item.id_employee);
 
 
 }
 });
 }*/



function get_employee_names_for_stock_availability() {

    $j("#employee_name").autocomplete({
        source: "search_by_employee_name",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#employee_id').val(data.item.id_employee_has_place);


        }
    });
}

function get_item_names_for_stock_availability() {

    $j("#item_name").autocomplete({
        source: "search_by_item_name_stock",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#item_id').val(data.item.iditem);


        }
    });
}

function search_by_item_category_name_stock() {

    $j("#item_category_name").autocomplete({
        source: "search_by_item_category_name_stock",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#item_category_id').val(data.item.id_item_category);


        }
    });
}

function search_by_territory_stock() {

    $j("#area_name").autocomplete({
        source: "search_by_territory_stock",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#area_id').val(data.item.id_territory);


        }
    });
}
function search_by_item_sales_return() {
    $j("#item_name").autocomplete({
        source: "search_by_item_sales_return",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#item_id').val(data.item.id_item);


        }
    });
}

function search_by_item_market_return() {
    $j("#item_name").autocomplete({
        source: "search_by_item_market_return",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#item_id').val(data.item.id_item);


        }
    });
}

function search_by_route_market_return() {
    $j("#route_name").autocomplete({
        source: "search_by_route_market_return",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#route_id').val(data.item.id_territory);


        }
    });
}
/*
 function search_by_distributor_market_return() {
 $j("#distributor_name").autocomplete({
 source: "search_by_distributor_market_return",
 width: 265,
 selectFirst: true,
 minlength: 1,
 dataType: "jsonp",
 select: function(event, data) {
 
 $j('#distributor_id').val(data.item.id_employee);
 
 
 }
 });
 }*/

function search_by_distributor_market_return() {
    $j("#distributor_name").autocomplete({
        source: "search_by_distributor_market_return",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#distributor_id').val(data.item.id_physical_place);


        }
    });
}

function search_by_distributor_free_issue() {
    $j("#distributor_name").autocomplete({
        source: "search_by_distributor_free_issue",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#distributor_id').val(data.item.id_physical_place);


        }
    });
}


function search_by_item_free_issue() {
    $j("#item_name").autocomplete({
        source: "search_by_item_free_issue",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#item_id').val(data.item.id_item);


        }
    });
}

function tableToExcelStockAvailability() {

    table = $j('#stockTable').val();
    table = document.getElementById(table);
    download(table.outerHTML, "ftable.xls", "application/vnd.ms-excel");

}

$j(function() {

    $j("#start_grn").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#start_grn",
        altFormat: "yy-mm-dd"

    });

    $j("#end_grn").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#end_grn",
        altFormat: "yy-mm-dd"

    });

});

function get_employee_names() {

    $j("#manage_employee_name").autocomplete({
        source: "getEmployeeNamesByGood",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

        }
    });
}



function get_grn_no() {

    $j("#grn_no").autocomplete({
        source: "getGrnByGood",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#grn_no_hidden_token').val(data.item.id_good_received);
        }
    });
}

/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var row_plus = 1;
var row_minus = 1;



$j(function() {

    $j("#tabs").tabs();

    $j("#order_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#start_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date").datepicker({
        dateFormat: "yy-mm-dd",
        altField: "#order_date",
        altFormat: "yy-mm-dd"

    });

    $j('#order_time').ptTimeSelect();



});

function get_employe_names() {

    $j("#employee_name").autocomplete({
        source: "getEmployeeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            // collect_data = {};
            $j('#employee_no').val(data.item.id_employee_has_place);
            $j('#hiddn_token_type').val('item');

        }
    });
}

function get_purchase_order_employes() {

    $j("#manage_employee_name").autocomplete({
        source: "getPurchaseOrderNo_employes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#manage_employee_name_id').val(data.item.id_employee_has_place);
            // $j('#hiddn_token_type').val('item');

        }
    });
}


function get_purchase_no() {
    var manage_employee_name_id_hid = $j('#manage_employee_name_id').val();
    $j("#manage_pod_no").autocomplete({
        source: "getPurchaseOrderNo?manage_employee_name_id_hidden=" + manage_employee_name_id_hid + "",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#manage_podprimary_no').val(data.item.id_purchase_order);
        }
    });
}



function get_product_names(row) {

    $j("#item_name_" + row).autocomplete({
        source: "getProducts",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            var rowCount = $j('#tbl_purchase >tbody >tr').length;

            $j('#item_price_' + row).val(data.item.product_price);//hidn_token_1
            $j('#hidn_token_' + row).val(data.item.id_products);//hidn_token_1

        }
    });
}

function remove_purchase_table_row(row_id) {
    if (!confirm('Are you sure you want to remove?')) {
        ev.preventDefault();
        return false;
    } else {

        var show_button = row_id - 1;
        $j('#add_row_' + show_button).show();
        $j('#row_' + row_id).remove();
        $j('#amount_' + row_id).val('');
        count_amount();

    }
}

function add_field_row(button_id) {
    validateTable();
    if (validateTable() == true) {
        $j('#' + button_id).hide();
        row_plus++;
        $j('#hidden_token_row').val(row_plus);
        $j('#tbl_purchase').append(
                '<tr id="row_' + row_plus + '">'
                + '<td><input type="button" name="add_row" id="add_row_' + row_plus + '" value="+" onclick="add_field_row(this.id);"></td>'
                + '<td><input type="text" name="item_name_' + row_plus + '" id="item_name_' + row_plus + '" autocomplete="off" onfocus="get_product_names(' + row_plus + ');" placeholder="Select Product"/><input type="hidden" name="hidn_token_' + row_plus + '" id="hidn_token_' + row_plus + '"></td>'
                + '<td><input type="text" name="item_price_' + row_plus + '" id="item_price_' + row_plus + '" readonly="true"></td>'
                + '<td><input type="text" name="item_qty_' + row_plus + '" id="item_qty_' + row_plus + '" autocomplete="off" onkeyup="count_amount(' + row_plus + ');"></td>'
                + '<td><input type="text" name="amount_' + row_plus + '" id="amount_' + row_plus + '" readonly="true"></td>'
                + '<td><a href="#" onclick="remove_purchase_table_row(' + row_plus + ');">Remove</a></td>'
                + '</tr>'
                );
    }



}

function add_update_field_row() {

    var update_row = $j('#hidden_update_row').val();
    update_row++;
    $j('#hidden_update_row').val(update_row);
    $j('#hidden_token_row').val(update_row);

    $j('#tbl_purchase_view').append(
            '<tr id="row_' + update_row + '">'
            + '<td><input type="text" name="item_name_' + update_row + '" id="item_name_' + update_row + '" autocomplete="off" onfocus="get_product_names(' + update_row + ');" placeholder="Select Product"/><input type="hidden" name="hidn_token_' + update_row + '" id="hidn_token_' + update_row + '"></td>'
            + '<td><input type="text" name="item_price_' + update_row + '" id="item_price_' + update_row + '" readonly="true"></td>'
            + '<td><input type="text" name="item_qty_' + update_row + '" id="item_qty_' + update_row + '" autocomplete="off" onkeyup="count_amount_update(' + update_row + ');"></td>'
            + '<td><input type="text" name="amount_' + update_row + '" id="amount_' + update_row + '" readonly="true"></td>'
            + '<td><a href="">Remove</a></td>'
            + '</tr>'
            );

}

function enable_row(id) {
    var href = $j('#purchase_' + id).html();
    if (!confirm('Are you sure you want to Remove?')) {
        ev.preventDefault();
        return false;
    } else {
        var detail = new Array();
        var hidden_purchase_order_has_products_token = $j("#hidden_purchase_order_has_products_" + id).val();
        detail[0] = hidden_purchase_order_has_products_token;
        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'deletePurchaseItem',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                $j('#row_' + id).remove();
                // location.reload();
            },
            error: function() {
                alert('error');
            }

        });
    }
}


function create_dilivery_note(id) {
    if (!confirm('Are You Sure You Want to Convert This into Dilivery Note ?')) {
        ev.preventDefault();
        return false;
    } else {
        var detail = new Array();
        var hidden_purchase_order = $j("#hidden_purchase_order_" + id).val();
        detail[0] = hidden_purchase_order;
        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'createDiliveryNote',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                console.log(data);
                $j('#row_' + id).remove();
                location.reload();
            },
            error: function() {
                alert('error');
            }

        });
    }
}


function delete_purchase_order(id) {

    if (!confirm('Are you sure you want to Delete?')) {
        ev.preventDefault();
        return false;
    } else {
        var detail = new Array();
        var hidden_purchase_order_has_products_token = $j("#hidden_purchase_order_" + id).val();
        detail[0] = hidden_purchase_order_has_products_token;
        var json_cast = JSON.stringify(detail);
        $j.ajax({
            url: 'deletePurchase',
            method: 'POST',
            data: {
                'data': json_cast
            },
            success: function(data) {
                $j('#row_' + id).remove();
                //location.reload();
            },
            error: function() {
                alert('error');
            }

        });
    }
}

function count_amount(id) {
    if (id !== '') {
        var price = parseFloat($j('#item_price_' + id).val());
        var qty = parseFloat($j('#item_qty_' + id).val());
        if (!isNaN(price) && !isNaN(qty)) {
            $j('#amount_' + id).val(parseFloat(price * qty).toFixed(2));
        }
    }

    var value_row = 0;
    var row_count = $j('#hidden_token_row').val() + 1;
    row_count++;

    for (var x = 1; x < 5; x++) {
        var check_value = $j('#amount_' + x).val();
        if (typeof check_value !== "undefined" && !isNaN(check_value)) {
            value_row += parseFloat($j('#amount_' + x).val());

        }

    }
    if (!isNaN(value_row)) {
        $j('#txt_total').val(parseFloat(value_row).toFixed(2));
    } else {
        $j('#txt_total').val('empty row added');
    }

}

function count_amount_update(id) {
    if (id !== '') {
        var price = parseFloat($j('#item_price_' + id).val());
        var qty = parseFloat($j('#item_qty_' + id).val());
        if (!isNaN(price) && !isNaN(qty)) {
            $j('#amount_' + id).val(parseFloat(price * qty).toFixed(2));
        }
    }

    var value_row = 0;
    var row_count = $j('#hidden_update_row').val() + 1;
    row_count++;

    for (var x = 1; x < row_count; x++) {
        var check_value = $j('#amount_' + x).val();
        if (typeof check_value !== "undefined" && !isNaN(check_value)) {
            value_row += parseFloat($j('#amount_' + x).val());

        }

    }
    if (!isNaN(value_row)) {
        $j('#txt_total').val(parseFloat(value_row).toFixed(2));
    } else {
        $j('#txt_total').val('empty row added');
    }

}

function validateTable() {
    var i = $j('#hidden_token_row').val();
    var item = $j('#item_name_' + i).val();
    var qty = $j('#item_qty_' + i).val();
    if (item !== '' && qty !== '') {
        return true;
    } else {
        return false;
    }




}

function get_route_name_for_sales_order() {
    $j("#txt_ter").autocomplete({
        source: "search_by_territory_name_for_sales_order",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_terid').val(data.item.id_territory);


        }
    });
}

function get_outlet_name_for_sales_order() {
    $j("#txt_out").autocomplete({
        source: "search_by_outlet_name_for_sales_order",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_outid').val(data.item.id_outlet);


        }
    });
}

function getPDFPrint(tid) {
    var colne_page_test = $j('#' + tid).html();
    var pdfName = $j('#pdfName').val();
    var topic = $j('#topic').val();
    var overlay = jQuery();
    overlay.appendTo(document.body);
    $j.ajax({
        url: URL + 'reports/reportsPDFPrint?pdfName=' + pdfName + '&topic=' + topic,
        method: 'post',
        data: {'key': colne_page_test},
        success: function(data) {
            //alert(data);
            var session = $j('#session').val();

            window.open("../PDF_Reports/report_" + session + pdfName + ".pdf");

        },
        error: function() {
            alert('error');
        }
    });

}
function getPDFPrintForPendingoderReport(tid) {
	 w=window.open();
    w.document.write('<html><center><h1>Pending Purchase Order Details</h1></center><table border="1" style="border-spacing:0">'+$j('#' + tid).html()+'</table></html>');
    w.print();
    w.close();
	
//    var colne_page_test = $j('#' + tid).html();
//    var pdfName = $j('#pdfName1').val();
//    var topic = "Pending Purchase Oder Details";
//    var overlay = jQuery();
//    overlay.appendTo(document.body);
//    $j.ajax({
//        url: URL + 'reports/reportsPDFPrint?pdfName=' + pdfName + '&topic=' + topic,
//        method: 'post',
//        data: {'key': colne_page_test},
//        success: function(data) {
//            //alert(data);
//            var session = $j('#session').val();
//
//            window.open("../PDF_Reports/report_" + session + pdfName + ".pdf");
//
//        },
//        error: function() {
//            alert('error');
//        }
//    });

}

function getPDFPrintForacceptoderReport(tid) {
	w=window.open();
    w.document.write('<html><center><h1>Accepted Purchase Order Details</h1></center><table border="1" style="border-spacing:0">'+$j('#' + tid).html()+'</table></html>');
    w.print();
    w.close();
	
//    var colne_page_test = $j('#' + tid).html();
//    var pdfName = $j('#pdfName2').val();
//    var topic = "Accepted Purchase Oder Details";
//    var overlay = jQuery();
//    overlay.appendTo(document.body);
//    $j.ajax({
//        url: URL + 'reports/reportsPDFPrint?pdfName=' + pdfName + '&topic=' + topic,
//        method: 'post',
//        data: {'key': colne_page_test},
//        success: function(data) {
//            //alert(data);
//            var session = $j('#session').val();
//
//            window.open("../PDF_Reports/report_" + session + pdfName + ".pdf");
//
//        },
//        error: function() {
//            alert('error');
//        }
//    });

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

function search_by_time_report_employee() {

    $j("#time_report_employee").autocomplete({
        source: "search_by_time_report_employee",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#time_report_employee_id').val(data.item.id_employee);
            $j('#idphy').val(data.item.id_physical_place);
            $j('#idempType').val(data.item.id_employee_type);


        }
    });
}
function search_by_time_report_outlet() {

    $j("#time_report_outlet").autocomplete({
        source: "search_by_time_report_outlet",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#time_report_outlet_id').val(data.item.id_outlet);


        }
    });
}

function search_by_outlet_report_unproductive_call() {

    $j("#outlet_name_uc").autocomplete({
        source: "search_by_outlet_report_unproductive_call",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#outlet_id_uc').val(data.item.id_outlet);


        }
    });
}


function search_by_emp_report_unproductive_call() {

    $j("#emp_name_uc").autocomplete({
        source: "search_by_emp_report_unproductive_call",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#emp_id_uc').val(data.item.id_employee);


        }
    });
}

/*
 * sammera 2013-12-21
 */



function search_by_territory_for_targetAchievement() {

    $j("#target_ter_name").autocomplete({
        source: "search_by_territory_for_targetAchievement",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#target_ter_id').val(data.item.teritory_id);


        }
    });
}


function search_by_item_for_targetAchievement() {

    $j("#item_ter_name").autocomplete({
        source: "search_by_item_for_targetAchievement",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#item_ter_id').val(data.item.id_item);


        }
    });
}


function search_by_ter_for_targetAchievement() {

    $j("#ter_name").autocomplete({
        source: "search_by_ter_for_targetAchievement",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#ter_id').val(data.item.id_territory);


        }
    });
}


function search_by_emp_target_vs_achievement_emp_wise() {

    $j("#emp_tar_name").autocomplete({
        source: "search_by_emp_targetVsAch",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            console.log(data);
            $j('#emp_id').val(data.item.id_employee);


        }
    });
}

function search_by_item_target_vs_achievement_emp_wise() {

    $j("#item_tar_name").autocomplete({
        source: "search_by_item_targetVsAch",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#item_tar_id').val(data.item.id_item);


        }
    });
}



//

function search_by_employee_name_for_cheque_details() {

    $j("#emp_name").autocomplete({
        source: "search_by_employee_name_for_cheque_details",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#emp_id').val(data.item.id_employee);


        }
    });
}

function search_by_outlet_name_for_cheque_details() {

    $j("#outlet_name").autocomplete({
        source: "search_by_outlet_name_for_cheque_details",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#outlet_id').val(data.item.id_outlet);


        }
    });
}

function search_by_emp_name_daily_sales() {

    $j("#name_emp").autocomplete({
        source: "search_by_emp_name_daily_sales",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#id_emp').val(data.item.id_physical_place);

        }
    });
}
function search_by_outlet_name_non_invoiced() {

    $j("#outlet_name").autocomplete({
        source: "search_by_outlet_name_non_invoiced",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#outlet_id').val(data.item.id_outlet);

        }
    });
}
function search_by_emp_name_non_invoiced() {

    $j("#emp_name").autocomplete({
        source: "search_by_emp_name_non_invoiced",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#emp_id').val(data.item.id_employee);

        }
    });
}
function outstanding_emp_names() {

    $j("#id_employee").autocomplete({
        source: "outstanding_emp_names",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#id_employee_hidden').val(data.item.id_employee);

        }
    });
}

function outstanding_outlet_names() {

    $j("#id_outlet").autocomplete({
        source: "outstanding_outlet_names",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#id_outlet_hidden').val(data.item.id_outlet);

        }
    });
}


/*
 * kanishka sales items 2014-02-24
 * 
 */
function get_employee_items() {
    $j("#txt_emp_name").autocomplete({
        source: "getEmployeeNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#htxt_emp_name').val(data.item.id_employee_has_place);

        }
    });
}

function get_outeltsnames() {
    $j("#txt_outlet_name").autocomplete({
        source: "get_outlets_names",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#htxt_outlet_name').val(data.item.id_outlet_has_branch);

        }
    });
}

function get_order_code() {
    $j("#order_code").autocomplete({
        source: "getordercodes",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {


        }
    });
}

function find_outlet_name() {
    // alert("message");

    $j("#out_name").autocomplete({
        source: "search_by_outlet_name_for_payment_outstanding",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#hout_id').val(data.item.id_outlet);


        }
    });
}
function find_emp_name() {
    $j("#emp_name").autocomplete({
        source: "search_by_employee_name_for_payment_outstanding",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#emp_id').val(data.item.id_employee);


        }
    });

}



function search_by_emp_name_payments() {
    //alert("aaa");
    $j("#emp_name").autocomplete({
        source: "search_by_emp_name_payments",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#emp_id').val(data.item.id_employee);

        }
    });
}

var row = 1;
var field_row = 1;
$j(function() {
    $j("#start_date_payments").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"

    });

    $j("#end_date_payments").datepicker({
        dateFormat: "yy-mm-dd",
        altFormat: "yy-mm-dd"
    });
});

function set_data() {
    //alert("dsfd");
    var setdate = $('#start_order_date').val();
    alert(setdate);
    console.log("setdate");
    $.ajax({
        type: 'POST',
        url: 'viewTimeDetails',
        async: false,
        data: {
            'setdate': setdate
        },
        success: function(data) {

        },
        error: function() {

        }

    });
}
function get_items_for_timereport(orderId) {
    //alert("KKKKK");
    $j('#tbl_acc_order_detail_body').empty();
    //    var orderId = $j('#order_id').val();
    //    alert(oder_id);
    //var update = $("#div_update_employee_type_form");
    $j('#item_for_forOder_' + orderId).colorbox({
        width: "45%",
        hight: "60%",
        inline: true,
        href: '#Oder_item_detils'
    });
    $j.ajax({
        url: 'getItesms_for_time_report',
        data: {
            'oder_id': orderId
        },
        method: 'POST',
        success: function(data) {
            var x = JSON.parse(data);
            console.log(x);

            var total = 0;
            for (var i = 0; i < x.length; i++) {
                grand_tot = total + x[i].amount;

                $j('#tbl_acc_order_detail_body').append(
                        '<tr>'
                        + '<td>'
                        + x[i].item
                        + '</td>'
                        + '<td>'
                        + x[i].item_account_code
                        + '</td>'
                        + '<td>'
                        + x[i].product_price
                        + '</td>'
                        + '<td>'
                        + x[i].product_qty
                        + '</td>'
                        + '<td>'
                        + x[i].discount
                        + '</td>'
                        + '<td>'
                        + x[i].amount
                        + '</td>'
                        + '</tr>'

                        );
            }

            //            });

        },
        error: function() {
            alert("error");

        }
    });
}

/*
 * @author @Faazi @ahamed
 * 
 * @contact faaziahamed
 */

function get_employenames_by_stores() {

    $j("#txt_emp_name").autocomplete({
        source: "getEmployeNamesbyStores",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_emp_name_token').val(data.item.id_physical_place);


        }
    });
}


function get_division_name_for_sales_order() {

    $j("#txt_divi").autocomplete({
        source: "search_by_division_name_for_sales_order",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#txt_division').val(data.item.id_division);


        }
    });
}

function get_employee_names_for_daily_items() {

    $j("#txt_emp_name").autocomplete({
        source: "get_employee_names_for_daily_items",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#htxt_emp_name').val(data.item.id_physical_place);


        }
    });
}


function get_purchase_noForP_report() {
    var manage_employee_name_id_hid = $j('#manage_employee_name_id').val();
    $j("#manage_pod_no").autocomplete({
        source: "getPurchaseOrderNofor_report?manage_employee_name_id_hidden=" + manage_employee_name_id_hid + "",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#manage_podprimary_no').val(data.item.id_purchase_order);
        }
    });
}
function get_purchase_order_employes_name() {

    $j("#manage_employee_name").autocomplete({
        source: "getPurchaseOrderNo_employesNames",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            $j('#manage_employee_name_id').val(data.item.id_employee_has_place);
            // $j('#hiddn_token_type').val('item');

        }
    });
}

$j(function() {
    $j("#btn_sub").click(function() {
        var date = $j('#start_order_date').val();
        if (date === '') {
            alert('Date field must be filled!');
        }
        else {
            $j("#timeRpt").submit();
        }

    });
});


function getBrand_for_stock_availability(){
//    alert("aaaa");
        $j("#brand").autocomplete({
        source: "getBrand_for_stock_availability",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            console.log(data);
            $j('#brand_id').val(data.item.item_brand_id);


        }
    });
}

