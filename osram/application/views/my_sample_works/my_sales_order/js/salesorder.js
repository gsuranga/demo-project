//$j(function() {
//
//    $j("#tabs").tabs();
//     
//});



function addRow(idd){


    $j('#' + idd).hide();

    var outputTbl1 = document.getElementById('tbody1');
    var outputTbl2 = document.getElementById('tbl_salesorder');
    var id = (outputTbl2.rows.length - 1);
    if (id > 0) {
        $j('#del_row_' + (id - 1)).hide();
    }
    var output = document.createElement("tr");
    outputTbl1.appendChild(output);
    output.innerHTML += '<td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="addRow(this.id);"></td>'
//    <input type="button" name="add_row_' + id + '" id="add_row_' + id + '" value="+" onclick="addRow(this.id);">
  
            + '<td><input type="text" name="item_name_' + id + '" id="item_name_' + id + '" onfocus="get_product(' + id + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + id + '" id="item_id_' + id + '"><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '"></td>'
            + '<td><input type="text" name="item_price_' + id + '" id="item_price_' + id + '" readonly="true" value="0.00"><input type="hidden" name="dis_price_' + id + '" id="dis_price_' + id + '"></td>'
            +'<td><input type="text" name="item_abls_qty_' + id + '" id="item_abls_qty_' + id + '"  readonly="true"></td>'
            + '<td><input type="text" name="item_qty_' + id + '" id="item_qty_' + id + '" autocomplete="off" onkeyup="countAmount(' + id + ');" value="0.00"></td>'
//            + '<td><input style="position: relative;top: 10px;margin: 0;" type="text" name="discount_' + id + '" id="discount_' + id + '" onkeyup="getDiscount(' + id + ');" value="0.00"><div style="position: relative;top: 10px;margin: 0;">as %<input  style="position: relative;top: 4px;margin: 0;" type="checkbox" checked="true" name="cmb_dis_' + id + '" id="cmb_dis_' + id + '" ></div><input type="hidden" value="0" name="type_' + id + '" id="type_' + id + '"></td>'
            + '<td><input type="text" name="amount_' + id + '" id="amount_' + id + '" readonly="true" value="0.00"></td>'
//            + '<td><input type="text" name="discuntamount_' + id + '" id="discuntamount_' + id + '" readonly="true" value="0.00"></td>'
            + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td>';

    $j('#rowCount').val(id);
    $j('#sales_rows_token').val(id);

    
}



//function get_product(id) {
//        $j("#item_name_" + id).autocomplete({
//            source: "getProduct",
//            width: 265,
//            selectFirst: true,
//            minlength: 1,
//            dataType: "jsonp",
//            select: function(event, data) {
//
//                $j('#item_price_' + id).val(data.item.product_price);
//                $j('#item_id_' + id).val(data.item.id_products);
//                $j('#item_id2_' + id).val(data.item.iditem);
//
////                $j('#discount_' + id).val($j('#discount').val());
//                $j('#type_' + id).val($j('#type').val());
//                get_current_stock1(id, data.item.id_products);
//            }
//        });
//
//
//    }
//
//function getItemName(){
//    alert("Kanchu");
//$("#txt").autocomplete({
//        source:"getItemName",
//        autoFocus:true,
//        minLength:1,  
//        select: function(event, ui){}
//    });
//    }
//    


function getItemName() {

    $j("#item_name_1").autocomplete({
        source: "getItemName",
        width: 265,
        selectFirst: true,
        minlength: 1,
        dataType: "jsonp",
        select: function(event, data) {
            

        }
    });
}

 function deleteRow(id) {
        var table = document.getElementById('tbl_salesorder');
        table.deleteRow(id);
        var idd = (table.rows.length - 2);
        $j('#add_row_' + idd).show();
        if (idd > 1) {
            $j('#del_row_' + (idd)).show();
        }
        $j('#rowCount').val(idd);
        count();

    }
    
var item_exsits = [];
function getItemValues(id){
 //  alert("Kanchu");
    
    $("#item_name_text"+id).autocomplete({
        
        source: "getItemNameValues?json_data="+ item_exsits,
        autoFocus:true,
        minLength:1,
        select: function(event, ui){
            $('#item_id'+id).val(ui.item.itemId);   
         $('#unitprice_txt'+id).val(ui.item.unitPrice);
         $('#qtyTxt_'+id).val(ui.item.quantity);
        }
   
    });
}