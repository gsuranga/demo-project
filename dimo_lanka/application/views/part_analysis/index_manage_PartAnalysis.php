<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<?php
$_instance = get_instance();
?>
<table width="80%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        
        <td align="center">List PartAnalysis</td>
        </tr>
    
    <tr>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->viewAllPartAnalysis();?></td>
        </tr>
        </table>

<table width="80%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
       
        <td align="center">Manage PartAnalysis</td>
    </tr>
    <tr>
     
        <td style="vertical-align: top;"width="40%"><?php echo $_instance->drawManagePartAnalysis();?></td>
    </tr>
</table>