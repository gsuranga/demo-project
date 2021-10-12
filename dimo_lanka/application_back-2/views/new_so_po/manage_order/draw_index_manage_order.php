<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <?php if (!isset($_REQUEST['k']) && !isset($_REQUEST['token_purchase_order_iD'])) { ?>
        <tr class="ContentTableTitleRow">

            <td>Manage Purchase Order</td>

        </tr>
    <?php } ?>
    <tr>

        <td style="vertical-align: top;" width="50%"><?php $_instance->draw_view_manage_purchase_order(); ?></td>

    </tr>
</table>
