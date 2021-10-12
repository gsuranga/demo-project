<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Market Returns</td>

    </tr>
   
    <tr>
        <td >
            <?php $_instance->select_market_return(); ?>
        </td>

    </tr>
</table>