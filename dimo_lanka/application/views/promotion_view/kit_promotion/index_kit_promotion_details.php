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
            <td align="center" style="color: #000000;font-size: larger "><b>KIT Promotion Summary</b></td>
        </tr>
        <tr>
            <td align="left"><?php $_instance->drawAllPromotionDetails(); ?></td>
        </tr>
        <tr>
            <td align="center"><?php $_instance->drawAllPromotionSummary(); ?></td>
        </tr>
        <tr></tr>
    </table>
    <br>
    
    <table>
        <tr class="SubTile">
            <td style="color: #184E69; padding-left: 25px" align="left"><b>ASO wise Target Details</b> </td>
            <td style="color: #184E69; padding-left: 250px"><b>Other Details</b></td>
        </tr>
        <tr></tr>
        <tr>
            <td align="left" style="padding-left: 20px"><?php $_instance->drawAllAsoTargetDetails(); ?></td>
            <td style="padding-left: 250px"><?php $_instance->drawAllOtherDetails(); ?></td>
        </tr>
<!--        <tr class="SubTile" align="center">
            <td style="color: #184E69; "><b>Dealer wise Target Details</b> </td>
        </tr>
        <tr>
            <td align="center"><?php // $_instance->drawAllDealerTargetDetails(); ?></td>
        </tr>-->
    </table>
    <table align="right" style="padding-right: 100px">
        <tr>
            <td></td>
            <td><input type="submit"  value="Back"></td>
        </tr>
    </table>
</form>
