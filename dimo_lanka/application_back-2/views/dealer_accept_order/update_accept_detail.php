<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$sales_account_no = array(
    'id' => 'sales_account_no',
    'name' => 'sales_account_no',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->sales_officer_account_no
);
$sales_officer_name_suggest = array(
    'id' => 'sales_officer_name_suggest',
    'name' => 'sales_officer_name_suggest',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->sales_officer_name
);
$delar_name = array(
    'id' => 'delar_name',
    'name' => 'delar_name',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->delar_name
);
$delar_account_no = array(
    'id' => 'delar_account_no',
    'name' => 'delar_account_no',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->delar_account_no
);
$outlet_name1 = array(
    'id' => 'outlet_name1',
    'name' => 'outlet_name1',
    'type' => 'text',
    'autocomplete' => 'off',
    'readonly' => 'true',
    'value' => $extraData[0]->delar_shop_name
);
$total_amount1 = array(
    'id' => 'total_amount1',
    'name' => 'total_amount1',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->amount
);
$total_discount1 = array(
    'id' => 'total_discount',
    'name' => 'total_discount',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->without_vat
);
$add = array(
    'id' => 'add',
    'name' => 'add',
    'type' => 'button',
    'onclick' => 'addDelearAcc();',
    'value' => 'Accept'
);

$reset = array(
    'id' => 'reset',
    'name' => 'reset',
    'type' => 'reset',
    'value' => 'Reset'
);
?>

