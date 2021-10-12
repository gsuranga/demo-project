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
         <td  style="vertical-align: top">All Workshop</td>
        <td  style="vertical-align: top">Manage Workshop</td>
       
        
    </tr>
    <tr>
        <td style="vertical-align: top" width="60%"><?php echo $_instance->drawViewWorkShop();?></td>
        <td style="vertical-align: top" width="40%"><?php echo $_instance->drawManageWorkshop();?></td> 
         
    </tr>
</table>