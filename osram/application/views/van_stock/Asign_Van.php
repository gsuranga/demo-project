<?php
$_instance = get_instance();


$current_date = date("Y-m-d");
$tim=date("H:i:s");

$vehicle_no = array(
    "id" => "vehicle_no",
    "name" => "vehicle_no",
    "type" => "text",
    "autocomplete" => "off",
    "placeholder" => "Type VehicleNo",

);

$employee_name = array(
    "id" => "employee_name",
    "name" => "employee_name",
    "type" => "text",
    "placeholder" => "Select Employee",
    'onfocus' => 'get_employe_names1();',
    'value' => set_value('employee_name')
);


$order_date = array(
    'id' => 'order_date',
    'name' => 'order_date',
    'type' => 'text',
    'readonly' => 'true',
    'autocomplete' => 'off'
);

$order_time = array(
    'id' => 'order_time',
    'name' => 'order_time',
    'type' => 'text',
    'autocomplete' => 'off',
    'readonly'=>'true'
//    'placeholder' => "Select Time",
//    'value' => set_value('order_time')
);
?>
<?php echo form_open('van_stock/insetvan'); ?>
<table align="center" width="80%">
   
    <tr>
        <td>
            <table align="center">
                <tr>
                    <td>Employee Name</td>
                    <td><?php echo form_input($employee_name); ?> <input type="hidden" name="id_emphas" id="id_emphas"/></td>
                </tr>
                <tr>
                    <td>Vehicle No</td>
                    <td><?php echo form_input($vehicle_no); ?></td>



                <tr>
                    <td>Date</td>
                    <td><?php echo form_input($order_date, $current_date); ?></td>
                </tr>

                <tr>
                    <td>Added Time</td>
                    <td><?php echo form_input($order_time,$tim); ?></td>
                </tr>


                <tr>
                <table border="0" width="27%" align="center">
                    <tr>
                        <td><input type="submit" value="save" onclick="" id="btn1"></td>
                    </tr>
                </table>
    </tr>
      <!--<tr>-->
<td>
    <table  align="center"  >
        <td align="center">
            <?php echo $this->session->flashdata('insert_item1'); ?>
            <?php echo validation_errors(TRUE); ?>
        </td>
    </table>

</td>
</table>

  


<?php echo form_close(); ?>