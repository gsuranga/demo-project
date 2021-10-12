<?php
/**
 * Description of create_usertype
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$user_type = array(
    "name" => "user_type",
    "id" => "user_type",
    "type" => "text",
    "style" => "width: 90%" ,
    "onkeyup"=>"check_user_type();" ,
    "value" => set_value('user_type')
);


$user_type_submit = array("name" => "user_type_submit",
    "id" => "user_type_submit",
    "type" => "submit",
    "class" => "classname",
    "value" => "Submit");

$user_type_reset = array(
    "name" => "user_type_reset",
    "id" => "user_type_reset",
    "type" => "RESET",
    "class" => "classname",
    "value" => "Reset");
?>

<?php echo form_open('user_type/insertUserType'); ?>
<table  id="tbl_user_type" width="90%">
    <tr>
        <td style="width: 17%">User Type</td>
        <td style="width: 30%"><?php echo form_input($user_type); ?></td>
    </tr>
    <tr>
        <td style="width: 17%"></td>
        <td style="width: 30%"><?php echo form_error('user_type'); ?></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <table align="right">
                <tr>
                    <td><?php echo form_input($user_type_reset); ?></td>
                    <td><?php echo form_input($user_type_submit); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('insert_usertype'); ?></td>
    </tr>
</table>
<?php echo form_close(); ?>
