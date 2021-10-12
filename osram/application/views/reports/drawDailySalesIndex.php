<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Distributor / Rep Wise Sales</td>

    </tr>
    <tr>
        <td >
            <?php $_instance->drawDailySales(); ?>
        </td>

    </tr>
    
</table>