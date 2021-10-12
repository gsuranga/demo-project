<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$current_vehicle_repair_type = array(
    'id' => 'current_vehicle_repair_type',
    'name' => 'current_vehicle_repair_type',
    'type' => 'text',
    'readonly' => 'true'
);
$vehicle_repair_type = array(
    'id' => 'vehicle_repair_types',
    'name' => 'vehicle_repair_types',
    'type' => 'text',
);
$vehicle_repair_type_id = array(
    'id' => 'vehicle_repair_type_id',
    'name' => 'vehicle_repair_type_id',
    'type' => 'hidden',
);
$update_vehicle_repair_type = array(
    'id' => 'update_vehicle_repair_type',
    'name' => 'update_vehicle_repair_type',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_repair_type/manageVehicleRepairType'); ?>
<table width="100%">
    <tr>
        <td>Current Vehicle Repair Type</td>
        <td><?php echo form_input($current_vehicle_repair_type, $_GET['token_repair_type_name']); ?></td>
    </tr>
    <tr>
        <td>Vehicle Repair Type</td>
        <td>
            <?php echo form_input($vehicle_repair_type); ?>
            <?php echo form_input($vehicle_repair_type_id, $_GET['token_repair_type_id']); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($update_vehicle_repair_type); ?>
            <?php echo form_error('vehicle_repair_types'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
