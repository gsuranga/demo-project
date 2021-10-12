<?php
/*
 * create by Insaf Zakariya
 * email :- insaf.zak@gmail.com
 */

$sales_account_no = array(
    'id' => 'sales_account_no',
    'name' => 'sales_account_no',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->sales_officer_account_no
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
    'value' => $extraData[0]->total_discount
);
$newtotal_amount1 = array(
    'id' => 'newtotal_amount1',
    'name' => 'newtotal_amount1',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->amount,
    'style' => 'border-color: #3399CC'
);
$newtotal_discount1 = array(
    'id' => 'newtotal_discount',
    'name' => 'newtotal_discount',
    'type' => 'text',
    'readonly' => 'true',
    'value' => $extraData[0]->total_discount,
    'style' => 'border-color: #3399CC'
);
$add = array(
    'id' => 'add',
    'name' => 'add',
    'type' => 'button',
    'value' => 'Accept',
    'onclick' => 'createAcceptOrder();'
);
$reject = array(
    'id' => 'reject',
    'name' => 'reject',
    'type' => 'button',
    'value' => 'Reject',
    'onclick' => 'rejectOrder();'
);
?>

<?php echo form_open('sales_officer_pur_ord/updatePurchaseOrder'); ?>
<script>


    $j(document).ready(function() {


        $j.ajax({
            url: 'getPurchaseOrderDetail?so_idd=' + $j('#sopoid').val(),
            method: 'GET',
            success: function(data) {
                var distype = '';
                var dis = 0;
                var i = 1;

                // console.log('ol' + data.length);
                var ik = 1;
                var dtype = '';
                jQuery.each(data, function(index, value) {

                    if (this['discount_type'] < 1) {
                        distype = '/-';
                        dis = 0;
                    } else {
                        distype = '%';
                        dis = 1;
                    }
                    $j('#tbl_deliverorder').append(
                            '<tr style="height:1px"><td id="item_part_' + i + '">' + this['item_part_no'] + '<input id="item_id_' + i + '" name="item_id_' + i + '" type="hidden" value="' + this['item_id'] + '"></input></td><td>' + this['description'] + '</td><td align="right">' + this['unit_price'] + '<input id="unit_price_' + i + '" name="unit_price_' + i + '" type="hidden" value="' + this['unit_price'] + '"></input></td><td style="text-align="right"">' + this['discount'] + '<input id="discount_' + i + '" name="discount_' + i + '" type="hidden" value="' + this['discount'] + '"></input></td><td style="width:5px">' + distype + '<input id="discount_type_' + i + '" name="discount_type' + i + '" type="hidden" value="' + dis + '"></input></td><td align="right">' + this['qty'] + '<input id="qty_' + i + '" name="qty_' + i + '" type="hidden" value="' + this['qty'] + '"></input></td align="right"><td style="width:150px;"><input id="new_qty_' + i + '" name="new_qty_' + i + '"  style="border-color: #3399CC;" type="text" align="right" value="' + this['qty'] + '" onkeyup="count(' + i + ');"></></td></tr>'

                            );
                    i = i + 1;

                });
            }
        });

    });

    function createAcceptOrder() {
        if (!confirm('Are you sure you want to Accept?')) {
            ev.preventDefault();
            return false;
        } else {
            //  var outputTbl1 = document.getElementById('tbody1');
            var table = document.getElementById('tbl_deliverorder');
            var idd = (table.rows.length);
            var orderid = $j('#sopoid').val();
            var amount = $j('#newtotal_amount1').val();
            var totDiscount = $j('#newtotal_discount').val();



            var deliverdetails = {};
            var deliverdetail = [];
            deliverdetails.deliverdetail = deliverdetail;

            for (var k = 1; k < idd; k++) {
                // console.log($j('#item_id_'+k).val());
                var itemID = $j('#item_id_' + k).val();
                var unitPrice = $j('#unit_price_' + k).val();
                var discount = $j('#discount_' + k).val();
                var disType = $j('#discount_type_' + k).val();
                var qty = $j('#qty_' + k).val();
                var new_qty = $j('#new_qty_' + k).val();

                // console.log($j('#unit_price_'+k).val());
//            console.log($j('#discount_'+k).val());
//            console.log($j('#discount_type_'+k).val());
//            console.log($j('#qty_'+k).val());
//            console.log($j('#new_qty_'+k).val());

                var deliverDetail2 = {
                    "itemID": itemID,
                    "unitPrice": unitPrice,
                    "discount": discount,
                    "disType": disType,
                    "qty": qty,
                    "new_qty": new_qty
                }
                deliverdetails.deliverdetail.push(deliverDetail2);
                // console.log('kjhl'+deliverdetails);


            }

            $j.ajax({
                url: 'addDeliverOrder?orderID=' + orderid + '& amount=' + amount + ' & totDiscount=' + totDiscount + ' ',
                type: 'POST',
                data: deliverdetails,
                success: function(data) {

                    window.opener.location.reload();
                    window.close();

                }


            });
        }

    }

    function count(id) {


        //////////////////************************************////////////////////////
        var table = document.getElementById('tbl_deliverorder');
        var idd = (table.rows.length - 1);

        var total = 0;
        var totDiscount = 0;

        for (var id = 1; id <= idd; id++) {
            var k = $j('#discount_type_' + id).val();
           
            if (k < 1) {
                
                var unitPrice = $j('#unit_price_' + id).val();
                var discount = $j('#discount_' + id).val();
                var newQty = $j('#new_qty_' + id).val();
                totDiscount = totDiscount + (newQty * discount);
                
                total = total + ((unitPrice * newQty) - (newQty * discount));
            } else {
                
                var unitPrice = $j('#unit_price_' + id).val();
                var discount = $j('#discount_' + id).val();
                var newQty = $j('#new_qty_' + id).val();
                total = total + ((unitPrice * newQty) - (unitPrice * newQty * discount / 100));
                totDiscount = totDiscount + (unitPrice * newQty * discount / 100);
            }

        }
        $j('#newtotal_amount1').val(total);
        $j('#newtotal_discount').val(totDiscount);





    }

