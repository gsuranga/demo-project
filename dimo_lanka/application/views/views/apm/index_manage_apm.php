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
        <td>List APM</td>
        <td>Manage APM</td>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="50%"><?php echo $_instance->drawViewAllApm();?></td>
        <td style="vertical-align: top;"width="40%"><?php echo $_instance->drawManageApm();?></td>
    </tr>
</table>