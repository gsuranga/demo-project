<?php
/**
 * Description of physicalPlaceView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Type</td>
                <td>Physical Place Name</td>
                <td>Address</td>
                <td>Status</td>
                <td>Join Date</td>
                <td>Join Time</td>
                <td>Delete</td>
                <td>Edit</td>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $data) {
                ?>

                <tr>
                    <td><?php echo $data->physical_place_category_name; ?></td>
                    <td><?php echo $data->physical_place_name; ?></td>
                    <td><?php echo $data->physical_place_address; ?></td>
                    <td><?php echo $data->physical_place_status; ?></td>
                    <td><?php echo $data->added_date; ?></td>
                    <td><?php echo $data->added_time; ?></td>

                    <td><a href="<?php echo $System['URL']; ?>physical_place/deletePhysicalPlace?physical_place_idd=<?php echo $data->id_physical_place; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>physical_place/drawIndexPhysicalPlaceManage?physical_place_idd=<?php echo $data->id_physical_place; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

                </tr>

                <?php
            }
            ?>

        <?php } else { ?>
        <thead>
            <tr>
                <td>No Record Found</td>

            </tr>
        </thead>
        <?php
    }
    ?>
</tbody>
</table>
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('deletePhysicalPlace'); ?>
        </td> 
    </tr>
</table>
