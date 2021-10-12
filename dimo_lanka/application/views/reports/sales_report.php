<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Part No</td>
            <td>Description</td>
            <td>Pricing Category</td>
            <td>Pg Category</td>
        </tr>
    </thead>
    <tbody>
          <?php
       if($extraData != ''){
           foreach ($extraData as $value){?>
        <tr>
            <td><?php echo $value->part_no;?></td>
            <td><?php echo $value-> description;?></td>
            <td><?php echo $value->pricing_cat;?></td>
            <td><?php echo $value->pg_cat;?></td>
           
        </tr>
          <?php 
        
           }          
       }
       ?>
    </tbody>
</table>