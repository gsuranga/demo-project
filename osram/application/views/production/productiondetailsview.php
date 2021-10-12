<?php
/**
 * Description of productiondetailsview
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
                <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">Employee Name :</td>
                <td><?php echo $data->employee_first_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Division :</td>
                <td><?php echo $data->division_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Production Code :</td>
                <td><?php echo $data->production_code; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Batch :</td>
                <td><?php echo $data->batch_no; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Production Date :</td>
                <td><?php echo $data->production_date; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Production Time :</td>
                <td><?php echo $data->production_time; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Production Remark :</td>
                <td><?php echo $data->production_remark; ?></td>
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
