<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<table align="center" width="100%" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">KIT Promotion Summary</td>
    </tr>
    <tr>
        <td><?php $_instance->drawAllKitPromotionSummary(); ?></td>
    </tr>
</table>
