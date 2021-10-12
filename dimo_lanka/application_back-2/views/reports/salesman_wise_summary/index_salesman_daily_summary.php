<?php
//
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="2" cellpadding="10" style="vertical-align: top">
    <tr class="ContentTableTitleRow">
        <td align="center">Salesman wise daily summary</td>
    </tr>
    <tr>
        <td width="120%"><?php $_instance->drawDailySalesSummary(); ?></td>
    </tr>
</table>












