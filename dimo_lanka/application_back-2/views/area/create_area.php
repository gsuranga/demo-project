<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 *  @author Iresha Lakmali
 */

$area_name = array(
    'id' => 'area_name',
    'name' => 'area_name',
    'type' => 'text',
    'autocomplete' => 'off'
);

$area_account_no = array(
    'id' => 'area_account_no',
    'name' => 'area_account_no',
    'type' => 'text',
    'autocomplete' => 'off'
);
$area_code = array(
    'id' => 'area_code',
    'name' => 'area_code',
    'type' => 'text'
);
$add_area = array(
    'id' => 'add_area',
    'name' => 'add_area',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('area/createArea'); ?>
<table width="100%">
    <tr>
        <td>Area Code</td>
        <td>
            <?php echo form_input($area_code);?>
            <?php echo form_error('area_code');?>
        </td>
    </tr>
    <tr>
        <td>Area Name</td>
        <td>
            <?php echo form_input($area_name); ?>
            <?php echo form_error('area_name'); ?>
        </td>    
    </tr>
    <tr>
        <td>Area Account No.</td>
        <td
            ><?php echo form_input($area_account_no); ?>
            <?php echo form_error('area_account_no'); ?>
        </td>
    </tr>
    <tr>
        <td></td> 
        <td>
            <?php echo form_input($add_area); ?>
        </td> 
    </tr>
</table>
<?php echo form_close(); ?>