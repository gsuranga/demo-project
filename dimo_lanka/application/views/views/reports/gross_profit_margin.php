<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Account No</td>
            <td>Customer Name</td>
            <td>Part No</td>
            <td>Description</td>
            <td>Average</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if($extraData != ''){
            foreach ($extraData as $value){?>
        <tr>
            <td><?php echo $value->acc_no; ?></td>
            <td><?php echo $value->cus_name; ?></td>
            <td><?php echo $value->part_no; ?></td>
            <td><?php echo $value->description; ?></td>
            <td><?php echo $value->average; ?></td>
       </tr>
                   
           <?php }
    }  else { ?>
    <tfoot>
        <tr>
            <td colspan="3">No Records ..</td>
        </tr>
    </tfoot>
    </tbody>
<?php }
    ?>
</table>