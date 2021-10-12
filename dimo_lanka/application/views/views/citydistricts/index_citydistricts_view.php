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
        <td style="vertical-align: top">All Districts</td>
        <td style="vertical-align: top">All City</td>
        
    </tr>
    <tr>
        <td style="vertical-align: top" width="40%"><?php echo $_instance->drawViewAllDistricts();?></td>
        <td style="vertical-align: top" width="50%"><?php echo $_instance->drawViewAllCity();?></td>
        <td ></td>
    </tr>
</table>