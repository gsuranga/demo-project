<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$delar_name = array(
    'id' => 'delar_name',
    'name' => 'delar_name',
    'type' => 'text',
    'readonly' => 'true'
);
$delar_account_no = array(
    'id' => 'delar_account_no',
    'name' => 'delar_account_no',
    'type' => 'text',
    'readonly' => 'true'
);
$outlet_name = array(
    'id' => 'outlet_name',
    'name' => 'outlet_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_outlet();',
    'placeholder' => 'Select Outlet'
);
$total_amount = array(
    'id' => 'total_amount',
    'name' => 'total_amount',
    'type' => 'text',
    'readonly' => 'true'
);
$total_discount = array(
    'id' => 'total_discount',
    'name' => 'total_discount',
    'type' => 'text',
    'readonly' => 'true'
);
$add = array(
    'id' => 'add',
    'name' => 'add',
    'type' => 'submit',
    'value' => 'Add'
);

$reset = array(
    'id' => 'reset',
    'name' => 'reset',
    'type' => 'reset',
    'value' => 'Reset'
);
?>
<script>
    
//    function addRow(idd) {
//   
//        $j('#' + idd).hide();
//
//        var outputTbl1 = document.getElementById('tbody1');
//        var outputTbl2 = document.getElementById('tbl_purchaseorder');
//        var id = (outputTbl2.rows.length - 1);
//        if (id > 1) {
//            $j('#del_row_' + (id - 1)).hide();
//        }
//        var output = document.createElement("tr");
//        outputTbl1.appendChild(output);
//        output.innerHTML += '<td><input type="button" name="add_row_' + id + '" id="add_row_' + id + '" value="+" onclick="addRow(this.id);"></td>'
//                + '<td><input type="text" name="item_name_' + id + '" id="item_name_' + id + '" onfocus="get_product(' + id + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + id + '" id="item_id_' + id + '"><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '"></td>'
//                + '<td><input type="text" name="item_price_' + id + '" id="item_price_' + id + '" readonly="true" value="0.00"></td>'
//
//                + '<td style="width: 230px"><input type="text" name="discount_' + id + '" id="discount_' + id + '" onkeyup="count();" style="width:80px;float:right"  value="0.00"><select style="float:left; width: 120px" id="combo_id_' + id + '" name="combo_id_'+id+'"><option >Default</option><option>percentage(%)</option></select><input type="hidden" name="type_' + id + '" id="type_' + id + '" value="0"></td>'
//
//                + '<td><input type="text" name="item_qty_' + id + '" id="item_qty_' + id + '" autocomplete="off" onkeyup="count();" value="0.00"></td>'
//                + '<td><input type="text" name="amount_' + id + '" id="amount_' + id + '" readonly="true" value="0.00"></td>'
//                + '<td><input type="text" name="discuntamount_' + id + '" id="discuntamount_' + id + '" readonly="true" value="0.00"></td>'
//                + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td>';
//
//        $j('#rowCount').val(id);
//    }
function addRow(idd,y) {
    
        var id=y+1;
        $j('#' + idd).hide();
        var outputTbl1 = document.getElementById('tbody1');
        var outputTbl2 = document.getElementById('tbl_purchaseorder');
        //var id = (outputTbl2.rows.length);
//        if (id > 1) {
//            $j('#del_row_' + (id - 1)).hide();
//        }
//        var output = document.createElement("tr");
//        outputTbl1.appendChild(output);
        //////////////////******************************************************
        $j('#tbl_purchaseorder').append(
                '<tr id='+id +' name="tr_'+id+'"> '
                +'<td><input type="button" name="add_row_' + id + '" id="add_row_' + id + '" value="+" onclick="addRow(this.id,'+id+');"></td>'
                + '<td><input type="text" name="item_name_' + id + '" id="item_name_' + id + '" onfocus="get_product(' + id + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + id + '" id="item_id_' + id + '"><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '"></td>'
                +'<td><input type="text"  id="des_'+id+'" name="des_'+id+'" onfocus="getDes(' + id + ');" autocomplete="off" placeholder="Select Description"/></input></td>'
                + '<td><input type="text" name="item_price_' + id + '" id="item_price_' + id + '" readonly="true" value="0.00"></td>'

                + '<td style="width: 230px"><input type="text" name="discount_' + id + '" id="discount_' + id + '" onkeyup="count();" style="width:80px;float:right"  value="0.00"><select style="float:left; width: 120px" id="combo_id_' + id + '" name="combo_id_' + id + '" onclick="count();"><option >Default</option><option>percentage(%)</option></select><input type="hidden" name="type_' + id + '" id="type_' + id + '" value="0"></td>'

//                + '<td><input type="text" name="item_qty_' + id + '" id="item_qty_' + id + '" autocomplete="off" onkeyup="count();" value="0.00"></td>'
//                + '<td><input type="text" name="amount_' + id + '" id="amount_' + id + '" readonly="true" value="0.00"></td>'
//                + '<td><input type="text" name="discuntamount_' + id + '" id="discuntamount_' + id + '" readonly="true" value="0.00"></td>'
                + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td></tr>'
                
                );
                    $j('#updateRowCount').val(id);
                   

        /////////////////*******************************************************



//        output.innerHTML += '<td><input type="button" name="add_row_' + id + '" id="add_row_' + id + '" value="+" onclick="addRow(this.id);"></td>'
//                + '<td><input type="text" name="item_name_' + id + '" id="item_name_' + id + '" onfocus="get_product(' + id + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + id + '" id="item_id_' + id + '"><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '"></td>'
//                + '<td><input type="text" name="item_price_' + id + '" id="item_price_' + id + '" readonly="true" value="0.00"></td>'
//
//                + '<td style="width: 230px"><input type="text" name="discount_' + id + '" id="discount_' + id + '" onkeyup="count();" style="width:80px;float:right"  value="0.00"><select style="float:left; width: 120px" id="combo_id_' + id + '" name="combo_id_' + id + '" onclick="count();"><option >Default</option><option>percentage(%)</option></select><input type="hidden" name="type_' + id + '" id="type_' + id + '" value="0"></td>'
//
//                + '<td><input type="text" name="item_qty_' + id + '" id="item_qty_' + id + '" autocomplete="off" onkeyup="count();" value="0.00"></td>'
//                + '<td><input type="text" name="amount_' + id + '" id="amount_' + id + '" readonly="true" value="0.00"></td>'
//                + '<td><input type="text" name="discuntamount_' + id + '" id="discuntamount_' + id + '" readonly="true" value="0.00"></td>'
//                + '<td><input type="button" id="del_row_' + id + '" name="del_row_' + id + '" value="-" onclick="deleteRow(' + id + ');"></td>';
//        $j('#rowCount').val(id);
    }
