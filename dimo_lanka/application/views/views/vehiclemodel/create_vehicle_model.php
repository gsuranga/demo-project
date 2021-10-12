<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$vehicle_model = array(
    'id' => 'vehicle_model',
    'name' => 'vehicle_model',
    'autocomplete' => 'off',
    'type' => 'text'
);
$vehicle_brand = array(
    'id' => 'vehicle_brand',
    'name' => 'vehicle_brand',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_brand();',
    'placeholder' => 'Select Vehicle Brand'
);
$vehicle_brand_id = array(
    'id' => 'vehicle_brand_id',
    'name' => 'vehicle_brand_id',
    'type' => 'hidden',
);
$create_vehicle_model = array(
    'id' => 'create_vehicle_model',
    'name' => 'create_vehicle_model',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_model/createVehicleModel'); ?>
<table width="100%">
    <tr>
        <td>Vehicle Model</td>
        <td>
            <?php echo form_input($vehicle_model); ?>
            <?php echo form_error('vehicle_model'); ?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Brand</td>
        <td>
            <?php echo form_input($vehicle_brand); ?>
            <?php echo form_input($vehicle_brand_id); ?>
            <?php echo form_error('vehicle_brand_id'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_model); ?></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td>
            <?php echo $this->session->flashdata('insert_vehicle_model'); ?>
            <?php echo $this->session->flashdata('insert_vehicle_model_update'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>