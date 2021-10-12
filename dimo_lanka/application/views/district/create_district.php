<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$district_name = array(
    'id' => 'district_name',
    'name' => 'district_name',
    'type' => 'text'
);
$district_code = array(
     'id' => 'district_code',
    'name' => 'district_code',
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
<?php echo form_open('district/createDistrict'); ?>
<table width="100%">
    <tr>
        <td>District Code</td>
        <td><?php echo form_input($district_code); ?></td>
    </tr>
    <tr>
        <td>District Name</td>
        <td><?php echo form_input($district_name); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_district); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>