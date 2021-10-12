<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>New Dealer</td>
        <td>All Registered Dealers</td>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="50%"><?php echo $_instance->drawcreate_register(); ?></td>
        <td style="vertical-align: top;" width="50%"><?php //echo $_instance->drawViewAllDelar(); ?></td>
    </tr>
</table>