<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>User ID</td>
            <td>Employee Name</td>
            <td>User Name</td>
            <td>User Type</td>
        </tr>
    </thead>
    <tbody>
    <?php 
    if($extraData != ''){
        foreach ($extraData as $value) { ?>
    <tr>
        <td><?php echo $value->id; ?></td>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->username; ?></td>
        <td><?php echo $value->typename; ?></td>
       
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