<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table width="100%" cellpadding="7" cellspacing="5" align="left">
    <thead>
        <tr>
            <td style="background: #a3a3a3;color:white;width: 10px;text-align: center">Branch Name</td>
            <td style="background: #777777;color:white;width: 10px;text-align: center">Sub Branch Name</td>
            <td style="background: #777777;color:white;width: 10px;text-align: center">Location</td>
        </tr>
    </thead>
    <tbody>
        
   
    <?php
    foreach ($extraData as $value) { ?>
    <tr>
        <td style="background:#E2F7F8 "><?php echo $value->branch_name;?></td>
        <td style="background: #EBF3EC"><?php echo $value->sub_branch_name;?></td>
        <td style="background: #EBF3EC"><?php echo $value->location;?></td>
    </tr>
   <?php }
    ?>
    <tr>
        <td>
            <table align="right">
                <tr>
                    <td>
                        <input type="button" value="Discard" onclick="window_discard();"/>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    </tbody>
    
</table>