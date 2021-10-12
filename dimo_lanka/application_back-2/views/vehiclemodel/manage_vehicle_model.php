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
    'type' => 'text'
);
$m_vehicle_model_id = array(
    'id' => 'm_vehicle_model_id',
    'name' => 'm_vehicle_model_id',
    'type' => 'hidden',  
);

$vehicle_brand = array(
    'id' => 'vehicle_brand1',
    'name' => 'vehicle_brand1',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_brand1();',
    'placeholder' => 'Select Vehicle Model'
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
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('vehicle_model/manageVehicleModel'); ?>
<table>
    <tr>
        <td>Vehicle Model</td>
        <td>
            <?php echo form_input($vehicle_model, $_GET['token_vehicle_model_name']); ?>
            <?php echo form_input($m_vehicle_model_id,$_GET['token_vehicle_model_id']);?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Brand</td>
        <td>
            <?php echo form_input($vehicle_brand,$_GET['token_vehicle_brand_name']); ?>
            <?php echo form_input($vehicle_brand_id,$_GET['token_vehicle_brand_id']); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_vehicle_model); ?></td>
    </tr>
</table>
<?php echo form_open(); ?>
