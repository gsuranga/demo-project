<?php
/**
 * Description of territoryTypeView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Id</td>
                <td>Type</td>
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
                        <td><?php echo $data['id_territory_type']; ?></td>
                        <td><?php echo $data['territory_type_name']; ?></td>
                        <td><?php echo $data['territory_type_status']; ?></td>
                        <td><?php echo $data['added_date']; ?></td>
                        <td><?php echo $data['added_time']; ?></td>

                        <td align="center"><a href="<?php echo $System['URL']; ?>territory_type/deleteTerritoryType?territory_type_idd=<?php echo $data['id_territory_type']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                        <td align="center"><a href="<?php echo $System['URL']; ?>territory_type/drawIndexTerritoryTypeManage?territory_type_idd=<?php echo $data['id_territory_type']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

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
        <table>
        <tr>
            <td><?php echo $this->session->flashdata('delete_territory_type'); ?></td>
        </tr>
        </table>
</table>
