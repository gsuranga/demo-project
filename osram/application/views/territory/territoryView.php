<?php 
/**
 * Description of territoryView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<script type="text/javascript"> // pagination
    $j(document).ready(function() {
        var s = $j('#e').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
    });
</script>




<table width="100%" id="e" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Type</td>
                <td>Parent Territory Name</td>
                <td>Territory Name</td>
                <td>Join Date</td>
                <td>Join Time</td>
                <td>Delete</td>
                <td>Edit</td>
                <td>View</td>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $data) {
                ?>

                <tr>
                    <td><?php echo $data->territory_type_name; ?></td>
                    <td><?php echo $data->parentterritory_name; ?></td>
                    <td><?php echo $data->territory_name; ?></td>
                    <td><?php echo $data->added_date; ?></td>
                    <td><?php echo $data->added_time; ?></td>

                    <td style="text-align: center"><a href="<?php echo $System['URL']; ?>territory/deleteTerritory?territory_idd=<?php echo $data->id_territory; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td style="text-align: center"><a href="<?php echo $System['URL']; ?>territory/drawIndexTerritoryManage?territory_idd=<?php echo $data->id_territory; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                    <td style="text-align: center"><a href="<?php echo $System['URL']; ?>territory/drawIndexTerritoryManage?territory_idd2=<?php echo $data->id_territory; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/division.png" /></a></td>
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
        <td><?php echo $this->session->flashdata('delete_Maping'); ?></td>
    </tr>
</table>
