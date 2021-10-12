<?php 
/**
 * Description of branchView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Territory</td>
                <td>Code</td>
                <td>Address</td>
                <td>Telephone</td>
                <td>Mobile</td>
                <td>Contact Person</td>
                <td>Designation</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $data) {
                ?>
                <tr>
                    <td><?php echo $data->territory_name; ?></td>
                    <td><?php echo $data->branch_code; ?></td>
                    <td><?php echo $data->branch_address; ?></td>
                    <td><?php echo $data->branch_telephone; ?></td>
                    <td><?php echo $data->branch_mobile; ?></td>
                    <td><?php echo $data->branch_contact_person; ?></td>
                    <td><?php echo $data->branch_contact_person_designation; ?></td>
                    <td><a href="deleteOutlet?id=<?php echo $data->id_outlet_has_branch; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="drawIndexBranchManage?id_outlet_has_branch=<?php echo $data->id_outlet_has_branch; ?>&id_outlet2=<?php echo $data->id_outlet; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                    <td><a href="drawindexManageBranchDivision?id_outlet_has_branch=<?php echo $data->id_outlet_has_branch; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/division.png" /></a></td>

                </tr>
            <?php } ?>
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
