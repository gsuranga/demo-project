<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<h2>Top 5 Items</h2>
<table width="100%" valign="bottom" class="CSSTableGenerator">
    <tr>
        <td align="center">Ranking</td>
        <td align="center">Item Name</td>
        <td align="center">Sales Quantity</td>
    </tr>
    <?php
    $rank=0;
    foreach ($extraData as $value){ 
        $rank+=1;
        ?>
    <tr>
        <td><?php echo  $rank //$value->rank; ?></td>
        <td><?php echo $value->item_name; ?></td>
        <td align="right"><?php echo number_format($value->qty,0); ?></td>
    </tr>
    <?php } ?>
</table>

