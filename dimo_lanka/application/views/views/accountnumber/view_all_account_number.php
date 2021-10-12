<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Account ID</td>
            <td>Account No</td>
            <td>Customer Name</td>
            <td>Date</td>
            <td>Time</td>
            <td>Status</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if($extraData["results"]!= ''){
            foreach ($extraData["results"] as $value){?>
        <tr>
            <td><?php echo $value->acc_id;?></td>
            <td><?php echo $value->acc_no;?></td>
            <td><?php echo $value->cusname;?></td>
            <td><?php echo $value->date;?></td>
            <td><?php echo $value-> time;?></td>
            <td><?php echo $value->status;?></td>
        </tr>
          <?php  }
        }
        ?>
    </tbody>
</table>
<p><?php echo $extraData['links'];  ?></p>