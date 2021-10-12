<?php
$employee_name = array(
    'id' => 'employee_name',
    'name' => 'employee_name',
    'type' => 'text',
    'autocomplete' => 'off'
);

$user_name = array(
    'id' => 'user_name',
    'name' => 'user_name',
    'type' => 'text',
    'autocomplete' => 'off'
);

$password = array(
    'id' => 'password',
    'name' => 'password',
    'type' => 'password'
);

$confirm_password = array(
    'id' => 'confirm_password',
    'name' => 'confirm_password',
    'type' => 'password'
);

$user_id = array(
    'id' => 'user_id',
    'name' => 'user_id',
    'type' => 'hidden'
);

$add_user_submit = array(
    'id' => 'add_user_submit',
    'name' => 'add_user_submit',
    'type' => 'submit',
    'value' => 'Create'
);

$reset_user = array(
    'id' => 'reset_user',
    'name' => 'reset_user',
    'type' => 'RESET',
    'value' => 'Reset',
);

$sales_officer_name = array(
    'id' => 'sales_officer_name',
    'name' => 'sales_officer_name',
    'type' => 'text',
    'autocomplete' => 'off',
    'onfocus' => 'get_usersby_types();',
    'placeholder' => 'Select '
);
$sales_officer_id = array(
    'id' => 'sales_officer_id',
    'name' => 'sales_officer_id',
    'type' => 'hidden'
);
$_instance = get_instance();
?>

<?php echo form_open('user/insertUser'); ?>
<table width="100%">
    <tr>
        <td>User Type</td>
        <td>
            <?php $_instance->getUserType(); ?>


        </td>
    </tr> 
    <tr id="non_admin">
        <td>Employee</td>
        <td>
            <?php echo form_input($sales_officer_name); ?>
            <?php echo form_input($sales_officer_id); ?>
        </td>
    </tr>
<!--    <tr>
        <td>Employee Name</td>
        <td>
    <?php echo form_input($employee_name) ?>
    <?php echo form_input($user_id) ?>

    <?php echo form_error('employee_name'); ?>
        </td>
    </tr>   -->

    <tr>
        <td>User Name</td>
        <td>
            <?php echo form_input($user_name); ?>
            <?php echo form_error('user_name'); ?>
        </td>
    </tr>
    <tr>
        <td>Create Password</td>
        <td>
            <?php echo form_input($password); ?>
            <?php echo form_error('password'); ?>
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
            <?php echo form_input($add_user_submit); ?>
            <?php echo form_input($reset_user); ?>
        </td>
    </tr>

</table>
<?php echo form_close(''); ?>



