<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$_instance = get_instance();
?>

<table width="30%" cellpadding="4" cellspacing="4" align="left">
    <?php
    if ($extraData != null) {
        foreach ($extraData as $value) {
            ?>
        <tr>
            <td style="background: #DDCE66; color:black; text-align: left">Part Number</td>
            <td style="background:#F7F9A8 "><?php echo $value->item_part_no; ?></td>
        </tr>
        <tr>
            <td style="background: #DDCE66; color:black; text-align: left">Description</td>
            <td style="background:#F7F9A8 "><?php echo $value->description; ?></td>
        </tr>
        <tr>
            <td style="background: #DDCE66; color:black; text-align: left">Selling Price</td>
            <td style="background:#F7F9A8"><?php echo $value->selling_price; ?></td>
        </tr>
        <tr>
            <td style="background: #DDCE66; color:black; text-align: left">Average Movement</td>  
            <td style="background:#F7F9A8"></td>
        </tr>
    <?php } ?>
    <?php } ?>

</table>
