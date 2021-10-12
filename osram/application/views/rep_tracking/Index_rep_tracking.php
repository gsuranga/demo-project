<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<?php
$_instance = get_instance();
?>

<table width="100%" border="0" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Rep Tracking Map</td>        
    </tr>

    <tr>
        <td style="vertical-align: top" width ='40%'><?php $_instance->draw_rep_tracking(); ?> </td>        
    </tr>
</table>