//    function deleteRow(id) {
//        var table = document.getElementById('tbl_purchaseorder');
//        table.deleteRow(id);
//        var idd = (table.rows.length - 2);
//        $j('#add_row_' + idd).show();
//        if (idd > 1) {
//            $j('#del_row_' + (idd)).show();
//        }
//        $j('#rowCount').val(idd);
//        count();
//        loadFreeItem();
//    }
function deleteRow(id) {
//        var table = document.getElementById('tbl_purchaseorder');
//        table.deleteRow(id);
//        var idd = (table.rows.length - 1);

        $j('#' + id).remove();
        var table = document.getElementById('tbl_purchaseorder');
        var idd = (table.rows.length);
        var ck=idd-1;
       
        var row = table.rows[idd-1];
            var i=row.id;
           
        $j('#add_row_' + (i)).show();
        if(ck===0){
            $j('#tbl_purchaseorder').append(
                                '<tr id=' + 1 + ' name="tr_'+1+'">'
                                + '<td><input type="button" name="add_row_' + 1 + '" id="add_row_' + 1 + '" value="+" onclick="addRow(this.id,'+1+');" ></td>'
                                + '<td><input type="text" name="item_name_' + 1 + '" id="item_name_' + 1 + '" value="" onfocus="get_product(' + 1 + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + 1 + '" id="item_id_' + 1 + '">'
                                + '<input type="text" name="item_id2_' + 1 + '" id="item_id2_' + 1 + '" value=""></td>'
                                +'<td><input type="text" readonly="true" id="des_'+id+'" name="des_'+id+'"></input></td>'
                                + '<td><input type="text" name="item_price_' + 1 + '" id="item_price_' + 1 + '" value="0.00" readonly="true" value="0.00"></td>'
                                + '<td style="width: 230px">'
                                + '<select style="float:left; width: 120px" id="combo_id_' + 1 + '" name="combo_id_' + 1 + '" onclick="count();"><option >Default</option><option >percentage(%)</option></select>'
                                + '<input type="text" name="discount_' + 1 + '" id="discount_' + 1 + '" value="0.00" onkeyup="count();" style="width:80px;float:right"  value="0.00"><input type="hidden" name="type_' + 1 + '" id="type_' + 1 + '" value="0">'
                                + '</td>'
//                                + '<td><input type="text" name="item_qty_' + 1 + '" id="item_qty_' + 1 + '"  autocomplete="off" value="0.00" onkeyup="count();" ></td>'
//                                + '<td><input type="text" name="amount_' + 1 + '" id="amount_' + 1 + '" readonly="true" value="0.00">'
                                + ' <input type="hidden" id="rowCount" name="rowCount" value="1"/>'
                                + '<input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>'
                                + '<input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place'); ?>"/>'
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

   
//    function count() {
//        var table = document.getElementById('tbl_purchaseorder');
//        var idd = (table.rows.length - 1);
//        var total = 0;
//         var totDiscount=0;
//
//        for (var i = 1; i < idd; i++) {
//            var price = 0;
//            var qty = 0;
//            var amount = 0;
//            var discount_amount = 0;
//           
//
//
//            var discount = $j('#discount_' + i).val();
//
//            var discount_type = $j('#type_' + i).val();
////            if (parseFloat(discount.trim()) != "0.00") {
////                if ((discount_type).trim() == "2") {
////                    price = ((100 * parseFloat($j('#item_price_' + i).val().trim())) - (parseFloat($j('#item_price_' + i).val().trim()) * parseFloat(discount.trim()))) / 100;
////                } else if ((discount_type).trim() == "1") {
////                    price = parseFloat($j('#item_price_' + i).val().trim()) - parseFloat(discount.trim());
////                } else if ((discount_type).trim() == "0") {
////                    price = parseFloat($j('#item_price_' + i).val().trim());
////                }
////            } else {
//                price = parseFloat($j('#item_price_' + i).val().trim());
//           // }
//            qty = $j('#item_qty_' + i).val();
//
//            var checkDiscount = $j('#combo_id_' + i + ' option:selected').val();
//            if (checkDiscount === "Default") {
//                amount = (price * qty);
//                discount_amount = discount * qty;
//
//                $j('#amount_' + i).val(amount);
//                $j('#discuntamount_' + i).val(discount_amount);
//
//                totDiscount=totDiscount+discount_amount;
//                total = (total + amount) - discount_amount;
//                
//            }else{
//                amount = (price * qty);
//                discount_amount = (price*discount)/100 * qty;
//
//                $j('#amount_' + i).val(amount);
//                $j('#discuntamount_' + i).val(discount_amount);
//
//                totDiscount=totDiscount+discount_amount;
//                total = (total + amount) - discount_amount;
//                
//            }
//
//
//        }
//        $j('#total').val(total);
//        $j('#total_amount').val(total);
//        $j('#total_discount').val(totDiscount);
//       
//
//
//
//    }
function count() {
        var table = document.getElementById('tbl_purchaseorder');
        var idd = (table.rows.length);
        ///*******************************************************
        
        ///*******************************************************
        var total = 0;
        var totDiscount = 0;
        for (var k = 1; k < idd; k++) {
            var row = table.rows[k];
            var i=row.id;
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
    function loadFreeItem() {
        count();
//        var outputTbl2 = document.getElementById('tbl_purchaseorder');
//        var id = (outputTbl2.rows.length - 2);
//        $j('#free_item_table').html('<thead><tr><td>ID</td><td>Product</td><td>QTY</td></tr></thead>');
//        var qty2 = 0;
//
//        for (var idd = 1; idd <= id; idd++) {
//            var qty = 0;
//            var item_id = $j('#item_id2_' + idd).val();
//            var item_qty = $j('#item_qty_' + idd).val();
//
//            $j.ajax({
//                type: 'POST',
//                url: 'loadFreeItem',
//                data: {
//                    'item_id': item_id,
//                    'item_qty': item_qty
//                },
//                success: function(data) {
//                    var item_id = data.split('`')[0].trim();
//                    var product = data.split('`')[1].trim();
//                    var qty = data.split('`')[2].trim();
//                    var outputTbl = document.getElementById('free_item_table');
////
//                    if ((outputTbl.rows.length) != 1) {
////
//                        for (var i = 1; i <= (outputTbl.rows.length - 1); i++) {
//                            $j('#freeitemCount').val(i);
//
////
////
////                            var idd2 = outputTbl.rows[i].cells[0].innerHTML;
////                            var product2 = outputTbl.rows[i].cells[1].innerHTML;
////
////                            if (parseInt(idd2) === parseInt(item_id)) {
////                                qty2 = parseInt(outputTbl.rows[i].cells[2].innerHTML) + parseInt(qty2);
////                                $j('#' + idd2).remove();
////                                $j('#free_item_table').append("<tr id=" + idd2 + "><td>" + idd2 + "</td><td>" + product2 + "</td><td>" + parseInt(qty2) + "</td></tr>");
//                            } else if (parseInt(idd2) !== parseInt(item_id)) {
//                                $j('#' + item_id).remove();
//                                $j('#free_item_table').append("<tr id=" + item_id + "><td>" + item_id + "</td><td>" + product + "</td><td>" + parseInt(qty) + "</td></tr>");
////                            }
//                            $j('#' + item_id).remove();
//                            $j('#free_item_table').append("<tr id=" + item_id + "><td><input type='text' id='item_idd_" + i + "' name='item_idd_" + i + "' value='" + item_id + "'/></td><td><input type='text' value='" + product + "'/></td><td><input type='text' id='qty2_" + i + "' name='qty2_" + i + "' value='" + parseInt(qty) + "'/></td></tr>");
//
//                        }
////
//                    } else {
//                        $j('#' + item_id).remove();
//                        $j('#freeitemCount').val("1");
//                        $j('#free_item_table').append("<tr id=" + item_id + "><td><input type='text' id='item_idd_1' name='item_idd_1' value='" + item_id + "'/></td><td><input type='text' value='" + product + "'/></td><td><input type='text' id='qty2_1' name='qty2_1' value='" + parseInt(qty) + "'/></td></tr>");
//                    }
//
//
//                },
//                error: function() {
//
//                }
//            });
//
//        }
    }

</script>
<?php echo form_open('speciol_pramotion/addSpeciolPramotion'); ?>
<?php  ?>
<table width="100%">
    <table border="0" width="100%">

        <tbody>
            <tr>
                <td><input type="hidden" id="outletID" name="outletID"></input></td>
                <td><input type="hidden" id="salesOfficerID" name="salesOfficerID"></input></td>
        <input type="hidden" id="updateRowCount" name="updateRowCount" value="1"></input>
                <td>Description</td>
                <td><textarea id="description" name="description" class="input" cols="35" rows="5"></textarea></td>
                <td align="right">

                    <table border="0"width="100%">

                        <tbody>
                            <tr>
                                <td>Start Date</td>
                                <td><input type="text" id="start_date_mr" name="start_date_mr" /></td>
                            </tr>
<!--                            <tr>
                                <td>Delar Name</td>
                                <td><?php echo form_input($delar_name) ?></td>
                            </tr>
                            <tr>
                                <td>Delar Account No</td>
                                <td><?php echo form_input($delar_account_no) ?></td>
                            </tr>-->


                        </tbody>
                    </table>

                </td>
                <td>
                    <table border="0"width="100%">

                        <tbody>
                            <tr>
                                <td>End Date</td>
                                <td><input type="text" id="end_date_mr" name="end_date_mr" /></td>
                           



                        </tbody>
                    </table>

                </td>

            </tr>
            
            <table  align="center"  >
        <td align="center">
            <?php echo $this->session->flashdata('insert_item1'); ?>
            <?php echo validation_errors(TRUE); ?>
        </td>
    </table>
        <table width="100%" cellpadding="10"><tr style="background-color: #3399CC;color: #FFFFFF;font-weight:bold" ><td>Add Items</td></tr></table><br>
        <table width="100%" class="SytemTable" align="center" id="tbl_purchaseorder" cellpadding="10">
            <thead>
                <tr>
                    <td></td>
                    <td>Part No</td>
                    <td>Description</td>
                    <td>Item Price</td>
                    <td>Discount</td>

                    <td>Remove</td>
                </tr>
            </thead>
            <tbody id="tbody1">
                <tr  name="1" id="1">
                    <td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="addRow(this.id,1);" ></td>
                    <td><input type="text" name="item_name_1" id="item_name_1" onfocus="get_product(1);" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_1" id="item_id_1">
                        <input type="hidden" name="item_id2_1" id="item_id2_1"></td>
                    <td><input  id="des_1" name="des_1" type="text"  onfocus="getDes(1);" autocomplete="off" placeholder="Select Description"></input></td>
                    <td><input type="text" name="item_price_1" id="item_price_1" readonly="true" value="0.00"></td>
                    <td style="width: 230px">
                        <select style="float:left; width: 120px" id="combo_id_1" name="combo_id_1"><option >Default</option><option>percentage(%)</option></select>
                        <input type="text" name="discount_1" id="discount_1" onkeyup="count();" style="width:80px;float:right"  value="0.00"><input type="hidden" name="type_1" id="type_1" value="0">
                    </td>
                    <!--<td><input type="text" name="item_qty_1" id="item_qty_1" autocomplete="off" value="0.00" onkeyup="count();" ></td>-->
                    <!--<td><input type="text" name="amount_1" id="amount_1" readonly="true" value="0.00">-->
                        <input type="hidden" id="rowCount" name="rowCount" value="1"/>
                        <input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>
                        <input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place'); ?>"/>
                    </td>
                    <!--<td><input type="text" name="discuntamount_1" id="discuntamount_1" readonly="true" value="0.00"></td>-->
                    <td></td>

                </tr></tbody>
<!--            <tfoot>
                <tr id="row_1">
                    <td colspan="4" style="text-align: right;">Total</td>
                    <td><input type="text" name="total" id="total" readonly="true"></td>
                </tr>
            </tfoot>-->
        </table><br><br>

        <table width="100%">
            <tr>

                <td align="right"><?php echo form_input($add); ?>&ensp;<?php echo form_input($reset); ?></td>
            </tr>
        </table>

        </tr>   
        
       





    </table>
    <?php echo form_close();?>