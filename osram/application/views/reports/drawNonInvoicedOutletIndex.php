<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>No invoiced Outlets</td>

    </tr>
    <tr>
        <td >
            <?php $_instance->drawNonInvoicedOutlet(); ?>
        </td>

    </tr>
    
</table>