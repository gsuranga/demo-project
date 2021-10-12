<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$meeting_type = array(
    'id' => 'meeting_type',
    'name' => 'meeting_type',
    'type' => 'text'
);
$create_meeting_type = array(
    'id' => 'create_meeting_type',
    'name' => 'create_meeting_type',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('meeting_type/createMeetingType');?>
<table width="100%">
    <tr>
        <td>Meeting Type</td>
        <td><?php echo form_input($meeting_type);?></td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_meeting_type);?></td>
    </tr>
</table>
<?php echo form_close();?>