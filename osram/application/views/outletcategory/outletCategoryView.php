<?php
/**
 * Description of outletCategoryView
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
?>
<table  width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>

        <thead>
            <tr>
                <td>ID</td>
                <td>Outlet Category Name</td>
                <td>Added Date</td>
                <td>Added Time</td>
                <td>Delete</td>
                <td>Edit</td>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($extraData as $data) { ?>
                <tr>

                    <td><?php echo $data['id_outlet_category']; ?></td>
                    <td><?php echo $data['outlet_category_name']; ?></td>
                    <td><?php echo $data['added_date']; ?></td>
                    <td><?php echo $data['added_time']; ?></td>

                    <td><a href="<?php echo $System['URL']; ?>outlet_category/deleteOutletCategoryType?id_outlet_category=<?php echo $data['id_outlet_category']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>
                    <td><a href="<?php echo $System['URL']; ?>outlet_category/drawIndexOutletCategoryManage?id_outlet_category=<?php echo $data['id_outlet_category']; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
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
        <table>
            <tr>
        <td></td>
        <td><?php echo $this->session->flashdata('delete_outlet_cat'); ?></td>
    </tr>
        </table>
</table>
