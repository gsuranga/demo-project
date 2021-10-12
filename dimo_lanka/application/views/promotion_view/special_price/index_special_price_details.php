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
            <td align="center" style="color: #000000;font-size: larger "><b>Special Price Summary</b></td>
        </tr>
        <tr>
            <td align="left"><?php $_instance->drawAllPromotionDetails(); ?></td>
        </tr>
        <tr>
            <td align="center"><?php $_instance->drawAllSpSummary(); ?></td>
        </tr>
        <tr></tr>
    </table>
    <br>

    <table width="70%">
        <thead>
            <tr class="SubTile">
                
                <td width="400px" style="color: #184E69; padding-left: 13px" id="aso_details_heading"><b>ASO wise Target Details</b> </td>
                <td width="200px" style="color: #184E69"><b>Other Details</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                
                <td width="200px" align="left" style="padding-left: 10px">
                    <div id="aso_details">
                        
                    </div>
                </td>
                <td><?php $_instance->drawAllOtherDetails(); ?></td>
            </tr>
        </tbody>
<!--        <tr class="SubTile" align="center">
            <td style="color: #184E69; "><b>Dealer wise Target Details</b> </td>
        </tr>
        <tr>
            <td align="center"><?php // $_instance->drawAllDealerTargetDetails();  ?></td>
        </tr>-->
    </table>
    <table align="right" style="padding-right: 100px">
        <tr>
            <td></td>
            <td><input type="submit"  value="Back"></td>
        </tr>
    </table>
</form>
