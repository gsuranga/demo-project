<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$vehicle_repair_type = array(
    'id' => 'vehicle_repair_type',
    'name' => 'vehicle_repair_type',
    'autocomplete' => 'off',
    'type' => 'text'
);
$create_vehicle_repair_type = array(
    'id' => 'create_vehicle_repair_type',
    'name' => 'create_vehicle_repair_type',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_repair_type/createVehicleRepairType'); ?>
<table width="100%">
    <tr>
        <td>Vehicle Repair Type</td>
        <td>
            <?php echo form_input($vehicle_repair_type); ?>
            <?php echo form_error('vehicle_repair_type'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_repair_type); ?></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td colspan="2">
            <?php echo $this->session->flashdata('insert_vehicle_repay_type'); ?>
            <?php echo $this->session->flashdata('set_message_update_repay_type'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
