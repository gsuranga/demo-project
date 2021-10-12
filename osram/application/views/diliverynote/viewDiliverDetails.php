<?php
$managee_employee_name = array(
    'id' => 'managee_employee_name',
    'name' => 'managee_employee_name',
    'type' => 'text',
    'value' => $extraData[0]->fullname,
    'readonly' => 'true'
);

$managee_employee_no = array(
    'id' => 'managee_mployee_no',
    'name' => 'managee_employee_no',
    'type' => 'hidden',
    'value' => $extraData[0]->id_employee_has_place,
    'readonly' => 'true'
);

$managee_order_no = array(
    'id' => 'managee_order_no',
    'name' => 'managee_order_no',
    'type' => 'text',
    'value' => $extraData[0]->purchase_order_number,
    'readonly' => 'true'
);

$managee_order_date = array(
    'id' => 'managee_order_date',
    'name' => 'managee_order_date',
    'type' => 'text',
    'value' => $extraData[0]->added_date,
    'readonly' => 'true'
);
$total = 0;
?>


<table width="90%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="40%">
                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($managee_employee_name); ?> <?php echo form_input($managee_employee_no); ?></td>
                </tr>
                <tr>
                    <td>Order No</td>
                    <td><?php echo form_input($managee_order_no); ?></td>
                </tr>
                <tr>
                    <td>Purchase Order Date</td>
                    <td><?php echo form_input($managee_order_date); ?></td>
                </tr>

            </table>
        </td>
    </tr>
    <tr>
        <td align="center">
            <table width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_dilivery_view">
                <thead>
                    <tr>
                        <td>Delivery Note Number</td>
                        <td>Order ID</td>
                        <td>Item Name</td>
                        <td align="right" >Price</td>
                        <td align="right" >Delivery Quantity</td>
                        <td style="text-align: right">Amount</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
<?php
$row = 0;
if (isset($extraData))
    foreach ($extraData as $value) {
    $row++;
        $amount = $value->product_price * $value->dilivery_qty;
        $total+=$amount;
        ?>
                            <tr>
                                <td><?php echo $value->dilivery_note_number; ?>
                                    <input type="hidden" id="dil_token_<?php echo $row; ?>" value="<?php echo $value->id_dilivery_note_has_products; ?>">
                                </td>
                                <td><?php echo $value->purchase_order_number; ?></td>
                                <td><?php echo $value->item_name; ?></td>
                                <td align="right"><?php echo $value->product_price; ?>
                                    <input type="hidden" id="price_<?php echo $row; ?>" value="<?php echo $value->product_price; ?>">
                                </td>
                                <td align="right" width="15%"><input style="text-align: right" readonly="true" type="text" onkeyup="key_total('<?php echo $row; ?>');" onkeydown="num('<?php echo $row; ?>');" id="txt_di_<?php echo $row; ?>" name="txt_di_<?php echo $row; ?>" value="<?php echo number_format($value->dilivery_qty, 0) ?>">&nbsp;<span id="errmsg_<?php echo $row; ?>"></span></td>
                                <td style="text-align: right" id="txt_amount_<?php echo $row; ?>"><?php echo number_format($amount, 2); ?></td>
                                <td align="center" ><input type="checkbox" id="ch_di_<?php echo $row; ?>" name="ch_di_<?php echo $row; ?>" onchange="edit_field_row('<?php echo $row; ?>');"></td>
                            </tr>
    <?php }
?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" style="text-align: right;">Total</td>
                        <td style="text-align: right" id="amount_orde"><?php echo number_format($total, 2); ?></td>
                    </tr>
                </tfoot>
            </table>
        </td>
    </tr>
    <tr>
        <td align="right">
            <input type="button" value="update" onclick="save_update_qty();"> 
        </td>
    </tr>
</table>
<input type="hidden" id="token_dilivers" value="<?php echo $row; ?>">
<input type="hidden" id="token_dilivers_id" value="<?php echo $_REQUEST['cl_distributorHayleysid_dilivery_noteToken']; ?>">