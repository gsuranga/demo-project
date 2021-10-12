<?php
/**
 * Description of manageUserType
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php

$current_usertype = array(
    "id" => "current_usertype",
    "name" => "current_usertype",
    "type" => "text",
    "disabled" => "disabled",
    "value" => $_GET['user_type_token'],
    "style" => "width: 90%"
);

$manage_usertype = array(
    "id" => "manage_usertype",
    "name" => "manage_usertype",
    "type" => "text",
    "style" => "width: 90%"
);

$hidden_usertype_id = array(
    "id" => "hidden_usertype_id",
    "name" => "hidden_usertype_id",
    "type" => "hidden",
    "value" => $_GET['id_token']
);

$edit_usertype = array(
    "id" => "edit_usertype",
    "name" => "edit_usertype",
    "type" => "submit",
    "class" => "classname",
    "value" => "Update"
);

?>

<?php echo $this->session->flashdata('update_usertype'); ?>
<?php echo validation_errors(); ?>

<?php echo form_open('user_type/updateUserType'); ?>
<table  width=100%" id="show_tbl">
  
    <tr>
        <td style="width: 12%">
            Current User Type
        </td>
        <td style="width: 12%">
            <?php echo form_input($current_usertype); ?>
        </td>
    </tr>
    <tr>
        <td>New User Type</td>
            <?php echo form_input($hidden_usertype_id); ?>
        <td><?php echo form_input($manage_usertype); ?></td>
    </tr>
    <tr>
        <td>

        </td>
        <td>
            <table align="right">
                <tr>
                    <td><?php echo form_input($edit_usertype); ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>