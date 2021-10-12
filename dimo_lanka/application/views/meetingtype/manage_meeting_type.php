<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$current_meeting_type = array(
    'id' => 'current_meeting_type',
    'name' => 'current_meeting_type',
    'type' => 'text',
    'readonly' => 'true'
);
$meeting_type_id = array(
    'id' => 'meeting_type_id',
    'name' => 'meeting_type_id',
    'type' => 'hidden'
);
$meeting_type = array(
    'id' => 'meeting_type',
    'name' => 'meeting_type',
    'type' => 'text'
);
$update_meting_type = array(
    'id' => 'update_meting_type',
    'name' => 'update_meting_type',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('meeting_type/manageMeetingType'); ?>
<table>
    <tr>
        <td>Current Meeting Type</td>
        <td><?php echo form_input($current_meeting_type, $_GET['token_meeting_type']); ?></td>
    </tr>
    <tr>
        <td>Meeting Type</td>
        <td>
            <?php echo form_input($meeting_type); ?>
            <?php echo form_input($meeting_type_id,$_GET['token_meeting_type_id']);?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($update_meting_type); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
