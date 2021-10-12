<?php
/**
 * Description of outletDetailsView
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
                <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">Type:</td>
                <td><?php echo $data->employee_type; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">First Name:</td>
                <td><?php echo $data->employee_first_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Last Name :</td>
                <td><?php echo $data->employee_last_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Nic :</td>
                <td><?php echo $data->employee_nic; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Address :</td>
                <td><?php echo $data->employee_address; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Mobile :</td>
                <td><?php echo $data->employee_mobile; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Telephone :</td>
                <td><?php echo $data->employee_telephone; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Email :</td>
                <td><?php echo $data->employee_email; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Gender :</td>
                <td><?php echo $data->employee_gender; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Added Date :</td>
                <td><?php echo $data->employee_added_date; ?></td>
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
