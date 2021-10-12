<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>




<h2>Top  Distributors</h2>
<table style="vertical-align:top" class="CSSTableGenerator" >
    <tr>
        <td align="center">Ranking</td>
        <td align="center">Distributor Name</td>
        <td align="center">Invoiced Amount (R.s)</td>
    </tr>
    <?php
    $rank=0;
    foreach ($extraData as $value){ 
        $rank+=1;
        ?>
    <tr>
        <td><?php echo  $rank //$value->rank; ?></td>
        <td><?php echo $value->fullname; ?></td>
        <td align="right"><?php echo number_format($value->sales,2); ?></td>
    </tr>
    <?php } ?>
</table>

