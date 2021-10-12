/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function get_product(id) {
    $j("#item_name_" + id).autocomplete({
        source: "getProduct",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            console.log(data);
            $j('#item_price_' + id).val(data.item.product_price);
            $j('#item_id_' + id).val(data.item.id_products);
            $j('#item_id2_' + id).val(data.item.iditem);
            $j('#item_accountcode_' + id).val(data.item.item_account_code);


            $j('#discount_' + id).val($j('#discount').val());
            $j('#type_' + id).val($j('#type').val());
            get_current_stock1(id, data.item.id_products);
        }
    });


}





function get_product_sales_retun(id) {
    $j("#sr_product_name_" + id).autocomplete({
        source: "getProduct",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            console.log(data);

            $j('#srh_product_name_' + id).val(data.item.id_products);
            $j('#sr_price_' + id).val(data.item.product_price);
            $j('#item_accountcodereturn_' + id).val(data.item.item_account_code);
            get_current_stock(id, data.item.id_products);


        }
    });


}


function get_current_stock(id, prodcut_id) {
    var empid = $j('#employee_id').val();
    $j.ajax({
        type: 'POST',
        url: 'get_current_stock',
        data: {
            'employehasplace_id': empid,
            'product_id': prodcut_id
        },
        success: function(data) {
            var qty = JSON.parse(data);
            console.log(data);

            var qtys = Math.round(qty[0]['qty']);

            $j('#sr_abl_qty_' + id).val(qtys);

        },
        error: function() {

        }
    });
}

function get_current_stock1(id, prodcut_id) {
    var empid = $j('#employee_id').val();
    $j.ajax({
        type: 'POST',
        url: 'get_current_stock',
        data: {
            'employehasplace_id': empid,
            'product_id': prodcut_id
        },
        success: function(data) {
            var qty = JSON.parse(data);

            console.log(qty[0].qty);

            var qtys = Math.round(qty[0]['qty']);
            $j('#item_abls_qty_' + id).val(qtys);

        },
        error: function() {

        }
    });
}







function get_discount() {
    var table = document.getElementById('tbl_salesorder');
    var idd = (table.rows.length - 1);

    $j('#discount').val('0.00');
    $j('#type').val("0");
    count();
    var item_id = 0.00;
    var id_employee_has_place = 0.00;
    var territory_name = $j("#territory_name").val();
    var outlet_name = $j('#outlet_name').val();
    $j.ajax({
        type: 'POST',
        url: 'getDiscount',
        data: {
            'territory_name': territory_name,
            'outlet_name': outlet_name
        },
        success: function(data) {
            if (data !== null) {
                var price_discount = data.split("`")[0].trim();
                var percentage_discount = data.split("`")[1].trim();
                var discount = 0.00;
                if (price_discount !== "0.00") {

                    $j('#type').val("1");
                    discount = price_discount;
                }
                if (percentage_discount !== "0.00") {
                    $j('#type').val("2");
                    discount = percentage_discount;
                }
                $j('#discount').val(discount);


                discount = 0.00;
            } else {
                $j('#discount').val('0.00');
                $j('#type').val("0");
            }

        },
        error: function() {

        }
    });

}
function get_employee() {
    $j("#employee_name").autocomplete({
        source: "getEmployee",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#employee_id').val(data.item.id_employee);
            $j('#txtemp_place_id').val(data.item.id_employee_has_place);

            loadDivision();
        }
    });
}

function loadDivision() {

    var empid = $j('#employee_id').val();
    $j.ajax({
        type: 'POST',
        url: 'allDivisionCombo',
        data: {
            'empid': empid
        },
        success: function(data) {
            $j('#division_name').empty();
            $j('#division_name').append(data);
            loadTerritory();

        },
        error: function() {

        }
    });
}
function loadTerritory() {
    var empid = $j('#employee_id').val();
    var division_name = $j('#division_name').val();
    $j.ajax({
        type: 'POST',
        url: 'allTerritoryCombo',
        data: {
            'division_name': division_name,
            'empid': empid
        },
        success: function(data) {
            // alert(data);
            $j('#territory_name').empty();
            $j('#territory_name').append(data);
            loadOutlet();
            loadPhysicalPlace();

        },
        error: function() {

        }
    });
}

