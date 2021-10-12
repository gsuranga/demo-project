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
                <td style="color: #333333;font-weight: bold;vertical-align: top;width: 35%;background: #d3f9ae">Type :</td>
                <td><?php echo $data->territory_type_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Parent Territory Name :</td>
                <td><?php echo $data->parentterritory_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Territory Name :</td>
                <td><?php echo $data->territory_name; ?></td>
            </tr>
            <tr style="background: #edf6e4">
                <td style="color: #333333;font-weight: bold;background: #d3f9ae">Join Date :</td>
                <td><?php echo $data->added_date; ?></td>
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
