<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * @author Iresha Lakmali
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
       
        <td>All Completed Payments</td>
    </tr>
    <tr>
        <td width="100%"><?php echo $_instance->drawCompletedPayments();?></td>
    </tr>
</table>