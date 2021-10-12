<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$current_vehicle_part_type = array(
    'id' => 'current_vehicle_part_type',
    'name' => 'current_vehicle_part_type',
    'type' => 'text',
    'readonly' => 'true' 
);
$vehicle_part_type = array(
    'id' => 'vehicle_part_type',
    'name' => 'vehicle_part_type',
    'type' => 'text'
);
$vehicle_part_type_id = array(
    'id' => 'vehicle_part_type_id',
    'name' => 'vehicle_part_type_id',
    'type' => 'hidden'
);
$create_vehicle_part_type = array(
    'id' => 'create_vehicle_part_type',
    'name' => 'create_vehicle_part_type',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_part_type/manageVehiclePartType'); ?>
<table width="100%">
    <tr>
        <td>Current Vehicle Part Type</td>
        <td><?php echo form_input($current_vehicle_part_type,$_GET['token_part_type_name']); ?></td>
    </tr>
    <tr>
        <td>Vehicle Part Type</td>
        <td>
            <?php echo form_input($vehicle_part_type); ?>
            <?php echo form_input($vehicle_part_type_id,$_GET['token_part_type_id']); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_part_type); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
