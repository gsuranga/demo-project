<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<title>Order Contents</title>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>
            Order Contents
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top" width="40%"> <?php $_instance->drawTourPurchaseOrders(); ?></td>

    </tr>
</table>