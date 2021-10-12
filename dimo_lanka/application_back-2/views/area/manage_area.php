<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *  @author Iresha Lakmali
 */
$u_area_name = array(
    'id' => 'u_area_name',
    'name' => 'u_area_name',
    'type' => 'text',
    'autocomplete' => 'off'
);
$area_code = array(
    'id' => 'area_code',
    'name' => 'area_code',
    'type' => 'text',

);

$u_area_account_no = array(
    'id' => 'u_area_account_no',
    'name' => 'u_area_account_no',
    'type' => 'text',
    'automcomplete' => 'off'
);
$u_udate_area = array(
    'id' => 'u_udate_area',
    'name' => 'u_udate_area',
    'type' => 'submit',
    'value' => 'Update'
);
$udelete_area = array(
    'id' => 'udelete_area',
    'name' => 'udelete_area',
    'type' => 'submit',
    'value' => 'Delete'
);
$area_id = array(
    'id' => 'area_id',
    'name' => 'area_id',
    'type' => 'hidden'
);
?>
<?php echo form_open('area/updateArea'); ?>
<?php echo form_input($area_id, $_GET['token_area_id']); ?>
<table width="60%">
    <tr>
        <td>Area Code</td>
        <td><?php echo form_input($area_code,$_GET['token_area_code']); ?></td>
    </tr>
    <tr>
        <td>Area Name</td>
        <td><?php echo form_input($u_area_name, $_GET['token_area_name']); ?></td>    
    </tr>
    <tr>
        <td>Area Account No</td>
        <td><?php echo form_input($u_area_account_no, $_GET['token_account_no']); ?></td>

    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td><?php echo form_input($u_udate_area); ?></td> 
                    <td></td> 
                    
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>