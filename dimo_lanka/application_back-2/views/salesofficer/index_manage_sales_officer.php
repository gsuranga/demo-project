<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance=get_instance();

?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
   <tr class="ContentTableTitleRow">
       
        <td>View All</td>
        <td>Update Sales Officer</td>
    </tr>
    <tr>
        
        <td style="vertical-align: top;" width="50%"><?php $_instance->drawViewAllSalesOfficer();?></td>
        <td  style="vertical-align: top;"width="30%"><?php $_instance->drawUpdateSalesOfficer($_REQUEST); ?></td>
    </tr>
</table>

