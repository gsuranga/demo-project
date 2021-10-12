<?php
/**
 * Description of branchDetails
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table border="0"width="100%" cellpadding="10" cellspacing="10">
    <?php if ($extraData != null) { ?>
        <?php
        foreach ($extraData as $data) {
            ?>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">Outlet Name</td>
                <td><?php echo $data->outlet_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Territory</td>
                <td><?php echo $data->territory_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Address</td>
                <td><?php echo $data->branch_address; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Telephone</td>
                <td><?php echo $data->branch_telephone; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Mobile</td>
                <td><?php echo $data->branch_mobile; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Contact Person</td>
                <td><?php echo $data->branch_contact_person; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Designation</td>
                <td><?php echo $data->branch_contact_person_designation; ?></td>
            </tr>
        <?php } ?>
    <?php } else { ?>
        <thead>
            <tr>
                <td>No Record Found</td>

            </tr>
        </thead>
        <?php
    }
    ?>
</table>
