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
    "onfocus" => "getVehicleNO1()"
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
    "id" => "submit_stock_search",
    "name" => "submit_stock_search",
    "type" => "submit",
    "value" => "search",
    
);

$add_row = array(
    "id" => "add_row",
    "name" => "add_row",
    "type" => "button",
    "value" => "+",
    "onclick" => "addRow();"
);
?>
<form action="<?php echo base_url() ?>van_stock/drawIndexViewVanStock" method="post">
<table align="center" width="80%">
    <input type="hidden" name="hid_rows" id="hid_rows">
    <tr>
        <td>
            <table align="center">

                <tr>
                    <td>Vehicle No</td>
                    <td><?php echo form_input($vehicle_no); ?></td>
                    <td><input type="hidden" id="id_vehicleno" name="name_vehicle"></td>

<!--                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($employee_name); ?></td>
                     <td><input type="text" id="id_emphsplc" name="id_emphsplc"></td>
                </tr>-->

                <tr>
                    <td><label>Select a Date Range</label></td>
                    <td><input type="text" id="start_date_mr" name="start_date_sr" /></td>
                    <td><input type="text" id="end_date_mr" name="end_date_sr" "/></td>

                </tr>


                <tr>
                    <td></td>
                    <td align="left"><?php echo form_submit($submit_stock_search); ?></td>
                </tr>
            </table>
        </td>
    </tr>

    <!--<tr>-->
    <td>
        <table width="100%" class="SytemTable" align="center" id="viewstock" cellpadding="0" cellspacing="0" >
            <thead>

                <tr>



                    <td>Date</td>
                    <td>Time</td>
                    <td>Van Number</td>
                    <td>View</td>
                    <td>Delete</td>

                </tr>


            <tbody>

                <?php
                if (isset($extraData)) {
                    $count = 0;

                    foreach ($extraData as $value) {
                        ?>
                        <tr>

                            <td><input type="text"  id="date_<?php echo $count ?>" value="<?php echo $value->added_date; ?>" readonly="true"/> <input type="hidden"  id="idvan_Store_<?php echo $count ?>" value="<?php echo $value->id_van_store; ?>" readonly="true"/></td>
                            <td><input type="text"  id="Time_<?php echo $count ?>" value="<?php echo $value->added_time; ?>"readonly="true"/></td> 
                            <td><input type="text"  id="vanNumber_<?php echo $count ?>" value="<?php echo $value->van_number; ?>"readonly="true"/></td> 

                            <td><a href="drawIndexViewVanSUBStock?idvan_store=<?php echo $value->id_van_store; ?>">view</a></td>
                            <td> <a href="#" onclick="delete_item1(<?php echo $count; ?>);"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

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
        <table  align="right"  >

        </table>

    </td>
</tr>
</table>
    </form>
<?php echo form_close(); ?>