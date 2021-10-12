<?php
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Sales Officer Monthly Target <?php print_r($_REQUEST['month_selected']); ?></td>
    </tr>
    <tr>
        <td width="100%"><?php $_instance->draw_sales_officer_monthly_target_month(); ?></td>
    </tr>
</table>