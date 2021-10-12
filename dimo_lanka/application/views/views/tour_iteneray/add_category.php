<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Shamil ilyas
 */
?>
<?php
$categary_name = array(
    'id' => 'categary_name',
    'name' => 'categary_name',
    'type' => 'text',
    'autocomplete' => 'off'
);
$Code = array(
    'id' => 'code',
    'name' => 'code',
    'type' => 'text',
    'autocomplete' => 'off'
);
$create_apm = array(
    'id' => 'create_apm',
    'name' => 'create_apm',
    'type' => 'submit',
    'value' => 'Create'
);

$_instance = get_instance();
?>
<?php echo form_open('tour_iteneray/createVisitCategory'); ?>
<table>
    <tr>
        <td>category Name</td>
        <td><?php echo form_input($categary_name); ?></td>
    </tr>
    <tr>
        <td>Code</td>
        <td><?php echo form_input($Code); ?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_apm); ?></td>
    </tr>


</table>
<?php echo form_close(); ?>