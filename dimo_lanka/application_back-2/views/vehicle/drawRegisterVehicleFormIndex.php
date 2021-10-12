<?php
$_instance = get_instance();
?>
<table width="100%"  align="center" cellsapcing="10" cellpadding="10">
    <tr class="ContentTableTitleRow">
        <td>Register Vehicle</td>
        <!--<td>View Registered Vehicles</td>-->
        <!--<td>View Business Type</td>-->
        
    </tr>
    <tr>
        <td width="30%"><?php echo $_instance->drawRegisterVehicleForm(); ?></td>
        <!--<td style="vertical-align: top;" width="40%"><?php // echo $_instance->drawViewAllPurposes(); ?></td>-->
        <!--<td style="vertical-align: top;" width="40%"><?php //if(isset($_GET['id']))$_instance->drawViewAllBusTypes(); ?></td>-->
              
    </tr>
    

</table>