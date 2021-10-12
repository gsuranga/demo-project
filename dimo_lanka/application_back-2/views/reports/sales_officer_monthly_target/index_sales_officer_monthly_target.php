<?php
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Monthly Target - Salesman wise</td>
    </tr>
    <tr>
        <td width="100%"><?php $_instance->drawSalesmanWiseTarget(); ?></td>
    </tr>
</table>