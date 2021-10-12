<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<form action="<?php echo $System['URL'] ?>kit_promotion_summary/drawIndexKitPromotionSummary">
    <table align="center" width="100%" cellsapcing="10" cellpadding="10">
        <tr class="ContentTableTitleRow">
            <td align="center">Order KIT Promotion</td>
        </tr>
        <tr>
            <td><?php $_instance->drawAllOrderKitPromotion(); ?></td>
        </tr>

        <tr>
            <td align="right"><input type="submit" value="Back"></td>
        </tr>
    </table>
</form>