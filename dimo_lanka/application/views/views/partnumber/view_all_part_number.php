<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Part ID</td>
            <td>Part No</td>
            <td>Description</td>
            <td>Aggregate</td>
            <td>pricing category</td>
            <td>pg_cat</td>
            <td>Status</td>
            <td>Date</td>
            <td>Time</td>
        </tr>
    </thead>
    <tbody>
       <?php
       if($extraData["results"] != ''){
           foreach ($extraData["results"] as $value){?>
        <tr>
            <td><?php echo $value->part_id;?></td>
            <td><?php echo $value->part_no;?></td>
            <td><?php echo $value->description;?></td>
            <td><?php echo $value->aggregate;?></td>
            <td><?php echo $value->pricing_cat;?></td>
            <td><?php echo $value->pg_cat;?></td>
            <td><?php echo $value->status;?></td>
            <td><?php echo $value->date;?></td>
            <td><?php echo $value->time;?></td>
        </tr>
          <?php }
           
       }
       ?>
    </tbody>
</table>
<p><?php echo $extraData['links'];  ?></p>