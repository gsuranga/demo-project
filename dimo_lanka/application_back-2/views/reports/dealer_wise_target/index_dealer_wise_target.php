<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Monthly Target - Dealer wise</td>
    </tr>
    <tr>
        <td width="100%" align="center"><?php $_instance->drawDealerWiseTarget(); ?></td>
    </tr>

</table>

