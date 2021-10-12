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
        <td>Create Vehicle Type</td>
        <td>View All Vehicle Types</td>
        <?php if(isset($_GET['token_vehicle_type_id'])){ ?>
        <td>Manage Vehicle Type</td>
         <?php } ?>
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawCreateVehicleType();?></td>
        <td width="40%"><?php echo $_instance->drawViewAllVehicleType();?></td>
        <?php if(isset($_GET['token_vehicle_type_id'])){ ?>
        <td width="50%"><?php echo $_instance->drawManageVehicleType();?></td>
        <?php } ?>
    </tr>

</table>