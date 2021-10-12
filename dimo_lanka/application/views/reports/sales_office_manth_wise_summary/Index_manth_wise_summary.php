<?php
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Tour Itenerary - Month Wise Summary</td>
    </tr>
    <tr>
        <td width="100%"><?php $_instance->drawViewManthlysummary(); ?></td>
    </tr>
    <tr>
        <td width="100%"><?php $_instance->drawViewManthlysummaryReport(); ?></td>
    </tr>
</table>