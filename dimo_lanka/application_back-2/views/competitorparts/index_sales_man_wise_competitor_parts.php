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
        <td align="center">Sales Man Wise Competitor Parts Report</td>
    </tr>

    <tr>
        <td width="120%"><?php $_instance->drawSalesManWiseCompetitorPartsReport(); ?></td>
    </tr>
</table>
