<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$_instance = get_instance();

$user_name = array(
    'id' => 'user_name',
    'name' => 'user_name',
    'type' => 'text',
    'value' => $_instance->session->userdata('username')
);

$current_password = array(
    'id' => 'current_password',
    'name' => 'current_password',
    'type' => 'password'
);

$new_password = array(
    'id' => 'new_password',
    'name' => 'new_password',
    'type' => 'password'
);

$confirm_password = array(
    'id' => 'confirm_password',
    'name' => 'confirm_password',
    'type' => 'password'
);

$change_password = array(
    "id" => "change_password",
    "name" => "change_password",
    "type" => "submit",
    "value" => "change password",
);
?>
<?php echo form_open('user/changeUserPassword'); ?>
<?php echo $this->session->flashdata('insert_user'); ?>
<table width="100%">
    <tr>
        <td>User Name</td>
        <td><?php echo form_input($user_name); ?></td>
    </tr>
    <tr>
        <td>Enter Current Password</td>
        <td><?php echo form_input($current_password); ?></td>
    </tr>
    <tr>
        <td>Enter New Password</td>
        <td><?php echo form_input($new_password); ?></td>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td><?php echo form_input($confirm_password); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td><?php echo form_input($change_password); ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>

<?php echo form_close(); ?>