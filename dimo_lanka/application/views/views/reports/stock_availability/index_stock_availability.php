<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>

<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="left" style="height: 30px;max-height: 30px;">Parts Movement at the Dealer</td>
    </tr>

    <tr>
        <td align="center"><?php $_instance->drawViewStockAvailability(); ?></td>
    </tr>
</table>

