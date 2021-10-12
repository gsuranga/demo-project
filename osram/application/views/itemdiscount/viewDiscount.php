<?php
/**
 * Description of viewDiscount
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <?php if ($extraData != null) { ?>
        <thead>
            <tr >
                <td>Employee</td>
                <td>Division</td>
                <td>Territory</td>
                <td>Physical Place</td>
                <td>Item Name</td>
                <td>Discount(%)</td>
                <td>Price Discount</td>
                <td></td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($extraData as $value) { ?>
                <tr> 
                    <td><?php echo $value->employee_first_name; ?></td>
                    <td><?php echo $value->division_name; ?></td>
                    <td><?php echo $value->territory_name; ?></td>
                    <td><?php echo $value->physical_place_name; ?></td>
                    <td><?php echo $value->item_name; ?></td>
                    <td><?php echo $value->percentage_discount; ?></td>
                    <td><?php echo $value->price_discount; ?></td>
                    <td><a href="drawindexDiscountManage?id_employee_item_discount=<?php echo $value->id_employee_item_discount; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>
                    <td><a href="deleteDiscount?id_employee_item_discount=<?php echo $value->id_employee_item_discount; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

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
            <?php echo $this->session->flashdata('delete_discount'); ?>
        </td>
    </tr>
</table>