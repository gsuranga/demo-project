<?php
/**
 * Description of viewItem
 *
 * @author Achala
 * @contact -: acharajakaruna@gmail.com
 * 
 */
?>
<table width="100%" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Item Category</td>
            <td>Item No</td>
            <td>Account Code</td>
            <td>Item Name</td>
            <td>Item Alias</td>
             <td>Qty</td>
            <td>Added Date</td>


        </tr>
    </thead>
    <tbodyb>
        <?php
        foreach ($extraData as $data) {
            ?>
            <tr>

                <td><?php echo $data->tbl_item_category_name; ?></td>
                <td><?php echo $data->item_no; ?></td>
                <td><?php echo $data->item_account_code; ?></td>
                <td><?php echo $data->item_name; ?></td>
                <td><?php echo $data->item_alias; ?></td>
                <td><?php echo $data->product_qty; ?></td>       
                <td><?php echo $data->added_date; ?></td>



            </tr>

            <?php
        }
        ?>
        </tbody>
</table>

