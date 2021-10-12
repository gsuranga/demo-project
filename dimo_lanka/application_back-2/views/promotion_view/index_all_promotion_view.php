<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td align="center">Special Promotion View</td>
    </tr>
    <tr>
        <td>
            <div id="tabs">
                <ul>
                    <li><a href="#kit_promotion"><span>KIT Promotion</span></a></li>
                    <li><a href="#special_prices"><span>Special Prices</span></a></li>
                    <li><a href="#bid_promotion"><span>BID Promotion</span></a></li>
                </ul>
                
                <div class="Tab_content" id="kit_promotion">
                    <?php $_instance->drawAllKitPromotion(); ?>
                </div>

                <div class="Tab_content" id="special_prices">
                    
                    <?php $_instance->drawAllSpecialPrices(); ?>
                </div>
                
                <div class="Tab_content" id="bid_promotion">
                    <?php $_instance->drawAllBidPromotion(); ?>
                </div>

            </div>
        </td>
    </tr>
</table>

