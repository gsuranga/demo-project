<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>
<form action="<?php echo $System['URL'] ?>special_price_summary/drawIndexSpecialPriceSummary">
    <table align="center" width="100%" cellsapcing="10" cellpadding="10">
        <tr class="ContentTableTitleRow">
            <td align="center">Order Special Prices</td>
        </tr>
        <tr>
            <td><?php $_instance->drawAllOrderSpecialPrices(); ?></td>
        </tr>

        <tr>
            <td align="right"><input type="submit" value="Back"></td>
        </tr>
    </table>
</form>