function loadPhysicalPlace() {
    var empid = $j('#employee_id').val();
    var division_name = $j('#division_name').val();
    var territory_name = $j('#territory_name').val();
    $j.ajax({
        type: 'POST',
        url: 'allPhysicalPlaceCombo',
        data: {
            'division_name': division_name,
            'empid': empid,
            'territory_name': territory_name
        },
        success: function(data) {
            // alert(data);
            $j('#physical_place_name').empty();
            $j('#physical_place_name').append(data);
            loadOutlet();
        },
        error: function() {

        }
    });
}

function loadOutlet() {
    var territory_name = $j('#territory_name').val();
    $j.ajax({
        type: 'POST',
        url: 'allOutletCombo',
        data: {
            'territory_name': territory_name
        },
        success: function(data) {
            // alert(data);
            $j('#outlet_name').empty();
            $j('#outlet_name').append(data);
            loadBranch();
            loadInvoiced();
            //get_discount();
        },
        error: function() {

        }
    });
}
function loadInvoiced() {
    var outletid = $j('#outlet_name').val();
    var from = $j('#from').val();
    var to = $j('#to').val();
    $j.ajax({
        type: 'POST',
        url: 'allInvoicedCombo',
        data: {
            'outletid': outletid,
            'from': from,
            'to': to
        },
        success: function(data) {
            // alert(data);
            $j('#InvoiecId').empty();
            $j('#InvoiecId').append(data);

        },
        error: function() {

        }
    });
}
function loadBranch() {
//        alert('aaa');

    var outlet_name = $j('#outlet_name').val();
    $j.ajax({
        type: 'POST',
        url: 'allBranchCombo',
        data: {
            'outlet_name': outlet_name
        },
        success: function(data) {
            // alert(data);
            $j('#branch_name').empty();
            $j('#branch_name').append(data);
            loadEmplyee_hasplace_id();

        },
        error: function() {

        }
    });
//         get_discount();
}
//    function loadEmplyee_hasplace_id() {
//        var empid = $j('#employee_id').val();
//        var division_name = $j('#division_name').val();
//        var territory_name = $j('#territory_name').val();
//        var physical_place_name = $j('#physical_place_name').val();
//        if (empid !== null && division_name !== null && territory_name !== null && physical_place_name !== null) {
//            $j.ajax({
//                type: 'POST',
//                url: 'getEmployeHasPlaceID',
//                data: {
//                    'empid': empid,
//                    'division_name': division_name,
//                    'territory_name': territory_name,
//                    'physical_place_name': physical_place_name
//                },
//                success: function(data) {
//
//                    var dataarr = data.split("`");
//                    $j('#id_employee_has_place').val(dataarr[0].trim());
//                    // $j('#discount').val(dataarr[1].trim());
//
//                },
//                error: function() {
//
//                }
//            });
//        }
//    }

//    function save_sales_order_todb() {
//        var form_serilaze = $j('#hayleys_sls').serialize();
//        var form_serilaze_data = JSON.stringify(form_serilaze);
//        console.log(form_serilaze_data);
//        $j.ajax({
//            type: 'POST',
//            url: 'saveSalesOrder',
//            data: {
//                'sales_order': form_serilaze_data
//            },
//            success: function(data) {
//
//            },
//            error: function() {
//
//            }
//        });
//    }

$j(function() {
    loadInvoiced();
    load_return_type();

    if (UserType == "Distributor" || UserType == "Sales Rep") {
        $j('#employee_name').attr("disabled", true);
        $j('#employee_name').val(EmpName);
        $j('#employee_id').val(EMPLOYEE);
        $j('#txtemp_place_id').val(PlaceID);

        loadDivision();

    }
});
function show_invoice() {
    
    var InvoieceId = $j('#InvoiecId').val();
    show_details(InvoieceId);
    $j.ajax({
        type: 'POST',
        url: 'show_invoice',
        data: {
            'InvoieceId': InvoieceId
        },
        success: function(data) {

            $j('#set_return').empty();
            $j('#set_return').append(data);
            load_return_type();
            return_amount();
        },
        error: function() {

        }
    });
}

function show_details(InvoieceId){
 $j.ajax({
        type: 'POST',
        url: 'show_details',
        data: {
            'InvoieceId': InvoieceId
        },
        success: function(data) {

            $j('#invoced_detais').empty();
            $j('#invoced_detais').append(data);
            load_return_type();
            return_amount();
        },
        error: function() {

        }
    });
}


