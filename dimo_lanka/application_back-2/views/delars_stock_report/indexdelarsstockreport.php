<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10" id="index_table_sm">
    <tr class="ContentTableTitleRow">
        <td style="height: 33px;"><?php echo " " ?>Dealer Stock Movement</td>
    </tr>
    <tr>
        <td align="center"><?php $_instance->drawViewdealersreport(); ?></td>

    </tr>
</table>
