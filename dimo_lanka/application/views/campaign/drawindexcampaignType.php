<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance=get_instance();

?>

<table width="100%" align="center" cellsapcing="10" cellpadding="10">
   <tr class="ContentTableTitleRow">
        <td>Create Campaign Type</td>
        <td>View All Type</td>
        
    </tr>
    <tr>
        <td style="vertical-align: top;" width="30%"><?php $_instance->drawCreateCampaignType(); ?></td>
        <td style="vertical-align: top;" width="70%"><?php $_instance->drawViewAllCampaignType(); ?></td>
      
    </tr>
</table>
