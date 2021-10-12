<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 *  @author shamil ilyas
 */

$des_name = array(
    'id' => 'designation',
    'name' => 'designation',
    'type' => 'text',
    'autocomplete' => 'off'
);



$add_designation = array(
    'id' => 'add_desig',
    'name' => 'add_desig',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('salesdesignation/createdes'); ?>
<table width="100%">
    <tr>
        <td>Designation</td>
        <td>
            <?php echo form_input($des_name);?>
            
        </td>
    </tr>
    
    <tr>
        <td></td> 
        <td>
            <?php echo form_input($add_designation); ?>
        </td> 
    </tr>
</table>
<?php echo form_close(); ?>