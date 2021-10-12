<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$garage_name = array(
    'id' => 'garage_name',
    'name' => 'garage_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_garage_name();',
    'placeholder' => 'Select Garage'
);
$garage_id = array(
    'id' => 'garage_id',
    'name' => 'garage_id',
    'type' => 'hidden'
);
$create_garage_vehicle_type = array(
    'id' => 'create_garage_vehicle_type',
    'name' => 'create_garage_vehicle_type',
    'type' => 'submit',
    'value' => 'Create Garage Vehicle Type'
);
$_instance = get_instance();
?>
<?php echo form_open('garage/inservehicaltypoes'); ?>
<table width="80%">
    <tr>
        <td>Garage Name</td>
        <td>
            <?php echo form_input($garage_name); ?>
            <?php echo form_input($garage_id); ?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Type</td>
        <td>
            <table width="80%" id="vehicle_type">
                <tr>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="add_new_vehicle_type();" src="http://localhost/dimo_lanka/public/images/add2.png">

                    </td>
                    <td>
                        <input type="text" id="txt_vehicle_type_1" name="txt_vehicle_type_1" placeholder="Select Vehicle Type" autocomplete="off" onfocus="get_all_vehicle_type('1');"/>
                        <input type="hidden" id="txt_vehicle_type_id_1" name="txt_vehicle_type_id_1"/>
                    </td>
                    <td>
                        <img style="width: 20px; height: 20px" type="button"   onclick="remove_vehicle_type();" src="http://localhost/dimo_lanka/public/images/delete2.png">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td><?php echo form_input($create_garage_vehicle_type); ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<input type="hidden" name="emp_count" id="emp_count" value="1">
<?php echo form_close(); ?>