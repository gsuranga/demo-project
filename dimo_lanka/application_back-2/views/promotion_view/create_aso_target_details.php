<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<table id="tbl_targt" class="tablesorter" width="30%" cellpadding="4" cellspacing="4">
    <thead>
        <tr>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">ASO Name</td>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center; width: 200px">Target</td>         
<!--            <td style="background: #DDCE66; color:black; text-align: center">Orders Submitted</td>
            <td style="background: #DDCE66; color:black; text-align: center">Orders invoiced</td> 
            <td style="background: #DDCE66; color:black; text-align: center">Targets Achieved</td> -->
        </tr>
    </thead>
    <?php
    if ($extraData != null) {
        $tot = 0;
//        $tot_amount = 0;
        foreach ($extraData as $value) {
            ?>
            <tbody>
                <tr>
                    <td style="background:#F7F9A8 "><?php echo $value->sales_officer_name; ?></td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->qty_per_month); ?></td>
<!--                    <td style="background:#F7F9A8; text-align: right"><?php // echo $value->amount; ?></td>
                    <td style="background:#F7F9A8; text-align: right"></td>
                    <td style="background:#F7F9A8; text-align: right"></td>-->
                </tr>
            </tbody>
            <?php $tot += $value->qty_per_month; ?>
            <?php // $tot_amount += $value->amount; ?>
        <?php } ?>
    <?php } ?>
            <footer>
                <tr>
                    <td style="background:#F7E099; text-align: center; color: rgb(90, 90, 90)">Total</td>
                    <td style="background:#F7E099; text-align: right; color: rgb(90, 90, 90)"><?php echo number_format($tot); ?></td>
<!--                    <td style="background:#F7E099; text-align: right; color: black"><?php // echo $tot_amount; ?></td>
                    <td style="background:#F7E099; text-align: right; color: black"></td>
                    <td style="background:#F7E099; text-align: right; color: black"></td>-->
                </tr>
            </footer>
</table>
