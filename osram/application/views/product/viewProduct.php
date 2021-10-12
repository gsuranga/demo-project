<?php
/**
 * Description of viewProduct
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
?>

<script type="text/javascript">// pagination link
    $j(document).ready(function() {
        var s = $j('#tableData').dataTable();
        setupDataTableSettings(true, true, true, [10, 100, 200, 500], 'e', true, true);
    });
</script>


<table width="100%" id="tableData" class="SytemTable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <td>Batch No</td>
            <td>Item Name</td>
            <td>Exp Date</td>
            <td>Price</td>
            <td>Cost</td>
            <td>Edit</td>
            <td>Delete</td>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($extraData as $value) { ?>
            <tr> 
                <td> <?php echo $value->batch; ?></td>
                <td> <?php echo $value->item; ?></td>
                <td> <?php echo $value->exp; ?></td>
                <td> <?php echo $value->price; ?></td>
                <td> <?php echo $value->product_cost; ?></td>
                <td><a href="drawIndexProduct?productid=<?php echo $value->id; ?>&IDbatch=<?php echo $value->id_batch; ?>&batch=<?php echo $value->batch; ?>&item=<?php echo $value->item; ?>&exp=<?php echo $value->exp; ?>&price=<?php echo $value->price; ?>&batchno=<?php echo $value->id_batch; ?>&itemno=<?php echo $value->iditem; ?>&product_cost=<?php echo $value->product_cost; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/edit.png" /></a></td>

                <td><a href="deleteProduct?productid=<?php echo $value->id; ?>"><img width="20" height="20" src="<?php echo $System['URL']; ?>public/images/remove4.png" /></a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>
<table>
    <tr>
        <td>
            <?php echo $this->session->flashdata('update_product'); ?>
            <?php echo $this->session->flashdata('delete_product'); ?>
        </td>
    </tr>
</table>
