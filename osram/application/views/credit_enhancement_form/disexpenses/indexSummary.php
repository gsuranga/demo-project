<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Cash Summary Report</td>

    </tr>
    <tr>
        <td >
            <?php $_instance->expensesSummaryReport(); ?>
        </td>

    </tr>
    
</table>