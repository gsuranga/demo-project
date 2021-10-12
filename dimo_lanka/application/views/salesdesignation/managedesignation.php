<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 *  @author Shamil  Ilyas
 */
$u_Destype= array(
    'id' => 'u_Destype',
    'name' => 'u_Destype',
    'type' => 'text',
    'autocomplete' => 'off'
);
$desID = array(
    'id' => 'desID',
    'name' => 'desID',
    'type' => 'hidden',

);


$u_udate_area = array(
    'id' => 'u_udate_area',
    'name' => 'u_udate_area',
    'type' => 'submit',
    'value' => 'Update'
);


?>
<?php echo form_open('salesdesignation/updateArea'); ?>
<?php echo form_input($desID, $_GET['token_id']); ?>
<table width="90%">
   
    <tr>
        <td>Designation Type</td>
        <td><?php echo form_input($u_Destype, $_GET['token_name']); ?></td>    
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