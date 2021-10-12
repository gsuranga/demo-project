<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$managee_employee_name = array(
    'id' => 'managee_employee_name',
    'name' => 'managee_employee_name',
    'type' => 'text',
    'value' => $extraData[0]->employee_first_name . ' ' . $extraData[0]->employee_last_name,
    'readonly' => 'true'
);

$managee_employee_no = array(
    'id' => 'managee_mployee_no',
    'name' => 'managee_employee_no',
    'type' => 'hidden',
    'value' => $extraData[0]->id_employee_has_place,
    'readonly' => 'true'
);

$purchase_hidden_id = array(
    'id' => 'purchase_hidden_id',
    'name' => 'purchase_hidden_id',
    'type' => 'hidden',
    'value' => $extraData[0]->id_purchase_order,
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
    'value' => $extraData[0]->purchase_order_date,
    'readonly' => 'true'
);

$managee_remark = array(
    'id' => 'managee_remark',
    'name' => 'managee_remark',
    'rows' => '3',
    'cols' => '10',
    'value' => $extraData[0]->purchase_order_remark,
    'readonly' => 'true'
);

$hidden_token_row = array(
    'id' => 'hidden_token_row',
    'name' => 'hidden_token_row',
    'type' => 'hidden'
);

$hidden_update_row = array(
    'id' => 'hidden_update_row',
    'name' => 'hidden_update_row',
    'type' => 'hidden'
);

$hidden_curre_view_rows = array(
    'id' => 'hidden_curre_view_rows',
    'name' => 'hidden_curre_view_rows',
    'type' => 'hidden'
);

$submit_view_form = array(
    'id' => 'submit_view_form',
    'name' => 'submit_view_form',
    'type' => 'submit',
    'value' => 'Update'
);

$start_row = 0;
?>

<?php echo form_open('purchase_order/insertPurchaseOrder'); ?>
<table width="90%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="30%">
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

                <tr>
                    <td>Remark</td>
                    <td><?php echo form_textarea($managee_remark); ?></td>
                </tr>
            </table>

        </td>
    </tr>
    <tr>
        <td align='center'>
            <?php
            // print_r($extraData);

            foreach ($extraData as $value) {
                $start_row++;
            }
            ?>

            <table width="90%" class="SytemTable" align="center" id="tbl_purchase_view" border='0'>
                <thead>
                    <tr>
                        <td></td>
                        <td>Item Name</td>
                        <td>Item Account Code</td>
						<td>Available Qty</td>
                        <td>Item Price</td>
                        <td>Item Quantity</td>
                        <td>Amount</td>
                        <td>Edit</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = '';
                    $hidden_row = 0;

//                    print_r($extraData);

                    foreach ($extraData as $value) {
                        $hidden_row++;
                        $amount = $value->product_price * $value->item_qty;
                        $total += $amount;
                        $number_format = number_format($amount, 2);
                        $number_format_total = number_format($total, 2);
                        ?>
                        <tr id="row_<?php echo $hidden_row; ?>">
                            <!--<td><input type="button" value="+" name="sdf" id="sf" onclick="add_update_field_row();"></td>-->
                            
                           
                            
                            <td><input type="button" hidden="true" name="add_row" id="add_row_<?php echo $hidden_row; ?>" value="+" onclick="add_update_field_row(this.id);"></td>
                            
                            <td><?php echo $value->item_name ?>
                                <input type="hidden" id="hidden_purchase_order_has_products_<?php echo $hidden_row; ?>" name="hidden_purchase_order_has_products_<?php echo $hidden_row; ?>" value="<?php echo $value->idl_purchase_order_has_products ?>">
                            </td>
                            <td><?php echo $value->item_account_code; ?></td>
							<td><?php echo $value->qty ;?></td>
                            <td><?php echo $value->product_price ?></td>
                            <td><?php echo $value->item_qty ?></td>
                            <td id="col_<?php echo $hidden_row; ?>"><?php echo $number_format ?></td>
                            <td><a href="#" id="purchase_1" onclick="enable_row('<?php echo $hidden_row; ?>');">Remove</a></td>
                        </tr>
                        <?php
                        }

//                    echo $hidden_row - 1;
                    ?>
                         
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" style="text-align: right;">Total</td>
                        <td><input type="text" name="txt_total" id="txt_total" readonly="true" value="<?php echo $number_format_total; ?>"></td>
                        <td>
                            <input type="hidden" id="count" value="1">

                            <input type="hidden" name="hidden_order_id"value="<?php echo $extraData[0]->id_purchase_order ?>"/>

                            <?php echo form_input($submit_view_form); ?>
                        </td>
                    </tr>
                </tfoot>

            </table>
        </td>
    </tr>
</table>
<?php echo form_input($purchase_hidden_id); ?>
<?php echo form_input($hidden_curre_view_rows, $hidden_row); ?>
<?php echo form_input($hidden_update_row, $hidden_row); ?>
<?php echo form_input($hidden_token_row, $hidden_row); ?>
<?php echo form_close(); ?>
<table align="center">
    <tr>
        <td><?php echo $this->session->flashdata('update_purchase'); ?></td>
    </tr>
</table>