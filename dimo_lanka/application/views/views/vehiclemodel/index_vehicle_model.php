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
        <td style="vertical-align: top">Create Vehicle Model</td>
        <td style="vertical-align: top">View All Vehicle Models</td>
        <?php if (isset($_GET['token_vehicle_model_id'])) { ?>
            <td>Manage Vehicle Model</td>
        <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top" width="30%"><?php echo $_instance->drawCreateVehicleModel(); ?></td>
        <td style="vertical-align: top" width="40%"><?php echo $_instance->drawViewAllVehicleModel(); ?></td>
        <?php if (isset($_GET['token_vehicle_model_id'])) { ?>
        <td width="50"><?php echo $_instance->drawManageVehicleModel();?></td>
        <?php } ?>
    </tr>

</table>