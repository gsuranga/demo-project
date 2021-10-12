<?php 
/**
 * Description of territoryMapView
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr>
                <td>Division</td>
                <td>Delete</td>
                <td>Edit</td>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $data) {
                ?>

                <tr>
                    <td><?php echo $data->division_name; ?></td>


                    <td><a href="<?php echo $System['URL']; ?>territory/deleteTerritoryMap?id_territory_has_division1=<?php echo $data->id_territory_has_division; ?>&territory_idd2=<?php echo $data->id_territory; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>territory/drawIndexTerritoryManage?id_territory_has_division1=<?php echo $data->id_territory_has_division; ?>&territory_idd2=<?php echo $data->id_territory; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
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
<table align="center">
    <tr>

        <td align="center"><?php echo $this->session->flashdata('update_Maping'); ?></td>
    </tr>
</table>