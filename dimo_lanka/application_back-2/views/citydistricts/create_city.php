<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$city_code = array(
    'id' => 'city_code',
    'name' => 'city_code',
	'autocomplete' => 'off',
    'placeholder' => 'Enter City Code',
    'type' => 'text'
);
$city_name = array(
    'id' => 'city_name',
    'name' => 'city_name',
	'autocomplete' => 'off',
    'placeholder' => 'Enter City Name',
    'type' => 'text'
);
$postal_code = array(
    'id' => 'postal_code',
    'name' => 'postal_code',
	'autocomplete' => 'off',
    'placeholder' => 'Enter Postal Code',
    'type' => 'text'
);
$district_name = array(
    'id' => 'txt_cityname',
    'name' => 'txt_cityname',
    'type' => 'text',
    'onfocus' => 'get_all_district();',
    'autocomplete' => 'off',
    'placeholder' => 'Select District'
);
$district_id = array(
    'id' => 'txt_city_id',
    'name' => 'txt_city_id',
    'type' => 'hidden'
);
$create_city = array(
    'id' => 'create_city',
    'name' => 'create_city',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('citydistricts/createCity'); ?>
<table width="90%">
    <tr>
        <td>City Code</td>
        <td>
            <?php echo form_input($city_code); ?>
            <?php echo form_error('city_code'); ?>
        </td>
    </tr>
    <tr>
        <td>City Name</td>
        <td>
            <?php echo form_input($city_name); ?>
            <?php echo form_error('city_name'); ?>
        </td>
    </tr>
    <tr>
        <td>Postal Code</td>
        <td>
            <?php echo form_input($postal_code); ?>
            <?php echo form_error('postal_code'); ?>
        </td>
    </tr>
    <tr>
        <td>District Name</td>
        <td>
            <?php echo form_input($district_name); ?>
            <?php echo form_input($district_id); ?>
            <?php echo form_error('txt_city_id'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_city); ?></td>
    </tr>
	<tr>
        <td colspan="3"><?php echo $this->session->flashdata('insert_bank'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
