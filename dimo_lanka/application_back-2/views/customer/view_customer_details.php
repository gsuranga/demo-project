<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#tbl_all_dealers1').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'tbl_all_dealers1', true, true);
    });

</script>


<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0" id="tbl_all_dealers1">
    <thead>
        <tr>

            <td>Customer Name</td>
            <td>Vehicle Reg NO</td>
            <td>Vehicle Details</td>
            <td>Other Vehicles</td>
            <td>Vehicle Purpose</td>
            <td>Customer details</td>
            <td>Owner Contact details</td>
            <td>Driver Details</td>
            <td>Travel Areas Details</td>
            <td>Spare Parts Purchases</td>
            <td>Garages Details</td>
        </tr>
    </thead>
    <tbody>

        <?php
        //print_r($extraData);
        if ($extraData != '') {
            foreach ($extraData as $value) {
                ?>
                <tr>

                    <td><?php echo $value->customer_name; ?></td>
                    <td><?php echo $value->vehicle_reg_no; ?></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/driver_details.png" style="widh:60px;height:20px;cursor:pointer" onclick="view_vehicle_details(<?php echo $value->vehicle_id; ?>);"></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/driver_details.png" style="widh:60px;height:20px;cursor:pointer" onclick="Other_vehicles(<?php echo $value->customer_id; ?>);"></td>
                    <td><?php echo $value->vehicle_purpose_name; ?></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/crowd_team.png" style="widh:70px;height:30px;cursor:pointer" onclick="view_cutomer_details(<?php echo $value->customer_id; ?>);"></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/crowd_team.png" style="widh:70px;height:30px;cursor:pointer" onclick="view_contact_details(<?php echo $value->vehicle_id; ?>);"></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/seo_successfulla.png" style="widh:60px;height:20px;cursor:pointer" onclick="view_drive_details(<?php echo $value->vehicle_id; ?>);"></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/more.png" style="widh:60px;height:20px;cursor:pointer" onclick="view_Travel_area_details(<?php echo $value->vehicle_id; ?>);"></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/Travel_details.png" style="widh:60px;height:20px;cursor:pointer" onclick="view_Dealer_purches_details(<?php echo $value->vehicle_id; ?>);"></td>
                    <td align="center"><img src="<?php echo $System['URL']; ?>public/images/settings.png" style="widh:60px;height:20px;cursor:pointer" onclick="view_garages_details(<?php echo $value->vehicle_id; ?>);"></td>

                </tr>

                <?php
            }
        }
        ?> 
    </tbody>
</table>