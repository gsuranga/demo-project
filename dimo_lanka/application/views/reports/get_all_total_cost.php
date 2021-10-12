<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$sum = 0;
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Part No</td>
            <td>Description</td>
            <td>Quantity</td>
            <td>Cost Price</td>
            <td>Total</td>
        </tr>
    </thead>
    <tbody>
           <?php
       if($extraData["results"] != ''){
           foreach ($extraData["results"] as $value){?>
        <tr>
            <td><?php echo $value->part_no;?></td>
            <td><?php echo $value->description;?></td>
            <td><?php echo $value->qty;?></td>
            <td><?php echo $value->cost_prie;?></td>
            <td><?php echo $value->total;?></td>
        </tr>
          <?php 
          $sum += $value->total;
           }
       }
       ?>
    </tbody>
</table>
<table style="left: 400px" width="50%" class="SytemTable" cellpadding="0" cellspacing="0">
    <tr>
        <td colspan="4">Total Cost</td>
        <td>
            <?php
       echo $sum;
            ?>
        </td>
    </tr>
</table>
<p><?php echo $extraData['links'];  ?></p>