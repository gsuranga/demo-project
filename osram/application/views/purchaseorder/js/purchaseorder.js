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

    var user_type = UserType;

    if (user_type == "Distributor" || user_type == "Sales Rep") {

        var log_id_employee = $j("#log_id_employee").val();
        var log_employee_name = $j("#login_name").val();
        $j('#employee_no').val(log_id_employee);
        $j('#employee_name').val(log_employee_name);
        $j('#employee_name').attr('disabled', true);
        $j('#manage_employee_name').attr('disabled', true);
    }

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

function get_product_names_mng(row) {

    $j("#item_name_" + row).autocomplete({
        source: "getProducts",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            var rowCount = $j('#tbl_purchase >tbody >tr').length;
            console.log(rowCount);
            $j('#item_price_' + row).val(data.item.product_price);//hidn_token_1
            //$j('#item_price_' + row).val(data.item.product_cost);//hidn_token_1
            $j('#hidn_token_' + row).val(data.item.id_products);//hidn_token_1
            $j('#item_acc_code_'+row).val(data.item.item_account_code);
            qty(row);
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
            console.log(rowCount);
          //  $j('#item_price_' + row).val(data.item.product_price);//hidn_token_1
			$j('#item_price_' + row).val(data.item.product_cost);//hidn_token_1
            $j('#hidn_token_' + row).val(data.item.id_products);//hidn_token_1
			$j('#item_acc_code_'+row).val(data.item.item_account_code);
			get_avilableQty(row);
        }
    });
}

   function qty(row){       
   var empId= $j('#managee_mployee_no').val();
   var itemId= $j('#hidn_token_'+row).val();
//   alert(row+"aa"+empId+"aa"+itemId);
        $j.ajax({
        url: 'get_avilableQty',
        method: 'POST',
        data: {
             'empId':empId,
             'itemId':itemId
        },
        success: function(data) {
            console.log(data);
           var x = JSON.parse(data);
           console.log(x[0].qty);
           console.log(row);
           $j('#avilable_qty_'+row).val(x[0].qty);
        }
  
    }); 
}

function get_avilableQty(row){
   var empId= $j('#employee_no').val();
   var itemId= $j('#hidn_token_'+row).val();
        $j.ajax({
        url: 'get_avilableQty',
        method: 'POST',
        data: {
             'empId':empId,
             'itemId':itemId
        },
        success: function(data) {
           var x = JSON.parse(data);
           console.log(x[0].qty);
           console.log(row);
           $j('#avilable_qty_'+row).val(x[0].qty);
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
function remove_update_row(row_id) {
    if (!confirm('Are you sure you want to remove?')) {
        ev.preventDefault();
        return false;
    } else {

        var amount_remove = $j('#amount_' + row_id).val();
        var txt_total = $j('#txt_total').val();
        
        
        

        var totals = $j('#txt_total').val();
        var total1 = parseFloat(totals.replace(",", ""));
        var total2 = parseFloat(total1);



        var sumTotal = total2 - amount_remove;

        var newsumTotal = sumTotal.toLocaleString('en-US', {
            minimumFractionDigits: 2
        });
            
        $j('#txt_total').val(newsumTotal);

        $j('#row_' + row_id).remove();

        
        
    // var show_button = row_id - 1;
    //$j('#add_row_' + show_button).show();
    //         count_amount(show_button);
       
   
    //count_amount_update(row_id);
     
    //       count_amount();

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
			+ '<td><input type="text" name="item_acc_code_' + row_plus + '" id="item_acc_code_' + row_plus + '" readonly="true"></td>'
            + '<td><input type="text" name="avilable_qty_' + row_plus + '" id="avilable_qty_' + row_plus + '" readonly="true"></td>'
		    + '<td><input type="text" name="item_price_' + row_plus + '" id="item_price_' + row_plus + '" readonly="true"></td>'
            + '<td><input type="text" name="item_qty_' + row_plus + '" id="item_qty_' + row_plus + '" autocomplete="off" onkeyup="count_amount(' + row_plus + ');"></td>'
            + '<td><input type="text" name="amount_' + row_plus + '" id="amount_' + row_plus + '" readonly="true"></td>'
            + '<td><a href="#" onclick="remove_purchase_table_row(' + row_plus + ');">Remove</a></td>'
            + '</tr>'
            );
    }



}


/*
 * @author Faazy ahamed
 * @contact faaziahamed@gmail.com
 * @create 20.06.2014
 * @returns  boolean
 * 
 */


$j(function() {
    var row_count = $j('#hidden_curre_view_rows').val()
    $j('#add_row_' + row_count).show();
});
var update_row = 1;
function validateUpdateTable() {
    var i = $j('#hidden_token_row').val();
    var item = $j('#item_name_' + i).val();
    var qty = $j('#item_qty_' + i).val();
    if (item !== '' && qty !== '') {
        return true;
    } else {
        return false;
    }
}



function add_update_field_row(button_id) {
    var update_row = $j('#hidden_update_row').val();
    validateUpdateTable();
    if (validateUpdateTable() == true) {

        $j('#' + button_id).hide();
        update_row++;
        $j('#hidden_update_row').val(update_row);
        $j('#hidden_token_row').val(update_row);
        $j('#tbl_purchase_view').append(
                '<tr id="row_' + update_row + '">'
                + '<td><input type="button" name="add_row" id="add_row_' + update_row + '" value="+" onclick="add_update_field_row(this.id);"></td>'
                + '<td><input type="text" name="item_name_' + update_row + '" id="item_name_' + update_row + '" autocomplete="off" onfocus="get_product_names_mng(' + update_row + ');" placeholder="Select Product"/><input type="hidden" name="hidn_token_' + update_row + '" id="hidn_token_' + update_row + '"></td>'
                + '<td><input type="text" name="item_acc_code_' + update_row + '" id="item_acc_code_' + update_row + '" readonly="true"></td>'
                + '<td><input type="text" name="avilable_qty_' + update_row + '" id="avilable_qty_' + update_row + '" readonly="true"></td>'
				+ '<td><input type="text" name="item_price_' + update_row + '" id="item_price_' + update_row + '" readonly="true"></td>'
                + '<td><input type="text" name="item_qty_' + update_row + '" id="item_qty_' + update_row + '" autocomplete="off" onkeyup="count_amount_update(' + update_row + ');" value=0.00></td>'
                + '<td><input type="text" name="amount_' + update_row + '" id="amount_' + update_row + '" readonly="true"></td>'
                + '<td><a href="#" onclick="remove_update_row(' + update_row + ');">Remove</a></td>'
                + '</tr>'
                );
        $j('#hidden_update_row').val(update_row);
    }

//    alert(update_row1);

}



function enable_row(id) {
    var amount_remove = $j('#col_' + id).text();
    
    var amount_remove1 = parseFloat(amount_remove.replace(",", ""));
    var amount_remove2 = parseFloat(amount_remove1);
    
    
    
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
                
                
                //var txt_total = $j('#txt_total').val();
        
        
        

                var totals = $j('#txt_total').val();
                var total1 = parseFloat(totals.replace(",", ""));
                var total2 = parseFloat(total1);



                var sumTotal = total2 - amount_remove2;

                var newsumTotal = sumTotal.toLocaleString('en-US', {
                    minimumFractionDigits: 2
                });
            
                $j('#txt_total').val(newsumTotal);
                $j('#row_' + id).remove();
            //            //location.reload();
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
        var invoice_no = $j("#invoice_no_" + id).val();
        detail[0] = hidden_purchase_order;
        detail[1] = invoice_no;
        var json_cast = JSON.stringify(detail);
        if (invoice_no == '') {
            alert("Please Enter Invoice Number!");
        } else {
            $j.ajax({
                url: 'createDiliveryNote',
                method: 'POST',
                data: {
                    'data': json_cast
                },
                success: function(data) {
                    $j('#row_' + id).remove();
                    location.reload();
                },
                error: function() {
                    alert('error');
                }

            });
        }


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
            //$j('#row_' + id).remove();
            
                
            //location.reload();
            },
            error: function() {
                alert('error');
            }

        });
    }
}

