<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$district_code = array(
    'id' => 'district_code',
    'name' => 'district_code',
	 'autocomplete' => 'off',
    'placeholder' => 'Enter District Code',
    'type' => 'text'
);
$district_name = array(
    'id' => 'district_name',
    'name' => 'district_name',
	'autocomplete' => 'off',
    'placeholder' => 'Enter District Name',
    'type' => 'text'
);
$create_district = array(
    'id' => 'create_district',
    'name' => 'create_district',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('citydistricts/createDistricts'); ?>
<table width="80%" align="center">
    <tr>
        <td>District Code</td>
        <td>
            <?php echo form_input($district_code); ?>
            <?php echo form_error('district_code'); ?>
        </td>
    </tr>
    <tr>
        <td>District Name</td>
        <td>
            <?php echo form_input($district_name); ?>
            <?php echo form_error('district_name'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_district); ?></td>
    </tr>
	<tr>
        <td colspan="3"><?php echo $this->session->flashdata('insert_district'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>