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
        <td style="vertical-align: top">Create Vehicle Brand</td>
        <td style="vertical-align: top">View All Vehicle Brands</td>
        <?php if (isset($_GET['token_vehicle_brand_id'])) { ?>
            <td>Manage Vehicle Brand</td>
        <?php } ?>
    </tr>
    <tr>
        <td style="vertical-align: top" width="30%"><?php echo $_instance->drawCreateVehicleBrand(); ?></td>
        <td style="vertical-align: top" width="40%"><?php echo $_instance->drawViewAllVehicleBrand(); ?></td>
        <?php if(isset($_GET['token_vehicle_brand_id'])){ ?>
        <td style="vertical-align: top" width="50%"><?php echo $_instance->drawManageVehicleBrand(); ?></td> 
        <?php } ?>
    </tr>

</table>