function count_amount(id) {
    
    console.log(id);
    if (id !== '') {
        var price = parseFloat($j('#item_price_' + id).val());
        var qty = parseFloat($j('#item_qty_' + id).val());
        var total = parseFloat($j('#txt_total').val());

if(!(/^\d+$/.test(qty))){
    // alert("Only Numeric Values Allowed");
      $j('#item_qty_' + id).val('');
   // x.focus();
   
}else{
       
        if (qty < 0 && !isNaN(qty)) {    
            alert("Quantity Must Be a Positive Number");
            $j('#item_qty_' + id).val('');
        } else {
            //  alert("edf");
            var sumTotal = total + (price * qty);

            if (!isNaN(price) && !isNaN(qty)) {
                $j('#amount_' + id).val(parseFloat(price * qty).toFixed(2));
            }
        }
    
}

    }

    var value_row = 0;
    var row_count = $j('#hidden_token_row').val() + 1;
    row_count++;

    for (var x = 1; x < 15; x++) {
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

        var totals = $j('#txt_total').val();
        var total1 = parseFloat(totals.replace(",", ""));
        var total2 = parseFloat(total1);

//        alert(total2);


        var sumTotal = total2 + (price * qty);

      //alert(sumTotal);
        var newsumTotal = sumTotal.toLocaleString('en-US', {
            minimumFractionDigits: 2
        });
            
        
        //console.log('OldTotal = ' + total);
        //console.log('Total = ' + sumTotal);


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
        $j('#txt_total').val(newsumTotal);
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

/*
 * s added
 * 
 */
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

function getPDFPrint(tid) {
    var colne_page_test = $j('#' + tid).html();
    var pdfName = $j('#pdfNameText').val();
    var topic = $j('#topic').val();
    var overlay = jQuery();
    overlay.appendTo(document.body);
    $j.ajax({
        url: URL + 'purchase_order/reportsPDFPrint?pdfName=' + pdfName + '&topic=' + topic,
        method: 'post',
        data: {
            'key': colne_page_test
        },
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

function reportsToExcelP(table, name) {

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
/*
 * s end
 */

// +'<td><a href="#" onclick="remove_purchase_table_row('+row_plus+');">Remove</a></td>'
