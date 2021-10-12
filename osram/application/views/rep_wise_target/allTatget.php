<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<form action="<?php echo base_url() ?>rep_wise_target/index_view_allt_target">
<table align="center" width="25%">
    <tr>
        <td>Distributor</td>
        <td>:</td>
        <td>
            <input type="text" id="disName" name="disName" placeholder="Select Distributor" onkeyup="getDisName();">
            <input type="hidden" id="disphyId" name="disphyId">
        </td>
    </tr>
    
    <tr>
        <td>Month</td>
        <td>:</td>
        <td><input type="month" name="tar_month_1" id="tar_month_1" style="width:90%"></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td><input type="submit" id="submit" name="submit" value="Search" ></td>
    </tr>
</table>
</form>
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
