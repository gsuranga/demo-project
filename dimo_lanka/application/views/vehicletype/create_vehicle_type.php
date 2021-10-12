<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$vehicle_type = array(
    'id' => 'vehicle_type',
    'name' => 'vehicle_type',
    'autocomplete' => 'off',
    'type' => 'text'
);
$create_vehicle_type = array(
    'id' => 'create_vehicle_type',
    'name' => 'create_vehicle_type',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_type/createVehicleType'); ?>
<table width="100%">

    <tr>
        <td>Vehicle Type</td>
        <td>
            <?php echo form_input($vehicle_type); ?>
            <?php echo form_error('vehicle_type'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_type); ?></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td colspan="2">
            <?php echo $this->session->flashdata('insert_vehicale_type'); ?>
            <?php echo $this->session->flashdata('insert_vehicale_type_up'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>