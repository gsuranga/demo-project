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
        <td style="vertical-align: top">Create Vehicle Part Type</td>
        <td style="vertical-align: top">View All Vehicle Part Types</td>
        <?php if (isset($_GET['token_part_type_id'])) { ?>
        <td>Manage Vehicle Brand</td>
        <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top" width="30%"><?php echo $_instance->drawCreateVehiclePartType(); ?></td>
        <td style="vertical-align: top" width="40%"><?php echo $_instance->drawViewAllVehiclePartType(); ?></td> 
        <?php if (isset($_GET['token_part_type_id'])) { ?>
        <td width="50%"><?php echo $_instance->drawManageVehiclePartType(); ?></td>
        <?php } ?>
    </tr>

</table>