<?php
/**
 * Description of physicalPlaceCategoryView
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
                <td>Category Name</td>
                <td>Status</td>
                <td>Join Date</td>
                <td>Join Time</td>
                <td>Delete</td>
                <td>Edit</td>

            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($extraData as $value) {
                ?>
                <tr>
                    <td><?php echo $value['id_physical_place_category']; ?></td>
                    <td><?php echo $value['physical_place_category_name']; ?></td>
                    <td><?php echo $value['physical_place_category_status']; ?></td>
                    <td><?php echo $value['added_date']; ?></td>
                    <td><?php echo $value['added_time']; ?></td>

                    <td><a href="<?php echo $System['URL']; ?>physical_place_category/deletePhysicalPlaceCategory?physical_place_category_idd=<?php echo $value['id_physical_place_category']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>physical_place_category/drawIndexPhysicalPlaceCategoryManage?physical_place_category_idd=<?php echo $value['id_physical_place_category']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

                </tr>

                <?php
            }
            ?>
        </tbody>
        <table>
                <tr>
                    <td>
                        <?php echo $this->session->flashdata('deletePhysicalPlaceCategory'); ?>
                    </td>
                </tr><table>

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
