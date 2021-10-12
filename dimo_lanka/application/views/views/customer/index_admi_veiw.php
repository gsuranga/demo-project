<?php 
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Customer Details</td>
    </tr>

    <tr>
        <td width="120%"><?php $_instance->draw_customer_admin_view(); ?></td>
    </tr>
</table>