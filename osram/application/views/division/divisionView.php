<?php
/**
 * Description of divisionView
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
                <td>Parent Division Name</td>
                <td>Division Name</td>
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
                    <td><?php echo $data->tbl_division_type_name; ?></td>
                    <td><?php echo $data->parentdivision_name; ?></td>
                    <td><?php echo $data->division_name; ?></td>
                    <td><?php echo $data->division_status; ?></td>
                    <td><?php echo $data->added_date; ?></td>
                    <td><?php echo $data->added_time; ?></td>

                    <td><a href="<?php echo $System['URL']; ?>division/deleteDivision?division_idd=<?php echo $data->id_division; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>division/drawIndexDivisionManage?division_idd=<?php echo $data->id_division; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

                </tr>

                <?php
            }
            ?>
        </tbody>
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
<table>
    <tr>
        <td><?php echo $this->session->flashdata('delete_division'); ?></td>
    </tr>
</table>
