<?php

/* 
 * Date   : 2015-05-24
 * Author : Harshan Dilantha
 * Comments are included.
 */

$_instance = get_instance();
?>
<form action="<?php echo $System['URL'] ?>new_so_po/draw_index_manage_order">
    <table align="center" width="100%" cellsapcing="10" cellpadding="10">
        <tr class="ContentTableTitleRow">
            <td align="center">Order Promotion</td>
        </tr>
        <tr>
            <td><?php $_instance->drawAllOrderKitPromotion(); ?></td>
        </tr>

        <tr>
            <td align="right"><input type="submit" value="Back"></td>
        </tr>
    </table>
</form>