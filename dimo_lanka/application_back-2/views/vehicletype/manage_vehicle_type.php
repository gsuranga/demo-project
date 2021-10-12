<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$current_vehicle_type = array(
    'id' => 'current_vehicle_type',
    'name' => 'current_vehicle_type',
    'type' => 'text',
    'readonly' => 'true'
);
$vehicle_type = array(
    'id' => 'vehicle_type_up',
    'name' => 'vehicle_type_up',
    'type' => 'text',
);

$vehicle_type_id = array(
    'id' => 'vehicle_type_id',
    'name' => 'vehicle_type_id',
    'type' => 'hidden'
);

$delete_vehicle_type = array(
    'id' => 'delete_vehicle_type',
    'name' => 'delete_vehicle_type',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_type/manageVehicleType');?>
<table width="100%">
    <tr>
        <td>Current Vehicle Type</td>
        <td>
            <?php echo form_input($current_vehicle_type,$_GET['token_vehicle_type_name']);?>
            <?php echo form_input($vehicle_type_id,$_GET['token_vehicle_type_id']);?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Type</td>
        <td><?php echo form_input($vehicle_type);?>
            <?php echo form_error('vehicle_type_up'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
          <td><?php echo form_input($delete_vehicle_type);?></td>
        </td>
        
    </tr>
</table>
<?php echo form_close();?>
