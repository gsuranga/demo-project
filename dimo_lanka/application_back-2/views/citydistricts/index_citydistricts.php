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
        <td>Create Districts</td>
        <td>Create City</td>
        
    </tr>
    <tr>
        <td width="40%"><?php  $_instance->drawCreateDistricts();?></td>
        <td width="50%"><?php  $_instance->drawCreateCity();?></td>
    </tr>
</table>