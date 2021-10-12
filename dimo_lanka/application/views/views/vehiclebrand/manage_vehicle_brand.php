<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$m_vehicle_brand = array(
    'id' => 'm_vehicle_brand',
    'name' => 'm_vehicle_brand',
    'type' => 'text'
);

$m_vehicle_brand_id = array(
    'id' => 'm_vehicle_brand_id',
    'name' => 'm_vehicle_brand_id',
    'type' => 'hidden'
);

$vehicle_type = array(
    'id' => 'vehicle_type1',
    'name' => 'vehicle_type1',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_vehicle_type1();',
    'placeholder' => 'Select Vehicle Type'
);
$vehicle_type_id = array(
    'id' => 'vehicle_type_id',
    'name' => 'vehicle_type_id',
    'type' => 'hidden'
);
$update_vehicle_brand = array(
    'id' => 'update_vehicle_brand',
    'name' => 'update_vehicle_brand',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_brand/manageVehicleBrand'); ?>
<table width="100%">
    <tr>
        <td>Vehicle Brand</td>
        <td>
            <?php echo form_input($m_vehicle_brand, $_GET['token_vehicle_brand_name']); ?>
            <?php echo form_input($m_vehicle_brand_id,$_GET['token_vehicle_brand_id']); ?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Type</td>
        <td>
            <?php echo form_input($vehicle_type, $_GET['token_vehicle_type_name']); ?>
            <?php echo form_input($vehicle_type_id, $_GET['token_vehicle_type_id']); ?>

        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($update_vehicle_brand); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>