<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Category ID</td>
            <td>Category Name</td>
            <td>Status</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if($extraData != ''){
            foreach ($extraData as $value){?>
        <tr>
            <td><?php echo $value->category_id;?></td>
            <td><?php echo $value->category_name;?></td>
            <td><?php echo $value->status;?></td>
            <td <a style="text-decoration: none;" href="" >Update</a></td>
            <td <a style="text-decoration: none;" href="" >Delete</a></td>
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