<?php
$_instance = get_instance();
?>
<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Manage Van Stock</td>
    </tr>
    <tr>
        <td width="60%"><?php $_instance->drawViewVanSUBStock($_REQUEST); ?></td>
    </tr>
</table>
