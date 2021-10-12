<?php
$_instance = get_instance();
?>
<table width="100%" align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Tour Itenerary Daily</td>
    </tr>
    
    
    
    
    
    
    <tr>
        <td width="100%"><?php $_instance->drawViewtour_itenerary_daily(); ?></td>
    </tr>
    
    
    <tr class="ContentTableTitleRow">
        <td> </td>
    </tr>
    <tr>
        <td width="100%"><?php $_instance->draw_actual_date(); ?></td>
    </tr>
      
    
    <tr>
        <td width="100%"><?php $_instance->drawViewtour_itenerary_dailyReport(); ?></td>
    </tr>
</table>