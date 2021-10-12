<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$city_name = array(
    'id' => 'city_name',
    'name' => 'city_name',
    'type' => 'text',
);
$city_code = array(
    'id' => 'city_code',
    'name' => 'city_code',
    'type' => 'text',
);
$district_name = array(
    'id' => 'district_name',
    'name' => 'district_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onkeyup' => 'getAllDistrict();',
    'placeholder' => 'Select District'
    
);
$district_id = array(
     'id' => 'district_id',
    'name' => 'district_id',
    'type' => 'hidden'
);
$postal_code = array(
    'id' => 'postal_code',
    'name' => 'postal_code',
    'type' => 'text',
    
);
$create_city = array(
    'id' => 'create_city',
    'name' => 'create_city',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open(); ?>
<table width="100%">
    <tr>
        <td>City Name</td>
        <td><?php echo form_input($city_name); ?></td>
    </tr>
    <tr>
        <td>City Code</td>
        <td><?php echo form_input($city_code); ?></td>
    </tr>
    <tr>
        <td>District Name</td>
        <td>
            <?php echo form_input($district_name); ?>
            <?php echo form_input($district_id); ?>
        </td>
    </tr>
    <tr>
        <td>Postal Code</td>
        <td><?php echo form_input($postal_code); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_city); ?></td>
    </tr>

</table>
<?php echo form_close(); ?>