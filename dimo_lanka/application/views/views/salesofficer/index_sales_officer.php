<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>New Sales Officer</td>
        <td>All Registered Sales Officers</td>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="35%"><?php $_instance->drawCreateSalesOfficer(); ?></td>
        <td style="vertical-align: top;" width="65%"><?php $_instance->drawViewAllSalesOfficer(); ?></td>
    </tr>
</table>
