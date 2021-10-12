<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<form action="<?php echo $System['URL'] ?>promotion_view/drawIndexPromotionView">
<table align="center" width="100%" cellsapcing="10" cellpadding="10">
    <tr class="SubTile">
        <td align="center" style="color: #000000;font-size: larger "><b>BID Promotion Summary</b></td>
    </tr>
    <tr>
        <td align="left"><?php $_instance->drawAllBidPromotionDetails(); ?></td>
    </tr>
    <tr>
        <td align="center"><?php $_instance->drawAllBIDPromotionSummary(); ?></td>
    </tr>
    <tr></tr>
<!--    <tr class="SubTile" align="center">
        <td style="color: #184E69; "><b>Target Details</b> </td>
    </tr>
    <tr>
        <td align="center"><?php // $_instance->drawAllTargetDetails(); ?></td>
    </tr>-->
    <tr align="right">
        <td align="right"><input type="submit"  value="Back"></td>
    </tr>
</table>
</form>
