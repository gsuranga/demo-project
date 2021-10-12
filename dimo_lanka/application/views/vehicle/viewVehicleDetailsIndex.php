<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Vehicle Details</td>
        <!--<td>View Registered Vehicles</td>-->
        <!--<td>View Business Type</td>-->
        
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawViewVehicleDetails(); ?></td>
        <!--<td style="vertical-align: top;" width="40%"><?php // echo $_instance->drawViewAllPurposes(); ?></td>-->
        <!--<td style="vertical-align: top;" width="40%"><?php //if(isset($_GET['id']))$_instance->drawViewAllBusTypes(); ?></td>-->
              
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Registered Vehicle Details</td>
        <!--<td>View Registered Vehicles</td>-->
        <!--<td>View Business Type</td>-->
        
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawViewRegVehicleDetails(); ?></td>
        <!--<td style="vertical-align: top;" width="40%"><?php // echo $_instance->drawViewAllPurposes(); ?></td>-->
        <!--<td style="vertical-align: top;" width="40%"><?php //if(isset($_GET['id']))$_instance->drawViewAllBusTypes(); ?></td>-->
              
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Driver Details</td>
        <!--<td>View Registered Vehicles</td>-->
        <!--<td>View Business Type</td>-->
        
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawViewDriverDetails(); ?></td>
        <!--<td style="vertical-align: top;" width="40%"><?php // echo $_instance->drawViewAllPurposes(); ?></td>-->
        <!--<td style="vertical-align: top;" width="40%"><?php //if(isset($_GET['id']))$_instance->drawViewAllBusTypes(); ?></td>-->
              
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Purpose Details</td>
        <!--<td>View Registered Vehicles</td>-->
        <!--<td>View Business Type</td>-->
        
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawViewVehiclePurposeDetails(); ?></td>
        <!--<td style="vertical-align: top;" width="40%"><?php // echo $_instance->drawViewAllPurposes(); ?></td>-->
        <!--<td style="vertical-align: top;" width="40%"><?php //if(isset($_GET['id']))$_instance->drawViewAllBusTypes(); ?></td>-->
              
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Vehicle Travel Area</td>
        <!--<td>View Registered Vehicles</td>-->
        <!--<td>View Business Type</td>-->
        
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawViewVehicleTravelArea(); ?></td>
        <!--<td style="vertical-align: top;" width="40%"><?php // echo $_instance->drawViewAllPurposes(); ?></td>-->
        <!--<td style="vertical-align: top;" width="40%"><?php //if(isset($_GET['id']))$_instance->drawViewAllBusTypes(); ?></td>-->
              
    </tr>
    <tr class="ContentTableTitleRow">
        <td>Vehicle Dealers</td>
        <!--<td>View Registered Vehicles</td>-->
        <!--<td>View Business Type</td>-->
        
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawViewVehicleDealers(); ?></td>
        <!--<td style="vertical-align: top;" width="40%"><?php // echo $_instance->drawViewAllPurposes(); ?></td>-->
        <!--<td style="vertical-align: top;" width="40%"><?php //if(isset($_GET['id']))$_instance->drawViewAllBusTypes(); ?></td>-->
              
    </tr>

</table>