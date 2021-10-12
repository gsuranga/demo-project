<?php 
/**
 * Description of viewDivision
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Division Name</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $data) {
                ?>
                <tr>
                    <td align='center'><?php echo $data->division_name; ?></td>
                    <td><a href="deleteOutlet?id=<?php echo $data->id_outlet_has_branch; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="drawindexManageBranchDivision?id_branch_has_division=<?php echo $data->id_branch_has_division; ?>&id_outlet_has_branch=<?php echo $data->id_outlet_has_branch; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                    <!--<td><a href="drawIndexOutletManage?id_outlet2=<?php echo $data->id_outlet; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/branch.png" /></a></td>-->

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
