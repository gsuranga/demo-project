<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php
$_instance = get_instance();

$current_date = date("Y-m-d");

$vehicle_no = array(
    "id" => "vehicle_no",
    "name" => "vehicle_no",
    "type" => "text",
    "autocomplete" => "off",
    "placeholder" => "Select VehicleNo",
    "onfocus" => "getVehicleNO()"
);

$employee_name = array(
    "id" => "employee_name",
    "name" => "employee_name",
    "type" => "text",
    "placeholder" => "Select Employee",
    'onfocus' => 'get_employe_names();',
    'value' => set_value('employee_name')
);
$item_name = array(
    "id" => "item_name_0",
    "name" => "item_name_0",
    "type" => "text",
    "autocomplete" => "off",
    "placeholder" => "Select Product",
    "onfocus" => "get_product_names('0')"
);
$available_qty = array(
    "id" => "available_qty_0",
    "name" => "available_qty_0",
    'readonly' => 'true',
    "type" => "text"
);
$supply_qty = array(
    "id" => "supply_qty_0",
    "name" => "supply_qty_0",
    "type" => "text",
    "onkeyup" => "setCalculation()"
);

$order_date = array(
    'id' => 'order_date',
    'name' => 'order_date',
    'type' => 'text',
    'readonly' => 'true',
    'autocomplete' => 'off'
);

$add_row = array(
    "id" => "add_row",
    "name" => "add_row",
    "type" => "button",
    "value" => "+",
    "onclick" => "addRow();"
);

$tot = $available_qty->supply_qty;
?>
<?php echo form_open('van_stock/insetvanstok'); ?>
<table width="100%"><tr><td>
            <table border='0' align='center' >
                <tr>
                    <td>Vehicle No<input type="hidden" value="0" id="tbl_count" name="tbl_count"/></td>
                    <td><?php echo form_input($vehicle_no); ?><input type="hidden"  id="emphasPH_ID" name="emphasPH_ID"/></td>
                <input type="hidden" name="id_vehicleno" id="id_vehicleno"/>
    </tr>
</tr>
<tr>
    <td>Employee Name</td>
    <td><?php echo form_input($employee_name); ?> </td>
</tr>

<tr>
    <td>Date</td>
    <td><?php echo form_input($order_date, $current_date); ?></td>
</tr>

</table></td></tr>
<tr><td align="center">
        <?php echo $this->session->flashdata('insert_item'); ?>
        <?php echo validation_errors(TRUE); ?>


        <table width="80%" class="SytemTable" align='center' cellpadding="0" cellspacing="0" id="item_table">
            <thead>
                <tr>
                    <td></td>
                    <td>Item Name</td>
                    <td>Available Quantity</td>
                    <td>Supply Quantity</td>
                    <td>Remove</td>
                </tr>
            </thead>
            <tbody>
            <td align='center'><?php echo form_input($add_row); ?></td>
            <td><?php echo form_input($item_name); ?><input type="hidden" name="hidn_token_0" id="hidn_token_0"></td>
            <td><?php echo form_input($available_qty); ?></td>
            <td><input type="text" id="supply_qty_0" name="supply_qty_0" onkeyup="setCalculation(0)"/><input type="hidden" id="mnes_qty_0" name="mnes_qty_0" /></td>
            <tfoot>
                <tr id="row_1">
                    <td colspan="3" style="text-align: right;">Total Van Qty</td>
                    <td><input type="text" name="txt_total" id="txt_total" readonly="true"></td>
                </tr>
            </tfoot>
        </tbody>

    </table>
</td></tr>

<tr><td>
        <table border="0" width="15%" align="right">
            <tr>
                <td><input type="submit" value="save" onclick="" id="btn1"></td>
            </tr>
        </table>
    </td></tr>
</table>
<?php echo form_close(); ?>