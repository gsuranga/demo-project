<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>New User Type</td>
        <td>All User Types</td>
        <?php if (isset($_GET['token_user_type_id'])) { ?>
            <td>Manage User Type</td>
        <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php echo $_instance->drawCreateUserType(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->drawViewAllUserType(); ?></td>
        <?php if (isset($_GET['token_user_type_id'])) { ?>
            <td style="vertical-align: top;" width="50%"><?php echo $_instance->drawManageUserType(); ?></td>
        <?php } ?>
    </tr>
</table>