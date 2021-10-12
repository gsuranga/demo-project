<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$c_controller=get_instance();

?>
<table  width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow" style="width: 100%">
        <td  style="vertical-align: top;width: 100%">Expenses For Area Sales Tour
            
        </td>
        
    </tr>
    <tr>
        <td style="vertical-align: top;width: 100%"><?php $c_controller->drawViewAreaSalesTourSummery();?></td>
    </tr>
</table>