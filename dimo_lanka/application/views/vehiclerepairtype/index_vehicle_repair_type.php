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
        <td>Create Vehicle Repair Type</td>
        <td>View All Vehicle Repair Types</td>
        <?php if (isset($_GET['token_repair_type_id'])) { ?>
            <td>Manage Vehicle Repair Type</td>
        <?php } ?>
    </tr>
    <tr> 
        <td width="30%"><?php echo $_instance->drawCreateVehicleRepairType(); ?></td>
        <td width="40%"><?php echo $_instance->drawViewAllVehicleRepairType(); ?></td> 
          <?php if (isset($_GET['token_repair_type_id'])) { ?>
        <td width="40%"><?php echo $_instance->drawManageVehicleRepairType(); ?></td> 
         <?php } ?>
    </tr>

</table>