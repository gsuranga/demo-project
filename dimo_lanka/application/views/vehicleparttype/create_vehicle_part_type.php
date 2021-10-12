<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$vehicle_part_type = array(
    'id' => 'vehicle_part_type',
    'name' => 'vehicle_part_type',
    'autocomplete' => 'off',
    'type' => 'text'
);
$create_vehicle_part_type = array(
    'id' => 'create_vehicle_part_type',
    'name' => 'create_vehicle_part_type',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('vehicle_part_type/createVehiclePartType'); ?>
<table width="100%">
    <tr>
        <td>Vehicle Part Type</td>
        <td>
<?php echo form_input($vehicle_part_type); ?>
            <?php echo form_error('vehicle_part_type'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_part_type); ?></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td>
<?php echo $this->session->flashdata('insert_vehicle_part_type'); ?>
            <?php echo $this->session->flashdata('insert_vehicle_part_type_update'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>