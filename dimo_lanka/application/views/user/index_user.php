<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td style="vertical-align: top">New User</td>
        <td style="vertical-align: top">All Users</td>
    </tr>
    <tr>
        <td width="30%" style="vertical-align: top"><?php $_instance->drawCreateUser(); ?></td>
        <td width="50%" style="vertical-align: top"><?php $_instance->drawViewAllUser(); ?></td>
    </tr>
</table>
