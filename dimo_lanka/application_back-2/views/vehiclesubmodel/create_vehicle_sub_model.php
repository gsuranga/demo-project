<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$vehicle_sub_model = array(
    'id' => 'vehicle_sub_model',
    'name' => 'vehicle_sub_model',
    'autocomplete' => 'off',
    'type' => 'text',
);
$vehicle_model = array(
    'id' => 'vehicle_model',
    'name' => 'vehicle_model',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_vehicle_model();',
    'placeholder' => 'Select Vehicle Model'
);
$vehicle_model_id = array(
    'id' => 'vehicle_model_id',
    'name' => 'vehicle_model_id',
    'type' => 'hidden',
);
$create_vehicle_sub_model = array(
    'id' => 'create_vehicle_sub_model',
    'name' => 'create_vehicle_sub_model',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_sub_model/createVehicleSubModel'); ?>
<table width="100%">
    <tr>
        <td>Vehicle Sub Model</td>
        <td>
            <?php echo form_input($vehicle_sub_model); ?>
            <?php echo form_error('vehicle_sub_model'); ?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Model</td>
        <td>
            <?php echo form_input($vehicle_model); ?>
            <?php echo form_input($vehicle_model_id); ?>
            <?php echo form_error('vehicle_model'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_sub_model); ?></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td>
            <?php echo $this->session->flashdata('insert_vehicle_sub_model'); ?>
            <?php echo $this->session->flashdata('insert_vehicle_sub_model_update'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>