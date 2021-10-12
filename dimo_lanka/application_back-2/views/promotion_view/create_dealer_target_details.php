<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<table id="tbl_dealer_targt" width="60%" cellpadding="4" cellspacing="4" align="left">
    <thead>
        <tr>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Dealer Account Number</td>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center; width: 15%">Dealer Name</td>         
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Sales Officer</td>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Orders Submitted</td> 
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Orders Invoiced</td> 
        </tr>
    </thead>
    <?php
    if ($extraData != null) {
        $tot = 0;
        foreach ($extraData as $value) {
            ?>
            <tbody>
                <tr>
                    <td style="background:#F7F9A8 "><?php echo $value->sales_officer_name; ?></td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo $value->qty_per_month; ?></td>
                    <td style="background:#F7F9A8; text-align: right"></td>
                    <td style="background:#F7F9A8; text-align: right"></td>
                    <td style="background:#F7F9A8; text-align: right"></td>
                </tr>
            </tbody>
            <?php // $tot += $value->qty_per_month; ?>
        <?php } ?>
    <?php } ?>
            <footer>
                <tr>
                    <td style="background:#F7E099; text-align: center; color: rgb(90, 90, 90)">Total</td>
                    <td style="background:#F7E099; text-align: right; color: rgb(90, 90, 90)"></td>
                    <td style="background:#F7E099; text-align: right; color: rgb(90, 90, 90)"></td>
                    <td style="background:#F7E099; text-align: right; color: rgb(90, 90, 90)"></td>
                    <td style="background:#F7E099; text-align: right; color: rgb(90, 90, 90)"></td>
                </tr>
            </footer>
</table>
