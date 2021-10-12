<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();

$search_user_name = array(
    'id' => 'search_user_name',
    'name' => 'search_user_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_user_name();',
    'placeholder' => 'Select Employee Name'
);

$user_type = array(
    'id' => 'user_type',
    'name' => 'user_type',
    'type' => 'text',
    'onfocus' => 'get_user_type();',
    'placeholder' => 'Select User Type'
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
$user_type_id = array(
    'id' => 'user_type_id',
    'name' => 'user_type_id',
    'type' => 'hidden'
);
$user_id = array(
    'id' => 'user_id',
    'name' => 'user_id',
    'type' => 'hidden'
);

$user_status = array(
    'id' => 'user_status',
    'name' => 'user_status',
    'type' => 'label',
    'value' => 'dddd'
);

$user_name = array(
    'id' => 'user_name',
    'name' => 'user_name',
    'type' => 'text',
);

$change_password = array(
    'id' => 'change_password',
    'name' => 'change_password',
    'type' => 'submit',
    'value' => 'Update'
);
$reset = array(
    'id' => 'change_password',
    'name' => 'change_password',
    'type' => 'Reset',
    'value' => 'Reset'
);
?>
<?php echo form_open('user/changeUserPassword'); ?>

<?php echo $this->session->flashdata('change_password'); ?>
<table width="100%">
    <tr style="vertical-align: top;">
        <td>
            <table width="100%">
                <tr>
                    <td >
                        Employee Name
                    </td>
                    <td >
                        <?php echo form_input($search_user_name); ?>
                        <?php echo form_error('user_id'); ?>
                        <?php echo form_input($user_id); ?>

                    </td>
                </tr>
                <tr>
                    <td>User Type</td>
                    <td>
                        <?php echo form_input($user_type); ?>
                        <?php echo form_error('user_type_id'); ?>
                        <?php echo form_input($user_type_id); ?>
                    </td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>
                        <?php echo form_input($user_name); ?>
                        <?php echo form_error('User Name'); ?>
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <?php echo form_input($new_password); ?>
                        <?php echo form_error('new_password'); ?>
                    </td>

                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <?php echo form_input($confirm_password); ?>
                        <?php echo form_error('confirm_password'); ?>
                    </td>

                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php echo form_submit($change_password); ?>
                        <?php echo form_reset($reset); ?>
                        <?php echo form_label('', 'status'); ?>
                        <?php echo form_error('status'); ?>

                    </td>
                </tr>
                
            </table>
        </td>
    </tr>
    <tr>
        <td><?php echo $this->session->flashdata('insert_user'); ?></td>
    </tr>
    <tr><td>
            <table id="tbl_load" width="100%">
                <tr>
                    <td>

                    </td> 
                </tr>
            </table>
        </td></tr>
</table>
<?php echo form_close(); ?>