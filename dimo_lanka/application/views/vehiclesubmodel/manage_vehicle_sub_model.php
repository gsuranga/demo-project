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
    'type' => 'text'
);
$vehicle_model = array(
    'id' => 'vehicle_model1',
    'name' => 'vehicle_model1',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_all_vehicle_model1();',
    'placeholder' => 'Select Vehicle Model'
);
$vehicle_model_id = array(
    'id' => 'vehicle_model_id',
    'name' => 'vehicle_model_id',
    'type' => 'hidden',
);

$vehicle_sub_model_id = array(
    'id' => 'vehicle_sub_model_id',
    'name' => 'vehicle_sub_model_id',
    'type' => 'hidden',
);
$update_vehicle_sub_model = array(
    'id' => 'update_vehicle_sub_model',
    'name' => 'update_vehicle_sub_model',
    'type' => 'submit',
    'value' => 'Update'
);

?>
<?php echo form_open('vehicle_sub_model/mangeVehicleSubModel'); ?>
<table width="100%">
    <tr>
        <td>Vehicle Sub Model</td>
        <td>
            <?php echo form_input($vehicle_sub_model,$_GET['token_vehicle_sub_model_name']); ?>
            <?php echo form_input($vehicle_sub_model_id,$_GET['token_vehicle_sub_model_id']);?>
        </td>
    </tr>
    <tr>
        <td>Vehicle Model</td>
        <td>
            <?php echo form_input($vehicle_model,$_GET['token_vehicle_model_name']); ?>
            <?php echo form_input($vehicle_model_id,$_GET['token_vehicle_model_id']); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($update_vehicle_sub_model); ?></td>
    </tr>
    
</table>
<?php echo form_close(); ?>
