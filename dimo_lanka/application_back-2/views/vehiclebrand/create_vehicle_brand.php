<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$vehicle_brand = array(
    'id' => 'vehicle_brand',
    'name' => 'vehicle_brand',
    'autocomplete' => 'off',
    'type' => 'text'
);
$vehicle_type = array(
    'id' => 'vehicle_type',
    'name' => 'vehicle_type',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_vehicle_type();',
    'placeholder' => 'Select Vehicle Type'
);
$vehicle_type_id = array(
    'id' => 'vehicle_type_id',
    'name' => 'vehicle_type_id',
    'type' => 'hidden'
);

$create_vehicle_brand = array(
    'id' => 'create_vehicle_brand',
    'name' => 'create_vehicle_brand',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_brand/createVehicleBrand'); ?>
<table width="100%">
    <tr>
        <td>Vehicle Brand</td>
        <td>
            <?php echo form_input($vehicle_brand); ?>
            <?php echo form_error('vehicle_brand'); ?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Type</td>
        <td>
            <?php echo form_input($vehicle_type); ?>
            <?php echo form_input($vehicle_type_id); ?>
            <?php echo form_error('vehicle_type'); ?>
        </td> 
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_brand); ?></td>
    </tr>
</table>
<table width="100%">
    <tr>
        <td colspan="2">
            <?php echo $this->session->flashdata('insert_vehicle_brand'); ?>
            <?php echo $this->session->flashdata(''); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
