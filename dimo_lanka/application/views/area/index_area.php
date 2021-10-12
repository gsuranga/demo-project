<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * @author Iresha Lakmali
 */
?>
<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>New Area</td>
        <td>All Registered Areas</td>
    </tr>
    <tr>
        <td style="vertical-align: top;" width="20%"><?php echo $_instance->drawCreateArea(); ?></td>
        <td style="vertical-align: top;" width="40%"><?php echo $_instance->drawViewAllArea(); ?></td>
    </tr>
</table>