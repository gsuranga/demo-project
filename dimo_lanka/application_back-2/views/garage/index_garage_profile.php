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
    <tr class="SubTile">
        <td align="center"  style="color: #000000;font-size: larger "><b>Garage Profile</b></td>
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawGarageProfile(); ?></td>
    </tr>
</table>