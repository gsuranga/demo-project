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
        <td>Create Vehicle Sub Model</td>
        <td>View All Vehicle Sub Models</td>
         <?php if(isset($_GET['token_vehicle_sub_model_id'])){ ?>
        <td>Manage Vehicle Sub Model</td>
        <?php } ?>
    </tr>
    <tr>
        <td width="30%" style="vertical-align: top"><?php echo $_instance->drawCreateVehicleSubModel(); ?></td>
        <td width="40%" style="vertical-align: top"><?php echo $_instance->drawvViewAllVehicleSubModel(); ?></td>
        <?php if(isset($_GET['token_vehicle_sub_model_id'])){ ?>
        <td width="40%"><?php echo $_instance->drawManageVehicleSubModel(); ?></td>
         <?php } ?>
    </tr>

</table>