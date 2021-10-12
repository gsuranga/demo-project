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
            <td>S/O Account No</td>
            <td>S/O Name</td>
            <td>Location</td>
            <td>Visit Count</td>
           
        </tr>   
    </thead>
    <tbody>
        <?php
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value->se; ?></td>
                    <td><?php echo $value->se_name; ?></td>
                    <td><?php echo $value->location; ?></td>
                    <td><?php echo $value->Visit_Count; ?></td>
                    

                </tr>
                <?php
              
            }
        }
        ?>
    </tbody>
   
    <tfoot>
       
    </tfoot>
</table>