function load_return_type() {
    var count = $j('#raw_count').val();
    $j.ajax({
        type: 'POST',
        url: 'get_rType',
        success: function(data) {
            // alert(data);
            for (var x = 1; x <= count; x++) {
//                alert(x);

                $j('#r_type_' + x).empty();
                $j('#r_type_' + x).append(data);
                $j('#return_qty_' + x).val(0);
            }

        },
        error: function() {

        }
    });
}

function return_amount() {

    var count = $j('#raw_count').val();
    var grand_total = 0;
    for (var x = 1; x <= count; x++) {
        var price = $j('#product_price_' + x).val();
        var return_qty = $j('#return_qty_' + x).val();
        var total = price * return_qty;
        $j('#amount_' + x).val(total);
        grand_total = grand_total + total;
    }
    $j('#return_tot').val(grand_total);
}
function check_qty(x) {

    var return_qty = $j('#return_qty_' + x).val();
    if (return_qty.match(/^\s*\d*\s*$/)) {
//    if (return_qty.match(/^\+?[0-9][0-9][ ]*$/)) {
        var saleqty = $j('#saleqty_' + x).val();
        var freeQty = $j('#freeQty_' + x).val();
//        alert(saleqty,' ',freeQty)
        if (saleqty !== '0') {
            if (parseInt(saleqty) < parseInt(return_qty)) {
                alert("Return Quantity is Larger than Sales Quantity");
                $j('#return_qty_' + x).val('0');
            } else {
//                previouse_return(x, return_qty);
            }

        } else {
            if (parseInt(freeQty) < parseInt(return_qty)) {
                alert("Return Quantity is Larger than Free Quantity");
                $j('#return_qty_' + x).val('0');
            } else {
//                previouse_return(x, return_qty);
            }
        }

        return_amount();
    } else {
        alert("Value must be a number");
        $j('#return_qty_' + x).val('0');
    }
    return_amount();
}
//function previouse_return(row_count, qty) {
//    var id_product = $j('#id_product_' + row_count).val();
//    var id_invoiced = $j('#InvoiecId').val();
//    var invoiced_qty = $j('#saleqty_' + row_count).val();
//    var freeQty = $j('#freeQty_' + row_count).val();
////     alert(qty);
//     
//    $j.ajax({
//        type: 'POST',
//        url: 'previouse_return',
//        data: {
//            'id_product': id_product,
//            'id_invoiced': id_invoiced
//        },
//        success: function(data) {
//            var obj = $j.parseJSON(data);
//            var pre_qty = obj[0].qty;
//            var all_qty = Number(qty) + Number(pre_qty);
//            console.log(all_qty);
//            if(invoiced_qty !=='0'){
//                if (invoiced_qty < all_qty) {
//                alert('Total Return quntity is greater than Invoiced Quntity');
//                $j('#return_qty_' + row_count).val('0');
//            }
//                
//            }
//            if(invoiced_qty ==='0'){
////                alert(freeQty);
//                 if (freeQty < all_qty) {
//                alert('Total Return quntity is greater than Invoiced Quntity');
//                $j('#return_qty_' + row_count).val('0');
//            }
//                
//            }
//            
////
////            if (freeQty < all_qty) {
////                alert('Total Return quntity is greater than Invoiced Quntity');
////                $j('#return_qty_' + row_count).val('0');
////            }
//
//        },
//        error: function() {
//
//        }
//    });
//}

function get_employee_for_search() {
    $j("#emp_name").autocomplete({
        source: "getEmployee",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {

            $j('#employee_id').val(data.item.id_employee);
            $j('#txtemp_place_id').val(data.item.id_employee_has_place);

            loadDivision();
        }
    });
}
function search_return(){
   var employee_id = $j('#employee_id').val();
   var txtemp_place_id = $j('#txtemp_place_id').val();
   var from = $j('#from').val();
   var to = $j('#to').val();
    $j.ajax({
        type: 'POST',
        url: 'search_returns',
        data: {
            'employee_id': employee_id,
            'txtemp_place_id': txtemp_place_id,
            'from': from,
            'to': to
        },
        success: function(data) {

            $j('#search_return').empty();
            $j('#search_return').append(data);
            
        },
        error: function() {

        }
    });  
}