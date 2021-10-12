<?php
/**
 * Description of createUser
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
//id_user, id_employee, id_user_type, user_username, user_password, user_token, 
//user_active, user_status, user_added_date, user_added_time, user_added_timestamp

$employee_name = array(
    "id" => "employee_name",
    "name" => "employee_name",
    "type" => "text",
    "onfocus" => "get_employee_names(this.id,'employee_id');",
    "autocomplete" => "off",
    "placeholder" => 'Select Employee',
    "value" => set_value('employee_name')
);


$employee_id = array(
    "id" => "employee_id",
    "name" => "employee_id",
    "type" => "hidden",
    "value" => set_value('employee_id')
);

$user_type_id = array(
    "id" => "user_type_id",
    "name" => "user_type_id",
    "type" => "hidden",
    "value" => set_value('user_type_id')
);

$user_type = array(
    "id" => "user_type",
    "name" => "user_type",
    "type" => "text",
    "onfocus" => "get_user_types(this.id,'user_type_id');",
    "autocomplete" => "off",
    'placeholder' => 'Select User Type',
    "value" => set_value('user_type')
);

$username = array(
    "id" => "username",
    "name" => "username",
    "type" => "text",
    "autocomplete" => "off",
    "value" => set_value('username'),
    "onchange"=>"check_status();"
);

$user_password = array(
    "id" => "user_password",
    "name" => "user_password",
    "type" => "password",
    "autocomplete" => "off",
    "value" => set_value('user_password')
);

$confirm_user_password = array(
    "id" => "confirm_user_password",
    "name" => "confirm_user_password",
    "type" => "password",
    "autocomplete" => "off",
    "value" => set_value('confirm_user_password')
);

$add_user_submit = array(
    "id" => "add_user_submit",
    "name" => "add_user_submit",
    "type" => "button",
    "value" => "create",
    "onclick" => "submit_create_password();"
);

$reset_user = array(
    "id" => "reset_user",
    "name" => "reset_user",
    "type" => "RESET",
    "value" => "reset",
);

$password_create_form = array(
    "id" => "create_form",
    "name" => "create_form",
);
?>

<?php echo form_open('user/insertUser', $password_create_form); ?>
<table width="100%">
  
    <tr>
        <td>Employee Name</td>
        <td> <?php
            echo form_input($employee_name);
            echo form_input($employee_id);
            ?>
            <input type="hidden" id="hiddenName" name="hiddenName">
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo form_error('employee_name'); ?>
        </td>
    </tr>

    <tr>
        <td>User Type</td>
        <td><?php
            echo form_input($user_type);
            echo form_input($user_type_id);
            ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo form_error('user_type'); ?>
        </td>
    </tr>
    <tr>
        <td>User Name</td>
        <td><?php echo form_input($username); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo form_error('username'); ?>
        </td>
    </tr>
    <tr>
        <td>Create a Password</td>
        <td><?php echo form_input($user_password); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo form_error('user_password'); ?>
        </td>
    </tr>
    <tr>
        <td>Confirm Password</td>
        <td><?php echo form_input($confirm_user_password); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php echo form_error('confirm_user_password'); ?>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php
            echo form_input($reset_user);
            echo form_input($add_user_submit);
            ?></td>
        
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('insert_user'); ?></td>
    </tr>

</table>
<?php echo form_close(); ?>