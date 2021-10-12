<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<table width="150%" cellpadding="4" cellspacing="4" align="left">
    <thead>
        <tr>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center"></td>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Current</td>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Proposed</td>
            <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Increase</td>          
        </tr>
    </thead>
    <?php
    if ($extraData != null) {
        foreach ($extraData as $value) {
            ?>
            <tbody>
                <tr>
                    <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Gross Margin</td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->current_gross_margine); ?></td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->proposed_gross_margine); ?></td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->gross_margine_increase); ?></td>
                </tr>
                <tr>
                    <td style="background: #DDCE66; color:rgb(90, 90, 90); text-align: center">Turn Over</td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->current_turn_over); ?></td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->proposed_turn_over); ?></td>
                    <td style="background:#F7F9A8; text-align: right"><?php echo number_format($value->turn_over_increase); ?></td>
                </tr>
            </tbody>
        <?php } ?>
    <?php } ?>
</table>
