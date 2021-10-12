<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$m_user_type = array(
    'id' => 'm_user_type',
    'name' => 'm_user_type',
    'type' => 'text',
    'autocomplete' => 'off'
);
$m_user_typeid = array(
    'id' => 'm_user_typeid',
    'name' => 'm_user_typeid',
    'type' => 'hidden'
);
$current_user_type = array(
    'id' => 'current_user_type',
    'name' => 'current_user_type',
    'readonly' => 'true',
    'type' => 'text'
);

$m_create_user_type = array(
    'id' => 'm_create_user_type',
    'name' => 'm_create_user_type',
    'type' => 'submit',
    'value' => 'Update'
);
$_instance = get_instance();
?>
<?php echo form_open('user_type/updateUserType'); ?>
<table>
    <tr>
        <td>Current User Type</td>
        <td><?php echo form_input($current_user_type, $_GET['token_user_type_name']); ?></td>
    </tr>
    <tr>
        <td>User Type</td>
        <td>
            <?php echo form_input($m_user_type); ?>
            <?php echo form_input($m_user_typeid, $_GET['token_user_type_id']); ?>

        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo form_input($m_create_user_type); ?>
            <?php echo form_error('m_user_type'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>