</script>


<input type="hidden" id="sopoid" name="sopoid" value="<?php echo $_REQUEST['accc']; ?>"/>
<input type="hidden" id="updateRowCount" name="updateRowCount"></input>
<table width="100%">
    <table border="0" width="100%">

        <tbody>

            <tr>
                <td><input type="hidden" id="outletID" name="outletID"></input></td>
                <td><input type="hidden" id="salesOfficerID" name="salesOfficerID"></input></td>
                <td><font color="blue"><?php echo $extraData[0]->sales_officer_name ?></font></td>
                <td> Acc No</td>
                <td><?php echo form_input($sales_account_no) ?></td>
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
                                <td>Total Amount</td>
                                <td><?php echo form_input($total_amount1) ?></td>
                            </tr>
                            <tr>
                                <td>Total Discount</td>
                                <td><?php echo form_input($total_discount1) ?></td>
                            </tr>
                            <tr>
                                <td><font color="blue">New Amount</font></td>
                                <td><?php echo form_input($newtotal_amount1) ?></td>
                            </tr>
                            <tr>
                                <td><font color="blue">New Discount</font></td>
                                <td><?php echo form_input($newtotal_discount1) ?></td>
                            </tr>



                        </tbody>
                    </table>

                </td>

            </tr>
    </table>
    <table width="100%" cellpadding="10"><tr style="background-color: #3399CC;color: #FFFFFF;font-weight:bold" ><td>Detail</td></tr></table><br>


    <table width="100%" class="SytemTable" align="center" id="tbl_deliverorder" cellpadding="10">
        <thead>
            <tr>
                <td>Part No</td>
                <td>Description</td>
                <td style="width: 60px">Unit Price</td>
                <td style="width: 20px">Discount</td>
                <td style="width: 10px"></td>
                <td style="width: 40px">Quantity</td>
                <td>New Quantity</td>
            </tr>
        </thead>
        <tbody id="tbody1">

            </tr>
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
            <?php echo form_input($reject) ?>
        </td>
        <td >
            <?php echo form_input($add) ?>
        </td>
    </tr>

</table>









</table>
<?php echo form_close(); ?>