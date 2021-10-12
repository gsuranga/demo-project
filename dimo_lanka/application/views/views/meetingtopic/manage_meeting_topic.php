<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$current_meeting_topic = array(
    'id' => 'current_meeting_topic',
    'name' => 'current_meeting_topic',
    'type' => 'text',
    'readonly' => 'true'
);
$u_meeting_topic_id = array(
    'id' => 'u_meeting_topic_id',
    'name' => 'u_meeting_topic_id',
    'type' => 'hidden'
);
$u_meeting_topic = array(
    'id' => 'u_meeting_topic',
    'name' => 'u_meeting_topic',
    'type' => 'text'
);
$update_meting_topic = array(
    'id' => 'update_meting_topic',
    'name' => 'update_meting_topic',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('meeting_topic/manageMeetingTopic'); ?>
<table>
    <tr>
        <td>Current Meeting Topic</td>
        <td><?php echo form_input($current_meeting_topic, $_GET['token_meeting_type']); ?></td>
    </tr>
    <tr>
        <td>Meeting Topic</td>
        <td>
            <?php echo form_input($u_meeting_topic); ?>
            <?php echo form_input($u_meeting_topic_id,$_GET['token_meeting_type_id']);?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo form_input($update_meting_topic); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
