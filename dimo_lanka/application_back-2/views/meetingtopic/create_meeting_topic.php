<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$meeting_topic = array(
    'id' => 'meeting_topic',
    'name' => 'meeting_topic',
    'type' => 'text'
);
$create_meeting_topic = array(
    'id' => 'create_meeting_topic',
    'name' => 'create_meeting_topic',
    'type' => 'submit',
    'value' => 'Create'
);
$_instance = get_instance();
?>
<?php echo form_open('meeting_topic/createMeetingTopic');?>
<table width="100%">
    <tr>
        <td>Meeting Topic</td>
        <td>
            <?php echo form_input($meeting_topic);?>
            <?php echo form_error('meeting_topic');?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($create_meeting_topic);?></td>
    </tr>
</table>
<?php echo form_close();?>