<form name="tvc_form" id="tvc_form"> 
    <script>


        $j(document).ready(function() {


            $j.ajax({
                url: 'getPurchaseOrderDetail?so_idd=' + $j('#sopoid').val(),
                method: 'GET',
                success: function(data) {

                    console.log(data);
                    var ik = 1;
                    var dtype = '';
                    jQuery.each(data, function(index, value) {


                        if (ik > 1) {
                            $j('#add_row_' + (ik - 1)).hide();
                        }
//                        if (this['discount_type'] < 1) {
//                            dtype = "Default";
                            $j('#tbl_purchaseorder').append(
                                    '<tr id=' + ik + ' name="tr_' + ik + '">'

                                    + '<td><input type="hidden" value="0" id="delete_' + ik + '" name="delete_' + ik + '"></input><input type="hidden" name="orderdetail_' + ik + '" id="orderdetail_' + ik + '"value="' + this['purchase_order_detail_id'] + '" ></input><input readonly="true" type="text" name="item_name_' + ik + '" id="item_name_' + ik + '" value="' + this['item_part_no'] + '" onfocus="get_product(' + ik + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + ik + '" id="item_id_' + ik + '">'
                                    +'<td> <input type="text" value="'+this['description']+'" readonly="true"></></td>'
                                    + '<input type="hidden" name="item_id2_' + ik + '" id="item_id2_' + ik + '" value="' + this['item_id'] + '"></td>'
                                    + '<td><input type="text" name="item_price_' + ik + '" id="item_price_' + ik + '" value="' +this['unit_price']+ '" readonly="true" value="0.00"></td>'
//                                    + '<td style="width: 230px">'
//                                    + '<select disabled style="float:left; width: 120px" id="combo_id_' + ik + '" name="combo_id_' + ik + '" onclick="count();"><option selected="selected">' + dtype + '</option><option >percentage(%)</option></select>'
//                                    + '<input readonly="true" type="text" name="discount_' + ik + '" id="discount_' + ik + '" value="' + this['discount'] + '" onkeyup="count();" style="width:80px;float:right"  value="0.00"><input type="hidden" name="type_' + ik + '" id="type_' + ik + '" value="0">'
//                                    + '</td>'
                                    + '<td><input type="text" name="item_qty_' + ik + '" id="item_qty_' + ik + '" value="' + this['item_qty'] + '" autocomplete="off" value="0.00" onkeyup="count();" ></td>'
//                                    + '<td><input type="text" name="amount_' + ik + '" id="amount_' + ik + '" readonly="true" value="0.00">'
                                    + ' <input type="hidden" id="rowCount" name="rowCount" value="1"/>'
                                    + '<input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>'
                                    + '<input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place'); ?>"/>'
                                    + '</td>'
//                                    + '<td><input type="text" name="discuntamount_' + ik + '" id="discuntamount_' + ik + '" readonly="true" value="0.00"></td>'
//                                    + '<td><input type="button" id="del_row_' + ik + '" name="del_row_' + ik + '" value="-" onclick="deleteRow(' + ik + ');"></td>'

                                    + ' </tr>'
                                    );
                            $j('#updateRowCount').val(ik);
                            //count();
                            ik = ik + 1;


//                        } else {
//                            dtype = "percentage(%)";
//                            $j('#tbl_purchaseorder').append(
//                                    '<tr id=' + ik + ' name="tr_' + ik + '">'
//
//                                    + '<td><input type="hidden" value="0" name="delete_' + ik + '" id="delete_' + ik + '"></input><input type="hidden" name="orderdetail_' + ik + '" id="orderdetail_' + ik + '"value="' + this['purchase_order_detail_id'] + '" ></input><input type="text" readonly="true" name="item_name_' + ik + '" id="item_name_' + ik + '" value="' + this['item_part_no'] + '" onfocus="get_product(' + ik + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + ik + '" id="item_id_' + ik + '">'
//                                    + '<input type="hidden" name="item_id2_' + ik + '" id="item_id2_' + ik + '" value="' + this['item_id'] + '"></td>'
//                                    + '<td><input type="text" name="item_price_' + ik + '" id="item_price_' + ik + '" value="' + this['unit_price'] + '" readonly="true" value="0.00"></td>'
//                                    + '<td style="width: 230px">'
//                                    + '<select disabled style="float:left; width: 120px" id="combo_id_' + ik + '" name="combo_id_' + ik + '" onclick="count();"><option selected="selected">' + dtype + '</option><option >Default</option></select>'
//                                    + '<input readonly="true" type="text" name="discount_' + ik + '" id="discount_' + ik + '" value="' + this['discount'] + '" onkeyup="count();" style="width:80px;float:right"  value="0.00"><input type="hidden" name="type_' + ik + '" id="type_' + ik + '" value="0">'
//                                    + '</td>'
//                                    + '<td><input type="text" name="item_qty_' + ik + '" id="item_qty_' + ik + '" value="' + this['item_qty'] + '" autocomplete="off" value="0.00" onkeyup="count();" ></td>'
//                                    + '<td><input type="text" name="amount_' + ik + '" id="amount_' + ik + '" readonly="true" value="0.00">'
//                                    + ' <input type="hidden" id="rowCount" name="rowCount" value="1"/>'
//                                    + '<input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>'
//
//                                    + '</td>'
//                                    + '<td><input type="text" name="discuntamount_' + ik + '" id="discuntamount_' + ik + '" readonly="true" value="0.00"></td>'
//                                    + '<td><input type="button" id="del_row_' + ik + '" name="del_row_' + ik + '" value="-" onclick="deleteRow(' + ik + ');"></td></td>'
//
//                                    + ' </tr>'
//                                    );
//                            $j('#updateRowCount').val(ik);
//                            count();
//                            ik = ik + 1;
//
//
//                        }


                    });
                }

            });

        });
        function addRow(idd, y) {

            var id = y + 1;
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
                    '<tr id=' + id + ' name="tr_' + id + '"> '

                    + '<td><input type="text" name="item_name_' + id + '" id="item_name_' + id + '" onfocus="get_product(' + id + ');" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_' + id + '" id="item_id_' + id + '"><input type="hidden" name="item_id2_' + id + '" id="item_id2_' + id + '"></td>'
                    + '<td><input type="text" name="item_price_' + id + '" id="item_price_' + id + '" readonly="true" value="0.00"></td>'

                    + '<td style="width: 230px"><input type="text" name="discount_' + id + '" id="discount_' + id + '" onkeyup="count();" style="width:80px;float:right"  value="0.00"><select style="float:left; width: 120px" id="combo_id_' + id + '" name="combo_id_' + id + '" onclick="count();"><option >Default</option><option>percentage(%)</option></select><input type="hidden" name="type_' + id + '" id="type_' + id + '" value="0"></td>'

                    + '<td><input type="text" name="item_qty_' + id + '" id="item_qty_' + id + '" autocomplete="off" onkeyup="count();" value="0.00"></td>'
                    + '<td><input type="text" name="amount_' + id + '" id="amount_' + id + '" readonly="true" value="0.00"></td>'
                    + '<td><input type="text" name="discuntamount_' + id + '" id="discuntamount_' + id + '" readonly="true" value="0.00"></td>'
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

        function get_product(id) {
            console.log('drt')
            $j("#item_name_" + id).autocomplete({
                source: "getProduct",
                width: 265,
                selectFirst: true,
                minlength: 1,
                dataType: "jsonp",
                select: function(event, data) {

                    $j('#item_price_' + id).val(data.item.selling_price);
                    // $j('#item_id_' + id).val(data.item.item_id);
                    $j('#item_id2_' + id).val(data.item.item_id);
                    //
                    //                $j('#discount_' + id).val($j('#discount').val());
                    //                $j('#type_' + id).val($j('#type').val());
                }
            });
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
            $j('#total_amount1').val(total);
            $j('#total_discount').val(totDiscount);

        }

        function loadFreeItem() {

            count();
        }

    </script>


    <style>

    </style>


    <input type="hidden" id="sopoid" name="sopoid" value="<?php echo $_REQUEST['accc']; ?>"/>
    <input type="hidden" id="updateRowCount" name="updateRowCount"></input>
    <table width="100%">
        <table border="0" width="100%">

            <tbody>
                <tr>
                    <td><input type="hidden" id="outletID" name="outletID"></input></td>
                    <td><input type="hidden" id="salesOfficerID" name="salesOfficerID"></input></td>
                    <td><table>
                            <tr>
                                <td>Sales Officer Account No</td>
                                <td><?php echo form_input($sales_account_no) ?></td>
                            </tr>
                            <tr>
                                <td>Sales Officer Name</td>
                                <td><?php echo form_input($sales_officer_name_suggest) ?></td>
                            </tr>
                        </table></td>

                    <td align="right">

                        <table border="0"width="100%">

                            <tbody>
                                <tr>
                                    <td>Outlet</td>
                                    <td><?php echo form_input($outlet_name1) ?></td>
                                </tr>
                                <tr>
                                    <td>Delar Name</td>
                                    <td><?php echo form_input($delar_name) ?></td>
                                </tr>
                                <tr>
                                    <td>Delar Account No</td>
                                    <td><?php echo form_input($delar_account_no) ?></td>
                                </tr>


                            </tbody>
                        </table>

                    </td>
                    <td>
                        <table border="0"width="100%">

                            <tbody>
                                <tr>
                                    <td>Total Amount With Discount</td>
                                    <td><?php echo form_input($total_discount1) ?></td>
                                </tr>
                                <tr>
                                    <td>Total Amount With Vat</td>
                                    <td><?php echo form_input($total_amount1) ?></td>
                                </tr>



                            </tbody>
                        </table>

                    </td>

                </tr>

        </table>
        <table width="100%" cellpadding="10"><tr style="background-color: #3399CC;color: #FFFFFF;font-weight:bold" ><td>Add Items</td></tr></table><br>


        <table width="100%" class="SytemTable" align="center" id="tbl_purchaseorder" cellpadding="10">
            <thead>
                <tr>

                    <td>Part No</td>
                    <td>Description</td>
                    <td>Retail Price</td>
                    <td>Quantity</td>
                    
                   
                </tr>
            </thead>
            <tbody id="tbody1">
    <!--            <tr>
                    <td><input type="button" name="add_row_1" id="add_row_1" value="+" onclick="addRow(this.id);" ></td>
                    <td><input type="text" name="item_name_1" id="item_name_1" onfocus="get_product(1);" autocomplete="off" placeholder="Select Product"/><input type="hidden" name="item_id_1" id="item_id_1">
                        <input type="hidden" name="item_id2_1" id="item_id2_1"></td>
                    <td><input type="text" name="item_price_1" id="item_price_1" readonly="true" value="0.00"></td>
                    <td style="width: 230px">
                        <select style="float:left; width: 120px" id="combo_id_1" name="combo_id_1"><option >Default</option><option>percentage(%)</option></select>
                        <input type="text" name="discount_1" id="discount_1" onkeyup="count();" style="width:80px;float:right"  value="0.00"><input type="hidden" name="type_1" id="type_1" value="0">
                    </td>
                    <td><input type="text" name="item_qty_1" id="item_qty_1" autocomplete="off" value="0.00" onkeyup="count();" ></td>
                    <td><input type="text" name="amount_1" id="amount_1" readonly="true" value="0.00">
                        <input type="hidden" id="rowCount" name="rowCount" value="1"/>
                        <input type="hidden" id="freeitemCount" name="freeitemCount" value="1"/>
                        <input type="hidden" id="id_employee_has_place" name="id_employee_has_place" value="<?php echo set_value('id_employee_has_place'); ?>"/>
                    </td>
                    <td><input type="text" name="discuntamount_1" id="discuntamount_1" readonly="true" value="0.00"></td>
                    <td></td>
    
                </tr>-->

            </tbody>



        </table>


    </table>

    <table  style="float:right ">
        <tr style="left: 100px">
            <td >

                <?php echo form_input($add) ?>
            </td>
        </tr>

    </table>









</table>
</form>
