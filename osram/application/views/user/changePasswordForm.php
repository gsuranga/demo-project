<?php
/**
 * Description of changePasswordForm
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();

$current_password = array(
    "id"=>"current_password",
    "name"=>"current_password",
    "type"=>"password"
);

$new_password = array(
    "id"=> "new_password",
    "name"=> "new_password",
    "type"=> "password"
);

$confirm_password = array(
  "id"=> "confirm_password",  
  "name"=> "confirm_password",
  "type" => "password"  
);

$change_password = array(
    "id"=> "change_password",
    "name"=> "change_password",
    "type" => "button",
    "value"=> "change password",
    "onclick" => "submit_change_password();"
);

$login_name = array(
  "id"=> "login_name",  
  "name"=> "login_name",  
  "type"=> "text",
  "disabled"=> "disabled"  
);

$hidden_loginName = array(
  "id"=> "hidden_loginName",  
  "name"=> "hidden_loginName",  
  "type"=> "hidden",  
);

$password_mange_form = array(
  "id"=> "password_mange_form",  
  "name"=> "password_mange_form",  
);


?>

<?php echo form_open('user/changeUserPassword',$password_mange_form); ?>
<?php echo validation_errors(true); ?>

<table width="100%">
    
    <tr>
        <td>Login Name</td>
        <td>
            <?php echo form_input($login_name,$this->session->userdata('user_username'));?>
            <?php echo form_input($hidden_loginName,$this->session->userdata('id_user'));?>
            
        </td>
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
    <tr></tr>
</table>
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('password_status'); ?>
        </td>
    </tr>
</table>

<?php echo form_close(); ?>
