<?php
/*
 * Create By Insaf Zakariya-(insaf.zak@gmail.com)
 */
$_instance = get_instance();
?>

<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>
            Part Movement
        </td>
    </tr>
    <tr >
        <td style="vertical-align: top" width="40%"> <?php $_instance->drawSearchField(); ?></td>
    </tr>
    <tr>
        <td style="vertical-align: top" width="40%"> <?php $_instance->drawPartMovementDetailPage(); ?></td>

    </tr>
</table>