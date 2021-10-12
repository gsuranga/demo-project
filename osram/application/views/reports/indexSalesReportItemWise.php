<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Item Wise Sales Report</td>

    </tr>
    <tr>
        <td >
            <?php $_instance->itemWiseSalesOrderReport(); ?>
        </td>

    </tr>
    
</table>