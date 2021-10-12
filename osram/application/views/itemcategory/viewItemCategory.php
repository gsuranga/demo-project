<?php

/**
 * Description of viewItemCategory
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */

?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>

        <thead>
            <tr>
                <td>Name</td>
                <td>Brand</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>
        <tbody>
             <?php foreach ($extraData as $value) { ?>
                <tr> 
                    <td> <?php echo $value->tbl_item_category_name; ?></td>
                    <td><?php echo $value->brand_name;?></td>
                    <td><img style="cursor:pointer" width="20" height="20" onclick="showupdateform('<?php echo $value->id_item_category?>', '<?php echo $value->tbl_item_category_name ?>','<?php echo $value->brand_name ?>','<?php echo $value->item_brand_id ?>')"  src="<?php echo $System['URL']; ?>public/images/edit.png" /></td>
                    <td><a href="deleteItemcategory?id=<?php echo $value->id_item_category; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

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
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('delete_itemcategory'); ?>
        </td>
    </tr>
</table>