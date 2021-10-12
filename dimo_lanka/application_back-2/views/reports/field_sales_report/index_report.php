<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Dealer sales report</td>
    </tr>
    <tr>
        <td width="100%"><?php $_instance->drawReport();?></td>
       
    </tr>
</table>
