<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Update Users</td>
        <td>User Details</td>
        <td>Change User Password</td>
    </tr>
    <tr>
        <td width="30%" style="vertical-align: top;">
            <?php $_instance->drawSearchUser(); ?> 
        </td>
        <td width="40%" align="center" style="vertical-align: top;" >
            <?php $_instance->drawDeleteUser(); ?>
        </td>
        <td width="50%" style="vertical-align: top;">
            <?php $_instance->drawChangePassword(); ?>
        </td>
    </tr>
</table>
