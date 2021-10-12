<?php

/* 
@Kanchu
 */
?>
<table width="100%" class="SytemTable">
    <thead>
        <tr>
            <td>Distributor</td>
            <td>Sales Rep</td>
            <td>Month</td>
            <td>Amount</td>
            <td>Delete</td>
            <td>Edit</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData as $value){ ?>
        <tr>
            <td><?php echo $value->disName ?></td>
            <td><?php echo $value->RepName ?></td>
            <td><?php echo $value->target_month ?></td>
            <td><?php echo $value->target_amount ?></td>
            <td><a href="deletetarget?id_token=<?php echo $value->id_rep_target; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
            <td><a href="drawindexRepwiseTarget?id_token=<?php echo $value->id_rep_target; ?>&repName=<?php echo $value->RepName; ?>&target_month=<?php echo $value->target_month; ?>&target_amount=<?php echo $value->target_amount;?>&id_employee_has_place=<?php echo $value->id_employee_has_place;?>&id_physical_place=<?php echo $value->id_physical_place;?>&disName=<?php echo $value->disName; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
            
        </tr>
        <?php } ?>
    </tbody>
    
</table>
<table>
    <tr>
        <td align="center"><?php echo $this->session->flashdata('delete_target');?></td>
    </tr>
</table>