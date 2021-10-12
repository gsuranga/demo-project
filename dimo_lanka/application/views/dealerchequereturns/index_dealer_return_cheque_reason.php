<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Return Cheque</td>
    </tr>

    <tr>
        <td width="120%"><?php $_instance->drawDealerReturnChequeReason(); ?></td>
    </tr>
</table>