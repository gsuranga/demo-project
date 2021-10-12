<?php
/**
 * Description of indexManageUser
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
?>
<?php
$_instance = get_instance();
$size = 50;
 if($this->session->userdata('user_type') != "Admin"){
     $size = 30;
 }
?>
<table  width="100%" border="0" cellpadding="10" >
    <tr class="ContentTableTitleRow">
        <?php if($this->session->userdata('user_type') == "Admin"){ ?><td>Search User</td><?php } ?>
         <?php if($this->session->userdata('user_type') == "Admin"){ ?><td>View User Details</td><?php } ?>
        <td>Change Password</td>
    </tr>
    <tr>
       <?php if($this->session->userdata('user_type') == "Admin"){ ?> <td width="30%" style="vertical-align: top;"><?php $_instance->drawSearchUserName(); ?></td><?php } ?>
        <?php if($this->session->userdata('user_type') == "Admin"){ ?><td width="40%" style="vertical-align: top;" align="center" >
            <?php $_instance->viewAllUserDetails(); ?>
        </td><?php } ?>
        <td width="50%" style="vertical-align: top;" >
            <?php $_instance->drawUserPasswordForm(); ?>
        </td>
    </tr>
</table>

