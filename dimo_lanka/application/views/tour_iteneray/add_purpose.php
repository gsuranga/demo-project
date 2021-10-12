<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author shamil ilyas
 */
?>
<?php
$purpose_name = array(
    'id' => 'purpose_name',
    'name' => 'purpose_name',
    'type' => 'text',
    'autocomplete' => 'off'
);
$Code = array(
    'id' => 'purpose_code',
    'name' => 'purpose_code',
    'type' => 'text',
    'autocomplete' => 'off'
);
$create_purpose = array(
    'id' => 'create_purpose',
    'name' => 'create_purpose',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('tour_iteneray/createVisitPurpose'); ?>
<table>
    <tr>
        <td>purpose Name</td>
        <td><?php echo form_input($purpose_name); ?></td>
    </tr>
    <tr>
        <td>purpose Code</td>
        <td><?php echo form_input($Code); ?></td>
    </tr>
     <tr>
        <td>Description</td>
        <td> <textarea id="description" name="description" class="input" cols="35" rows="5"></textarea> </td>
    </tr>
    
    <tr>
        <td></td>
        <td><?php echo form_input($create_purpose); ?></td>
    </tr>


</table>
<?php echo form_close(); ?>