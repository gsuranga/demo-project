<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Stock Product Details</td>
    </tr>
    <tr>
        <td width="60%"><?php $_instance->getProductDetails();?></td>
    </tr>
</table>
