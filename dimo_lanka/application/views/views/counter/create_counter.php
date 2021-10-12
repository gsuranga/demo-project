<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$counter_code = array(
    'id' => 'counter_code',
    'name' => 'counter_code',
    'type' => 'text'
);
$counter_name = array(
    'id' => 'counter_name',
    'name' => 'counter_name',
    'type' => 'text'
);

$counter_account_number = array(
    'id' => 'counter_account_number',
    'name' => 'counter_account_number',
    'type' => 'text'
);
$area_name = array(
    'id' => 'area_name',
    'name' => 'area_name',
    'type' => 'text',
    'placeholder' => 'Select Area',
    'onfocus' => 'get_all_area();'
);
$area_id = array(
    'id' => 'area_id',
    'name' => 'area_id',
    'type' => 'hidden'
);
$identifier = array(
    'id' => 'identifier',
    'name' => 'identifier',
    'type' => 'text'
);
$create_counter = array(
    'id' => 'create_counter',
    'name' => 'create_counter',
    'type' => 'submit',
    'value' => 'Create Counter'
);
$_instance = get_instance();
?>
<?php echo form_open('counter/createCounter'); ?>
<table width="100%">
    <tr>
        <td>Counter Code</td>
        <td><?php echo form_input($counter_code); ?></td>
    </tr> 
    <tr>
        <td>Counter Name</td>
        <td><?php echo form_input($counter_name); ?></td>
    </tr> 
    <tr>
        <td>Counter Account Number</td>
        <td><?php echo form_input($counter_account_number); ?></td>
    </tr> 
    <tr>
        <td>Area</td>
        <td>
<?php echo form_input($area_name); ?>
<?php echo form_input($area_id); ?>
        </td>
    </tr> 
    <tr>
        <td>Identifier</td>
        <td><?php echo form_input($identifier); ?></td>
    </tr> 
    <tr>
        <td></td>
        <td><?php echo form_input($create_counter); ?></td>
    </tr> 
</table>
<?php echo form_close(); ?>
