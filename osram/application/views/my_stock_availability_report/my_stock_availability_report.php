<?php 

$_instance=get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Stock Availability</td>
    </tr>
    <tr>
        <td>
            <?php
            $_instance->getStockAvailability();
            ?>
        </td>
    </tr>
</table>