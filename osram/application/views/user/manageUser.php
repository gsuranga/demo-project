<?php
/**
 * Description of manageUser
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$manage_user_id = array(
    "id" => "manage_user_id",
    "name" => "manage_user_id",
    "type" => "hidden"
);

$manage_user_type_idd = array(
    "id" => "manage_user_type_idd",
    "name" => "manage_user_type_idd",
    "type" => "hidden"
);

$manage_user_type_id = array(
    "id" => "manage_user_type_id",
    "name" => "manage_user_type_id",
    "type" => "hidden"
);

$manage_user_type = array(
    "id" => "manage_user_type",
    "name" => "manage_user_type",
    "type" => "text",
    "onfocus" => "get_user_types(this.id,'manage_user_type_id');",
    "autocomplete" => "off",
     'placeholder'=>'Select User Type'
);

$manage_username = array(
    "id" => "manage_username",
    "name" => "manage_username",
    "type" => "text",
    "autocomplete" => "off"
);

$mange_user_password = array(
    "id" => "mange_user_password",
    "name" => "mange_user_password",
    "type" => "password",
    "autocomplete" => "off"
);

$manage_confirm_user_password = array(
    "id" => "manage_confirm_user_password",
    "name" => "manage_confirm_user_password",
    "type" => "password",
    "autocomplete" => "off"
);

$update_user_submit = array(
    "id" => "update_user_submit",
    "name" => "update_user_submit",
    "type" => "button",
    "value" => "Change",
    "onclick" => "submit_manage_user();"
);

$reset_user = array(
    "id" => "reset_user",
    "name" => "reset_user",
    "type" => "RESET",
    "value" => "reset"
);

$user_manage_form = array("name" => "user_manage_form",
    "id"=> "user_manage_form"    
    );

?>
<?php echo $this->session->flashdata('update_user'); ?>
<?php echo validation_errors(); ?>
<?php echo form_open('user/updateUser', $user_manage_form); ?>
<table align="center">
      <input type="button" value="click" onclick="crateBackup();">
    <tr>
        <td>User Type</td>
        <td><?php echo form_input($manage_user_type); echo form_input($manage_user_type_id); ?></td>
    </tr>
    
    <tr>
        <td>User Name</td>
        <td>
            <?php echo form_input($manage_username);?>
            <?php echo form_input($manage_user_id);?>
            <?php echo form_input($manage_user_type_idd);?>
        </td>
    </tr>
       
    <tr>
        <td>New Password</td>
        <td><?php echo form_input($mange_user_password);?></td>
    </tr>
    
    <tr>
        <td>Confirm Password</td>
        <td><?php echo form_input($manage_confirm_user_password);?></td>
    </tr>
    
    <tr>
        <td></td>
        <td><?php echo form_input($reset_user); echo form_input($update_user_submit); ?></td>
    </tr>
    
</table>
<?php echo form_close(); ?>