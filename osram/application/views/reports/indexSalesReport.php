<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10" align="center">
    <tr class="ContentTableTitleRow">
        <td>Sales Order</td>

    </tr>
    <tr>
        <td width="60%"><?php $_instance->drawDailySalesReport(); ?></td>

    </tr>
</table>