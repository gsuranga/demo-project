<?php
$employee_name = array(
    'id' => 'employee_name',
    'name' => 'employee_name',
    'type' => 'text',
    "placeholder" => "Select Employee",
    'onfocus' => 'get_employe_names();',
    'value' => set_value('employee_name')
);

$employee_no = array(
    'id' => 'employee_no',
    'name' => 'employee_no',
    'type' => 'hidden',
    'value' => set_value('employee_no')
);

$order_no = array(
    'id' => 'order_no',
    'name' => 'order_no',
    'type' => 'text',
    'autocomplete' => 'off',
    'value' => set_value('order_no')
);

$order_date = array(
    'id' => 'order_date',
    'name' => 'order_date',
    'type' => 'text',
    'placeholder'=>"Select Date",
    'autocomplete' => 'off',
    'value' => set_value('order_date')
);

$order_time = array(
    'id' => 'order_time',
    'name' => 'order_time',
    'type' => 'text',
    'autocomplete' => 'off',
    'placeholder'=>"Select Time",
    'value' => set_value('order_time')
);

$remark = array(
    'id' => 'remark',
    'name' => 'remark',
    'rows' => '3',
    'cols' => '10'
);

$hidden_token_row = array(
    'id' => 'hidden_token_row',
    'name' => 'hidden_token_row',
    'type' => 'hidden',
    'value' => '1'
);

$purchase_submit = array(
    'id' => 'purchase_submit',
    'name' => 'purchase_submit',
    'type' => 'submit',
    'value' => 'Save'
);
?>

<?php echo form_open('purchase_order/insertPurchaseOrder'); ?>
<input type="hidden" name="login_type" id="login_type" value="<?php echo $this->session->userdata('user_type'); ?>">
<input type="hidden" name="login_name" id="login_name" value="<?php echo $this->session->userdata('employee_first_name') . " " . $this->session->userdata('employee_last_name'); ?>">
<table width="100%" align="center">
    <tr>
        <td>
            <table border='0' align='center' width="43%">
                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($employee_name); ?> <?php echo form_input($employee_no); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('employee_name'); ?></td>
                </tr>

                <tr>
                    <td>Order No</td>
                    <td><?php echo form_input($order_no); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php echo form_error('order_no'); ?></td>
                </tr>
                
                <tr>
                    <td>Remark</td>
                    <td><?php echo form_textarea($remark); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="center">
            <table width="80%" class="SytemTable" align="center" id="tbl_purchase">
                <thead>
                <td></td>
                <td>Item Name</td>
				<td>Item Account Code</td>
				<td>Available Qty</td>
                <td>Item Cost</td>
                <td>Item Quantity</td>
                <td>Amount</td>
                <td>Remove</td>
                </thead>

                <tr id="row_1">

                    <td><input type="button" name="add_row" id="add_row_1" value="+" onclick="add_field_row(this.id);"></td>
                    <td><input type="text" name="item_name_1" id="item_name_1" autocomplete="off" onfocus="get_product_names('1');" placeholder="Select Product" /><input type="hidden" name="hidn_token_1" id="hidn_token_1"></td>
					<td><input type="text" id="item_acc_code_1" name="item_acc_code_1" readonly="true"></td>
					<td><input type="text" id="avilable_qty_1" name="avilable_qty_1" readonly="true"></td>
                    <td><input type="text" name="item_price_1" id="item_price_1" readonly="true"></td>
                    <td><input type="text" name="item_qty_1" id="item_qty_1" onkeyup="count_amount('1');" autocomplete="off"></td>
                    <td><input type="text" name="amount_1" id="amount_1" readonly="true"></td>

                </tr>

                <tfoot>
                    <tr id="row_1">
                        <td colspan="4" style="text-align: right;">Total</td>
                        <td><input type="text" name="txt_total" id="txt_total" readonly="true"></td>
                    </tr>
                </tfoot>
            </table>

        </td>
    </tr>

    <tr><td align="center"><?php echo form_input($purchase_submit); ?>
        <?php echo $this->session->flashdata('insert_purchase'); ?>
        </td></tr>
</table>
<?php echo form_input($hidden_token_row); ?>

<?php echo form_close(); ?>

