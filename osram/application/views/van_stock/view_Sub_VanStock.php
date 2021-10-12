<?php
$_instance = get_instance();
$row_id = 0;

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


$order_date = array(
    'id' => 'order_date',
    'name' => 'order_date',
    'type' => 'text',
    'readonly' => 'true',
    'autocomplete' => 'off'
);
$submit_stock_search = array(
    'id' => 'submit_stock_search',
    'name' => 'submit_stock_search',
    'type' => 'submit',
    'value' => 'search'
);

$add_row = array(
    "id" => "add_row",
    "name" => "add_row",
    "type" => "button",
    "value" => "+",
    "onclick" => "addRow();"
);
?>
<table align="center" width="80%">
    <input type="hidden" name="hid_rows" id="hid_rows">



    <!--<tr>-->
    <td>
        <table width="100%" class="SytemTable" align="center" id="viewstock" cellpadding="0" cellspacing="0" >
            <thead>

                <tr>
                    
                    <td>Date</td>
                    <td>Item Name</td>
                    <td>Item Price</td>
                    <td>Item Quantity</td>
                    <td>Amount</td>
                    <td>Edit</td>
                    <td>Delete</td>


                </tr>


            <tbody>

                <?php
                if (isset($extraData)) {
                    $count = 0;
                    foreach ($extraData as $value) {
                        $row_id++;
                        $tot = 0;
                        $qty = $value->van_stock_qty;
                        $price = $value->product_price;
                        $tot = $qty * $price;
                        ?>
                        <tr>
                            <!--<td align='center'><input type='button' value='+' onClick='addRow()' id="add_row_<?php echo $count ?>" name="add_row_<?php echo $count ?>"/></td>-->
                            <td><input type="text"  id="date_Edit_<?php echo $count ?>" value="<?php echo $value->added_date; ?>" disabled="true" onmouseover="set_hellodateED('<?php echo $count ?>');"/></td> 
                            <td><input style="width: 350px" type="text" id="item_name_<?php echo $count ?>" readonly="true"value="<?php echo $value->item_name; ?> " onfocus="get_product_names(<?php echo $count ?>)"/><input style="width: 100px" type="hidden" id="item_nameHD_<?php echo $count ?>" readonly="true"value="<?php echo $value->id_products; ?>"/> <input style="width: 100px" type="hidden" id="id_vanStore_HD<?php echo $count ?>" readonly="true"value="<?php echo $value->id_van_store; ?>"/><input style="width: 100px" type="hidden" id="id_vanStock_HD<?php echo $count ?>" readonly="true"value="<?php echo $value->id_van_stock; ?>"/> </td> 

                            <td><input type="text" id="product_Price_<?php echo $count ?>" value="<?php echo $value->product_price; ?>" readonly="true"/> </td> 
                            <td><input type="text" id="van_stok_qty_<?php echo $count ?>" value="<?php echo $value->van_stock_qty; ?>" onkeyup="setprice2(<?php echo $count ?>)" readonly="true" /></td> 
                            <td><input type="text" id="tot_<?php echo $count ?>" value="<?php echo $tot ?>" readonly="true"/></td> 
                            <td> <a href="#" id="manage_edit_<?php echo $count; ?>" onclick="activate_and_save_to_db(<?php echo $count; ?>);">Edit</a></td>
                            <td> <a href="#" onclick="delete_item(<?php echo $count; ?>);"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>



                        </tr>


        <?php
        $count = $count + 1;
    }
}
?>


            </tbody>



            <tfoot>

            </tfoot>
            </thead>

        </table>
       

    </td>
</tr>
</table>
<?php echo form_close(); ?>